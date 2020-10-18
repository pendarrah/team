<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

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
            'avatar' => 'nullable',
            'banner' => 'nullable',
            'description' => 'required',
            'gender' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',

        ]);


        if ($request->has('avatar') AND $request->has('banner')) {
            $avatar = $this->uploadFile($request->file('avatar'));
            $banner = $this->uploadFile($request->file('banner'));
            $team = Team::create(['user_id' => \Auth::user()->id, 'name' => $request->name, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id,'description' => $request->description, 'avatar' => $avatar, 'banner' => $banner]);
            \DB::table('team_user')->insert(['team_id' => $team->id ,'user_id' => \Auth::user()->id, 'owner_id' => \Auth::user()->id, 'status' => 'accept' ]);
            alert()->success('تیم با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('team.index');

        } else if($request->has('avatar')) {

            $avatar = $this->uploadFile($request->file('avatar'));
            $team = Team::create(['user_id' => \Auth::user()->id, 'name' => $request->name, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id,'description' => $request->description, 'avatar' => $avatar]);
            \DB::table('team_user')->insert(['team_id' => $team->id ,'user_id' => \Auth::user()->id, 'owner_id' => \Auth::user()->id, 'status' => 'accept' ]);
            alert()->success('تیم با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('team.index');

        } else if($request->has('banner')) {
            $banner = $this->uploadFile($request->file('banner'));
            $team = Team::create(['user_id' => \Auth::user()->id, 'name' => $request->name, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id,'description' => $request->description,  'banner' => $banner]);
            \DB::table('team_user')->insert(['team_id' => $team->id ,'user_id' => \Auth::user()->id, 'owner_id' => \Auth::user()->id, 'status' => 'accept' ]);
            alert()->success('تیم با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('team.index');
        }else{
            $team = Team::create(['user_id' => \Auth::user()->id, 'name' => $request->name, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id,'description' => $request->description]);
            \DB::table('team_user')->insert(['team_id' => $team->id ,'user_id' => \Auth::user()->id, 'owner_id' => \Auth::user()->id, 'status' => 'accept' ]);
            alert()->success('تیم با موفقیت اضافه شد', 'اضافه شد');
            return redirect()->route('team.index');
        }

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

        } else if($request->has('banner')) {
            $banner = $this->uploadFile($request->file('banner'));
            $team->update(['name' => $request->name, 'banner' => $banner, 'description' => $request->description, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id]);
            alert()->success('تیم با موفقیت اضافه شد', 'ویرایش شد');
            return redirect()->route('team.index');
        }else{
            $team->update(['name' => $request->name, 'description' => $request->description, 'gender' => $request->gender, 'city_id' => $request->city_id, 'category_id' => $request->category_id]);
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


    public function invite(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'fName' => 'required|min:2|max:25',
            'lName' => 'required|min:2|max:25',
            'mobile' => 'required|digits:11',
        ]);

        $user = User::where('mobile', $request->mobile)->get();
        if ($user->count() === 1){
            $user = User::where('mobile', $request->mobile)->first();
            if (\DB::table('team_user')->where('user_id', $user->id)->where('team_id', $request->team_id)->get()->count() >= 1){
                alert()->warning('کاربر به تیم دعوت شده است');
                return redirect()->back();
            }else{
                $user = User::where('mobile', $request->mobile)->first();
                $team = Team::where('id', $request->team_id)->first();
                \DB::table('team_user')->insert(['user_id' => $user->id, 'team_id' => $request->team_id, 'status' => 'accept', 'owner_id' => $team->user_id]);

                $client = new Client();
                $res = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                    'form_params' => [
                        'username' => 'riecocompany',
                        'password' => 'ali021ALI)@!',
                        'to' => $user->mobile,
                        'from' => '10001010111',
                        'text' => "$user->fName عزیز، شما به تیم $team->name دعوت شده اید.
لینک عضویت:
https://teamofit.com/teams/$team->id
تیموفیت",
                    ]
                ]);

                alert()->success('کاربر به تیم دعوت شد', 'دعوت شد');
                return redirect()->back();
            }
        }else{
            $password = mt_rand(1111,99999);
            $user = User::create(['mobile' => $request->mobile, 'fName' => $request->fName, 'lName' => $request->lName, 'password' => Hash::make($password), 'status' => 2]);
            $team = Team::where('id', $request->team_id)->first();
            \DB::table('team_user')->insert(['user_id' => $user->id, 'team_id' => $request->team_id, 'status' => 'accept', 'owner_id' => $team->user_id]);

            $client = new Client();
            $res = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                'form_params' => [
                    'username' => 'riecocompany',
                    'password' => 'ali021ALI)@!',
                    'to' => $user->mobile,
                    'from' => '10001010111',
                    'text' => "$request->fName عزیز، شما به تیم $team->name دعوت شده اید.
نام کاربری: $user->mobile
رمز عبور: $password  
https://teamofit.com/teams/$team->id
تیموفیت",
                ]
            ]);

            alert()->success('کاربر به تیم دعوت شد', 'دعوت شد');
            return redirect()->back();
        }

    }


    public function remove(Request $request)
    {
        $team = Team::find($request->team_id);
        if ($team->user_id == \Auth::user()->id){
            \DB::table('team_user')->where('user_id', $request->user_id)->where('team_id', $team->id)->delete();
            alert()->success('کاربر با موفقیت اخراج شد', 'اخراج شد');
            return redirect()->back();
        }else{
            alert()->warning('عدم دسترسی');
            return redirect()->back();
        }

    }


}




