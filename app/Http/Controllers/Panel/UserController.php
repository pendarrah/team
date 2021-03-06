<?php

namespace App\Http\Controllers\Panel;

use App\City;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function profileShow()
    {
        return view('app.panel.profile');
    }

    public function profileStore(Request $request)
    {

        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required|email',
            'card' => 'nullable|numeric|digits:16',
            'type' => 'required|in:supervisor,user',
            'avatar' => 'nullable|mimes:png,PNG,jpeg,JPEG,gif',

            'category_id' => 'required',
            'city_id' => 'required',

            'birthYear' => 'required|integer|between:1340,1390',

        ]);


        if ($request->file('avatar')){
            $attachmentFile = $request->file('avatar');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('files', $attachmentFileName);
            $attachmentFileName = $attachmentFileName;

            \Auth::user()->update(['status' => 2, 'fName' => $request->fName, 'lName' => $request->lName, 'email' => $request->email, 'type' => $request->type, 'avatar' => $attachmentFileName, 'category_id' => $request->category_id, 'birthYear' => $request->birthYear, 'city_id' => $request->city_id, 'card' => $request->card]);

        }else{
            \Auth::user()->update(['status' => 2, 'fName' => $request->fName, 'lName' => $request->lName, 'email' => $request->email, 'type' => $request->type, 'category_id' => $request->category_id, 'birthYear' => $request->birthYear, 'city_id' => $request->city_id, 'card' => $request->card]);
        }


        alert()->success('تغییرات پروفایل باموفقیت شد.', 'انجام شد.');
        return redirect()->back();

    }


    public function passwordShow()
    {
        return view('app.panel.password');
    }

    public function passwordStore(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
        ]);


        if (!(Hash::check($request->get('old_password'), \Auth::user()->password))) {
            // The passwords not matches

            return redirect()->back()->withErrors(['خطا', 'رمز عبور قدیم صحیح نمیباشد']);
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->withErrors(['خطا', 'رمز عبور قدیم و جدید یکسان میباشد']);
        }

        //Change Password
        $user = \auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        alert()->success('رمز عبور با موفقیت تغییر کرد.', 'انجام شد');
        return redirect()->route('panel.index');

    }
}
