<?php

namespace App\Http\Controllers;

use App\Event;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AppController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $events = Event::where('timeStart', '>=', \Carbon\Carbon::now()->toDateString())->where('timeStart', '<=',date('Y-m-d', strtotime("+7 days")))->where('type', 'public')->take(9)->get();
        return view('app.index', compact('events'));
    }

    public function events()
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $events = Event::where('timeStart', '>=', \Carbon\Carbon::now()->toDateString())->where('timeStart', '<=',date('Y-m-d', strtotime("+7 days")))->where('type', 'public')->paginate(15);
        return view('app.events.index', compact('events'));
    }

    public function eventsSearch(Request $request)
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $events = Event::where('timeStart', '>=', \Carbon\Carbon::now()->toDateString())->where('timeStart', '<=',date('Y-m-d', strtotime("+7 days")))->where('type', 'public')->get();
        $request->gender !== 'همه' ? $events = $events->where('gender', $request->gender) : '';
        $request->city !== 'همه' ? $events = $events->where('city_id', $request->city) : '';
        $request->type !== 'همه' ? $events = $events->where('category_id', $request->type) : '';


        return view('app.events.index', compact('events'));
    }

    public function eventShow(Request $request)
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $event = Event::find($request->id);
        $eventMembers = \DB::table('event_user')->where('status', 'accept')->where('payment', 'paid')->pluck('user_id');
        return view('app.events.show', compact('event', 'eventMembers'));
    }
    public function coaches()
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        return view('app.coaches');    
    }
    public function teams()
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $teams = Team::paginate(15);
        return view('app.teams.index', compact('teams'));

    }

    public function teamsSearch(Request $request)
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $teams = Team::all();
        $request->gender !== 'همه' ? $teams = $teams->where('gender', $request->gender) : '';
        $request->city !== 'همه' ? $teams = $teams->where('city_id', $request->city) : '';
        $request->type !== 'همه' ? $teams = $teams->where('category_id', $request->type) : '';

        return view('app.teams.index', compact('teams'));

    }

    public function teamShow(Request $request)
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        $team = Team::find($request->id);
        $teamMembers = \DB::table('team_user')->where('status', 'accept')->pluck('user_id');

        return view('app.teams.show', compact('team', 'teamMembers'));
    }
    public function teamsevents()
    {
        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('پلتفرم تیموفیت');

        return view('app.teams-events');    
    }

    public function eventRequest(Request $request)
    {

        $event = Event::find($request->id);
        $user = User::where('id', \Auth::user()->id)->first();

        if (\DB::table('event_user')->where('event_id', $event->id)->where('user_id', $user->id)->count() >= 1){
            alert()->warning('شما عضو رویداد هستید!', 'عضو هستید');
            return redirect()->back();
        }elseif (\DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->count() >= $event->membersCount){
            alert()->error('ظرفیت رویداد تکمیل شده است!', 'تکمیل ظرفیت');
            return redirect()->back();
        }else{
            $event->users()->attach($user->id, ['owner_id' => $event->user_id]);
            alert()->success('درخواست شما ارسال شد', 'ارسال شد');
            return redirect()->back();

        }


    }

    public function teamEvents(Request $request)
    {
        $events = Event::paginate(15);
        return view('app.events.index', compact('events'));
    }

}
