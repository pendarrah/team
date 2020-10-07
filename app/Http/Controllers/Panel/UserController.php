<?php

namespace App\Http\Controllers\Panel;

use App\City;
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
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'english' => 'required',
        ]);

        $category->update(['title' => $request->title, 'english' => $request->english]);
        alert()->success('دسته بندی با موفقیت ویرایش شد', 'ویرایش شد');
        return redirect()->route('category.index');


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
            $category->update(['title' => $request->title, 'english' => $request->english]);
            alert()->success('دسته بندی با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
        }

    }
}
