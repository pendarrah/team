<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( \Gate::allows('admin')) {
            $categories = Category::all();
            return view('app.panel.categories.index', compact('categories'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( \Gate::allows('admin')) {
            $categories = Category::all();
            return view('app.panel.categories.create');
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
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

        Category::create(['title' => $request->title, 'english' => $request->english]);

        alert()->success('دسته بندی با موفقیت اضافه شد', 'اضافه شد');
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
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
            $categories = Category::all();
            return view('app.panel.categories.edit', compact('category'));
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
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        if ($category->user_id == \Auth::user()->id){
            $category->delete();
            alert()->success('دسته بندی با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
        }

    }
}
