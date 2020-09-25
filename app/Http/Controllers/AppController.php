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
        return view('app.events', compact('events'));
    }
    public function details()
    {
        return view('app.details');    
    }
}
