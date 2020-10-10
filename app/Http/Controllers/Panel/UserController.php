<?php

namespace App\Http\Controllers\Panel;

use App\City;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class UserController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( \Gate::allows('admin')) {
            $users = User::all();
            return view('app.panel.users.index', compact('users'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if( \Gate::allows('admin')) {
            $cities = City::all();
            return view('app.panel.users.edit', compact('cities', 'user'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    public function plays(Request $request)
    {
        if( \Gate::allows('admin')) {
            $user = User::where('id', $request->id)->first();
            $requests = \DB::table('event_user')->where('user_id', $request->id)->get();
            return view('app.panel.users.plays', compact( 'user', 'requests'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    public function transactions(Request $request)
    {
        if( \Gate::allows('admin')) {
            $transactions = Transaction::where('user_id', $request->id)->get();
            $user = User::where('id', $request->id)->first();
            return view('app.panel.users.transactions', compact( 'transactions', 'user'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'type' => 'required',
            'email' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required',
            'status' => 'required',
        ]);

        $user->update([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'type' => $request->type,
            'email' => $request->email,
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'mobile' => $request->mobile,
            'status' => $request->status,
        ]);
        alert()->success('کاربر با موفقیت ویرایش شد', 'ویرایش شد');
        return redirect()->route('users.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function ban(Request $request)
    {
        $user = User::find($request->id);
        if (\Auth::user()->type === 'admin'){
            $user->update(['status' => 13]);
            alert()->success('کاربر با موفقیت مسدود شد', 'مسدود شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
        }

    }
}
