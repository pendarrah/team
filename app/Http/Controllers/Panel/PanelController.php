<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

class PanelController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('app.panel.index');
    }

}
