<?php

namespace App\Http\Controllers\Panel;

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
        $events = Event::all();
        return view('app.panel.events.index', compact('events'));
    }


    public function my()
    {
        $events = Event::where('user_id', \Auth::user()->id)->get();
        return view('app.panel.events.my', compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.panel.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'membersCount' => 'required',
            'timeStart' => 'required',
            'timeFinish' => 'required',
            'address' => 'required',
            'description' => 'required',
            'picture' => 'nullable',
        ]);

        $date = substr($request->timeStart, 0, 10);
        $timeStart = date('Y-m-d H:i:s', (int) $date);

        $date = substr($request->timeFinish, 0, 10);
        $timeFinish = date('Y-m-d H:i:s', (int) $date);


        if ($request->file('picture')) {
            $attachmentFile = $request->file('picture');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('files', $attachmentFileName);
            Event::create(['user_id' => \Auth::user()->id, 'title' => $request->title, 'category' => $request->category, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'timeFinish' => $timeFinish, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->back();
        } else {
            $attachmentFileName = "Nothing";
            Event::create(['user_id' => \Auth::user()->id, 'title' => $request->title, 'category' => $request->category, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'timeFinish' => $timeFinish, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->back();
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('app.panel.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'membersCount' => 'required',
            'timeStart' => 'required',
            'timeFinish' => 'required',
            'address' => 'required',
            'description' => 'required',
            'picture' => 'nullable',
        ]);

        $date = substr($request->timeStart, 0, 10);
        $timeStart = date('Y-m-d H:i:s', (int) $date);

        $date = substr($request->timeFinish, 0, 10);
        $timeFinish = date('Y-m-d H:i:s', (int) $date);


        if ($request->file('picture')) {
            $attachmentFile = $request->file('picture');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('files', $attachmentFileName);
            $event->update(['user_id' => \Auth::user()->id, 'title' => $request->title, 'category' => $request->category, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'timeFinish' => $timeFinish, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName]);

            alert()->success('رویداد با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->back();
        } else {
            $attachmentFileName = "Nothing";
            $event->update(['user_id' => \Auth::user()->id, 'title' => $request->title, 'category' => $request->category, 'price' => $request->price, 'membersCount' => $request->membersCount, 'timeStart' => $timeStart, 'timeFinish' => $timeFinish, 'address' => $request->address, 'description' => $request->description, 'picture' => $attachmentFileName]);

            alert()->success('رویداد با موفقیت ویرایش شد', 'ویرایش شد');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event = Event::find($request->id);
        if ($event->user_id == \Auth::user()->id){
            $event->delete();
            alert()->success('رویداد با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->back();
        }

    }
}
