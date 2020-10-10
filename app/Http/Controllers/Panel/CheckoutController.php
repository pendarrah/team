<?php

namespace App\Http\Controllers\Panel;

use App\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'admin') {
            $checkouts = Checkout::all();
        } elseif (\Auth::user()->type == 'supervisor') {
            $checkouts = Checkout::where('user_id', \Auth::user()->id)->get();
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
        return view('app.panel.checkouts.index', compact('checkouts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request(Request $request)
    {
        Checkout::create(['event_id' => $request->event_id, 'user_id' => \Auth::user()->id, 'status' => 'notPaid']);
        alert()->success('انجام شد');
        return redirect()->route('checkout.index');

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
            'english' => 'required',
        ]);

        Checkout::create(['title' => $request->title, 'english' => $request->english]);

        alert()->success('دسته بندی با موفقیت اضافه شد', 'اضافه شد');
        return redirect()->route('checkout.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        if( \Gate::allows('admin')) {
            return view('app.panel.checkouts.edit', compact('checkout'));
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
    public function update(Request $request, Checkout $checkout)
    {
        $request->validate([
            'status' => 'required',
            'trackingCode' => 'required',
        ]);

        $checkout->update(['status' => $request->status, 'trackingCode' => $request->trackingCode]);
        alert()->success('درخواست با موفقیت ویرایش شد', 'ویرایش شد');
        return redirect()->route('checkout.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $checkout = Checkout::find($request->id);
        if ($checkout->user_id == \Auth::user()->id){
            $checkout->delete();
            alert()->success('دسته بندی با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
        }

    }
}
