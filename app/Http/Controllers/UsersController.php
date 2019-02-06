<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Event;
use App\User;
use App\Tea;
use App\Notification;
use App\Tea_Details;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //i acre=911kg.
    //1kg=28.80 sh bonus
    //1492 ksh for 50kg fert bag
    //8bags per acre.
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     // protected $user = auth()->user();
    

    public function admin()
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
        return view('dashboard.admin',compact('user','notcount'));
    }
    public function report()
    {
        $user = auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        $teauser= Tea::where('user_id', $user->id)->pluck('tea_no');
          $db = DB::raw('YEAR(date_offered) as date');
        $year = Tea_Details::select($db)->orderBy('date', 'DESC')->pluck('date')->unique();
        $teadetail = Tea_Details::whereIn('tea_no',$teauser)->orderBy('date_offered','DESC')->paginate(15);
        $teadetaila = Tea_Details::whereIn('tea_no',$teauser)->pluck('net_weight')->sum();
         $notcount = Notification::get()->count();
        return view('dashboard.reports', compact('user', 'tea','teadetail','teadetaila','notcount','year'));
    }
    public function sortreport()
    {
        $user = auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        $teauser= Tea::where('user_id', $user->id)->pluck('tea_no');
         $db = DB::raw('YEAR(date_offered) as date');
        $year = Tea_Details::select($db)->orderBy('date', 'DESC')->pluck('date')->unique();
         $month = request('month');
        $nmonth = date('m',strtotime($month));
        $teadetail = Tea_Details::whereIn('tea_no',$teauser)->whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->orderBy('date_offered','DESC')->paginate(10);
        $teadetaila = Tea_Details::whereIn('tea_no',$teauser)->whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->pluck('net_weight')->sum();
         $notcount = Notification::get()->count();
        return view('dashboard.reports', compact('user', 'tea','teadetail','teadetaila','notcount','year'));
    }
   
    public function notification()
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
        return view('dashboard.notification',compact('notcount','user'));
    }
    public function notificationid()
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
        return view('dashboard.notificationid',compact('notcount','user'));
    }
    public function profile()
    {
        $user=auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
         $notcount = Notification::get()->count();
        // dd($tea);
        return view('dashboard.profile', compact('user', 'tea','notcount'));
    }
    public function editprofile(tea $tea)
    {
        $user=auth()->user();
         $notcount = Notification::get()->count();
        $tea= Tea::where('user_id', $user->id)->get();
        return view('dashboard.editprofile', compact('user', 'tea','notcount'));
    }
    public function generate()
    {
        $pdf = PDF::loadView('dashboard.rename');
        // If you want to store the generated pdf to the server then you can use the store function
        // $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('customers.pdf');
    }
    public function edit(tea $tea, $id, Request $request)
    {
        $users= User::find($id);
        $users->f_name=$request->get('firstname');
        $users->l_name=$request->get('lastname');
        $users->national_id=$request->get('national_id');
        // $users->national_id=$request->get('location');
        $users->phone_no=$request->get('phone_no');
        $users->email=$request->get('email');
        // $users->password=$request->get('password');
            
        $users->save();
        return redirect('/profile');
        // dd($users);
    }
}
