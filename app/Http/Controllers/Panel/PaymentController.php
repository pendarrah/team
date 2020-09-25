<?php

namespace App\Http\Controllers;

use App\Course;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment($amount, $courseId, $userId)
    {
        $course = Course::findOrFail($courseId);
        if ($course->type == 'free'){

            $course->users()->attach($userId);
            alert()->success("شما با موفقیت عضو شدید", "انجام شد");
            return redirect()->route('courses.id', $courseId);

        }

        try {
            $gateway = \Gateway::ZARINPAL();
            $gateway->setCallback(url("/paid/$amount/$courseId/$userId"));
            $gateway->price($amount)->ready();
            $refId = $gateway->refId();
            $transID = $gateway->transactionId();
            return $gateway->redirect();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function paid($amount, $courseId, $userId)
    {
        try {
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();

            $course = Course::findOrFail($courseId);

            if($course->price == (int)mb_substr($amount, 0, -4)){
                $payment = Payment::create(['trackingCode' => $trackingCode, 'refId' => $refId, 'cardNumber' => $cardNumber, 'amount' => $amount, 'user_id' => $userId, 'course_id' => $courseId, 'ostadUser_id' => $course->user_id ]);
                $course->users()->attach($userId);
                alert()->success("$trackingCode", "کد پیگیری شما:");
                return redirect()->route('courses.id', $courseId);
            }else{
                alert()->error("$trackingCode", "کد پیگیری شما:");
                return redirect()->route('courses.id', $courseId);
            }


        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}
