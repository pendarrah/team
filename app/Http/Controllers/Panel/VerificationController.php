<?php

namespace App\Http\Controllers\Panel;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class VerificationController extends \App\Http\Controllers\Controller
{
    public function mobile(Request $request)
    {
            if($request->mobileCode){
                if($request->mobileCode == \Auth::user()->sms_code){
                    \Auth::user()->update(['status' => 1]);
                    alert()->success('موبایل شما تایید شد.')->autoclose(5000);
                    return redirect()->route('panel.verification.profile');
                }else{
                    alert()->error('کد وارد شده نادرست است.')->autoclose(5000);
                    return view('app.panel.verification.mobile');
                }
            }
        $user = User::where('id', \Auth::user()->id)->first();

        if ($user->sms_date >= Carbon::now()->subMinutes(10)) {
            alert()->error('کد تایید دقایقی قبل ارسال شده است')->autoclose(8000);
            return view('app.panel.verification.mobile');
        }

            $code = mt_rand(1111,9999);
            $user->update(['sms_date' => now(), 'sms_code' => $code]);


            $client = new Client();
            $res = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                'form_params' => [
                    'username' => 'riecocompany',
                    'password' => 'ali021ALI)@!',
                    'to' => \Auth::user()->mobile,
                    'from' => '10001010111',
                    'text' => "کد تایید: $code | تیمو فیت",
                ]
            ]);


            alert()->success('کد پیامک شد', 'کد تایید ارسال شد.')->autoclose(5000);
            return view('app.panel.verification.mobile');
    }


    public function profile()
    {
        return view('app.panel.verification.profile');
    }

    public function profileStore(Request $request)
    {

        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'birthday' => 'required',

        ]);

        $date = substr($request->birthday, 0, 10);
        $birthday = date('Y-m-d H:i:s', (int) $date);

       \Auth::user()->update(['status' => 2, 'fName' => $request->fName, 'lName' => $request->lName, 'birthday' => $birthday]);

        alert()->success('حساب کاربری شما تایید شد.', 'تایید شد.')->autoclose(5000);
        return view('app.panel.index');



    }
}
