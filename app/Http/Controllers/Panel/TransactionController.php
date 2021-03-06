<?php

namespace App\Http\Controllers\Panel;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', \Auth::user()->id)->get();
        return view('app.panel.transactions.index', compact('transactions'));
    }

}
