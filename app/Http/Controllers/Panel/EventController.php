<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Event;
use Illuminate\Http\Request;

class EventController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'admin') {
            $events = Event::all();
        } elseif (\Auth::user()->type == 'supervisor') {
            $events = Event::where('user_id', \Auth::user()->id)->get();
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }

        return view('app.panel.events.index', compact('events'));
    }


    public function my()
    {
        $requests = collect(\DB::table('event_user')->where('user_id', \Auth::user()->id)->get());
        return view('app.panel.events.my', compact('requests'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Gate::allows('admin') OR \Gate::allows('supervisor')) {
            $categories = Category::all();
            return view('app.panel.events.create');
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'membersCount' => 'required',
            'timeStart' => 'required',
            'duration' => 'required',
            'region' => 'required',
            'address' => 'required',
            'description' => 'nullable',
            'picture' => 'nullable',
            'type' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'lat' => 'nullable',
            'long' => 'nullable',
            'team_id' => 'required',
            'gender' => 'required',
        ]);

        $date = substr($request->timeStart, 0, 10);
        $timeStart = date('Y-m-d H:i:s', (int)$date);



        if ($request->file('picture')) {
            $attachmentFile = $request->file('picture');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('files', $attachmentFileName);
            Event::create(['user_id' => \Auth::user()->id, 'title' => $request->title, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'duration' => $request->duration, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName, 'type' => $request->type, 'city_id' => $request->city_id, 'category_id' => $request->category_id, 'lat' => $request->lat, 'long' => $request->long, 'team_id' => $request->team_id, 'gender' => $request->gender, 'region' => $request->region]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('event.index');
        } else {
            $attachmentFileName = "Nothing";
            Event::create(['user_id' => \Auth::user()->id, 'title' => $request->title, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'duration' => $request->duration, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName, 'type' => $request->type, 'city_id' => $request->city_id, 'category_id' => $request->category_id, 'lat' => $request->lat, 'long' => $request->long, 'team_id' => $request->team_id, 'gender' => $request->gender, 'region' => $request->region]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('event.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (\Gate::allows('admin')) {
            return view('app.panel.events.edit', compact('event'));
        } else if (\Gate::allows('supervisor') && $event->user_id == \Auth::user()->id) {
            return view('app.panel.events.edit', compact('event'));
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'membersCount' => 'required',
            'timeStart' => 'required',
            'duration' => 'required',
            'region' => 'required',
            'address' => 'required',
            'type' => 'required',
            'description' => 'required',
            'picture' => 'nullable|mimes:png,PNG,jpeg,JPEG,gif',
            'city_id' => 'required',
            'category_id' => 'required',
            'lat' => 'nullable',
            'long' => 'nullable',
            'status' => 'required',
            'team_id' => 'required',
            'gender' => 'required',

        ]);

        $date = substr($request->timeStart, 0, 10);
        $timeStart = date('Y-m-d H:i:s', (int)$date);


        if ($request->file('picture')) {
            $attachmentFile = $request->file('picture');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('files', $attachmentFileName);
            $event->update(['user_id' => \Auth::user()->id, 'title' => $request->title, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'duration' => $request->duration, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName, 'type' => $request->type, 'city_id' => $request->city_id, 'category_id' => $request->category_id, 'lat' => $request->lat, 'long' => $request->long, 'status' => $request->status, 'team_id' => $request->team_id, 'gender' => $request->gender, 'region' => $request->region]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->back();
        } else {
            $event->update(['user_id' => \Auth::user()->id, 'title' => $request->title, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'duration' => $request->duration, 'address' => $request->address, 'description' => $request->description, 'type' => $request->type, 'city_id' => $request->city_id, 'category_id' => $request->category_id, 'lat' => $request->lat, 'long' => $request->long, 'status' => $request->status, 'team_id' => $request->team_id, 'gender' => $request->gender, 'region' => $request->region]);

            alert()->success('رویداد با موفقیت ویرایش شد', 'ویرایش شد');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event = Event::find($request->id);
        if ($event->user_id == \Auth::user()->id) {
            $event->delete();
            alert()->success('رویداد با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
        }

    }


    public function requestAccept(Request $request)
    {

        $req = \DB::table('event_user')->where('id', $request->id)->first();
        $event = Event::where('id', $req->event_id)->first();

        if (\DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count() >= $event->membersCount) {
            alert()->error('ظرفیت رویداد تکمیل شده است', 'تکمیل ظرفیت');
            return redirect()->route('panel.index');
        } else {
            \DB::table('event_user')->where('id', $request->id)->update(['status' => 'accept']);
            alert()->success('کاربر عضو رویداد شد', 'عضو شد');
            return redirect()->back();
        }
    }

    public function requestReject(Request $request)
    {
        $req = \DB::table('event_user')->where('id', $request->id)->first();
        $event = Event::where('id', $req->event_id)->first();

        \DB::table('event_user')->where('id', $request->id)->update(['status' => 'reject']);
        alert()->success('درخواست کاربر لغو شد', 'رد شد');
        return redirect()->back();
    }

    public function wallet(Request $request)
    {
        $reqs = \DB::table('event_user')->where('event_id', $request->id)->get();
        return view('app.panel.events.wallet', compact('reqs'));

    }

    public function offlinePayment(Request $request)
    {
        if (\Gate::allows('supervisor')) {
            $req = \DB::table('event_user')->where('id', $request->id)->first();
            $event = Event::where('id', $req->event_id)->first();
            if ($event->user_id !== \Auth::user()->id) {
                alert()->warning('عدم دسترسی');
                return redirect()->route('panel.index');
            }
            $req = \DB::table('event_user')->where('id', $request->id);
            $req->update(['payment' => 'paid', 'method' => 'offline']);
            alert()->success('وجه مورد نظر پرداخت شد.', 'پرداخت شد');
            return redirect()->back();
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }

    }

}
