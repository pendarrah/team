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
}
