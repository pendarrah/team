<?php

namespace App\Http\Controllers\Panel;

use App\Event;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class ReqController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $reqs = \DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get();
        return view('app.panel.requests.index', compact('reqs'));
    }

    public function payFromWallet(Request $request)
    {
        $req = \DB::table('event_user')->where('id', $request->id)->first();
        $event = Event::where('id', $req->event_id)->first();
        $user = User::where('id', $req->user_id)->first();
        $userLastAmount = $user->amount;

        $member = \DB::table('team_user')->where('team_id', $event->team->id)->where('user_id', $user->id)->where('status', 'accept')->count();
        if ($member !== 1){
            $eventCost = $event->price + 50000;
        }else{
            $eventCost = intval($event->price);
        }

        if ($user->amount < $eventCost){
            alert()->error('موجودی کافی نیست.', 'عدم موجودی');
            $reqs = \DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get();
            return view('app.panel.requests.index', compact('reqs'));
        }else if(\DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count() >= $event->membersCount){
            alert()->error('ظرفیت رویداد تکمیل شده است', 'تکمیل ظرفیت');
            $reqs = \DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get();
            return view('app.panel.requests.index', compact('reqs'));
        }else{
            \DB::table('event_user')->where('id', $request->id)->update(['payment' => 'paid', 'method' => 'online']);
            $user->update(['amount' => $userLastAmount - $eventCost]);
            $transAction = Transaction::create(['type' => 'برداشت', 'for' => 'برداشت جهت شرکت در رویداد', 'amount' => $eventCost , 'description' => " کد رویداد: $event->id ", 'user_id' => $user->id]);
            alert()->success('شما باموفقیت عضو رویداد شدید.', 'پرداخت شد');
            $reqs = \DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get();
            return view('app.panel.requests.index', compact('reqs'));
        }
    }
}
