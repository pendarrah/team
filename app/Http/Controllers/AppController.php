<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('app.index', compact('events'));
    }

    public function events()
    {
        $events = Event::all();
        return view('app.events.index', compact('events'));
    }
    public function eventShow(Request $request)
    {
        $event = Event::find($request->id);
        return view('app.events.show', compact('event'));
    }
    public function coaches()
    {
        return view('app.coaches');    
    }
}
