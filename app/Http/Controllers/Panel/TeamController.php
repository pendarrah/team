<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'admin'){
            $teams = Team::all();
        }elseif (\Auth::user()->type == 'supervisor'){
            $teams = Team::where('user_id', \Auth::user()->id)->get();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
        return view('app.panel.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( \Gate::allows('admin') OR \Gate::allows('supervisor')  ) {
            $categories = Category::all();
            return view('app.panel.teams.create');
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
            'name' => 'required',
            'avatar' => 'required',
            'banner' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',

        ]);


            $avatar = $this->uploadFile($request->file('avatar'));
            $banner = $this->uploadFile($request->file('banner'));
            Team::create(['user_id' => \Auth::user()->id, 'name' => $request->name, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id,'description' => $request->description, 'avatar' => $avatar, 'banner' => $banner]);

            alert()->success('تیم با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('team.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        if (\Gate::allows('admin')) {
            return view('app.panel.teams.edit', compact('team'));
        } else if (\Gate::allows('supervisor') && $team->user_id == \Auth::user()->id) {
            return view('app.panel.teams.edit', compact('team'));
        } else {
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'banner' => 'nullable',
            'description' => 'required',
            'avatar' => 'nullable|mimes:png,PNG,jpeg,JPEG,gif',
            'gender' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->has('avatar') AND $request->has('banner')) {
            $avatar = $this->uploadFile($request->file('avatar'));
            $banner = $this->uploadFile($request->file('banner'));
            $team->update( ['name' => $request->name, 'avatar' => $avatar, 'banner' => $banner,  'description' => $request->description, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id]);
            alert()->success('تیم با موفقیت اضافه شد', 'ویرایش شد');
            return redirect()->route('team.index');

        } else if($request->has('avatar')) {

            $avatar = $this->uploadFile($request->file('avatar'));
            $team->update(['name' => $request->name, 'avatar' => $avatar,  'description' => $request->description, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id]);
            alert()->success('تیم با موفقیت اضافه شد', 'ویرایش شد');
            return redirect()->route('team.index');

        } else if($request->has('name')) {
            $team->update(['name' => $request->name,  'description' => $request->description, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id]);
            alert()->success('تیم با موفقیت اضافه شد', 'ویرایش شد');
            return redirect()->route('team.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $team = Team::find($request->id);
        if ($team->user_id == \Auth::user()->id){
            $team->delete();
            alert()->success('تیم با موفقیت حذف شد', 'حذف شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->back();
        }

    }

    public function users(Request $request)
    {
        if( \Gate::allows('admin') OR \Gate::allows('supervisor') ) {
            $team = Team::where('id', $request->id)->first();
            $users = $team->users;
            return view('app.panel.teams.users', compact( 'team', 'users'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

    public function events(Request $request)
    {
        if( \Gate::allows('admin') OR \Gate::allows('supervisor') ) {
            $team = Team::where('id', $request->id)->first();
            $events = $team->events;
            return view('app.panel.teams.events', compact( 'team', 'events'));
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->route('panel.index');
            exit;
        }
    }

}
