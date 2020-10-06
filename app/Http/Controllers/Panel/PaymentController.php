<?php

namespace App\Http\Controllers\Panel;

use App\Course;
use App\Event;
use App\Payment;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends \App\Http\Controllers\Controller
{
    public function payment(Request $request)
    {
        try {
            $user = \Auth::user();
            $gateway = \Gateway::ZARINPAL();
            $gateway->setCallback(url("/paid/$request->amount/$user->id"));
            $gateway->price($request->amount)->ready();
            $refId = $gateway->refId();
            $transID = $gateway->transactionId();
            return $gateway->redirect();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function paid($amount, $userId)
    {
        try {
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            $user = User::where('id', $userId)->first();
            $amount = $user->amount;
            $newAmount = $amount += $amount;
            $payment = Payment::create(['trackingCode' => $trackingCode, 'refId' => $refId, 'cardNumber' => $cardNumber, 'amount' => $amount, 'user_id' => $userId ]);
            $transAction = Transaction::create(['type' => 'واریز', 'for' => 'شارژ کیف پول', 'amount' => $amount , 'description' => " کد پیگیری: $trackingCode ", 'user_id' => $userId]);
            $user->update(['amount' => $newAmount]);
            alert()->success("$trackingCode", "کد پیگیری شما:");
            return redirect()->route('panel.index');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}
