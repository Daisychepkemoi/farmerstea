<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Event;
use App\User;
use App\Tea;
use App\Posts;
use Str;
use App\Notification;
use App\Tea_Details;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    
   
    public function __construct()
    {
        $this->middleware('auth')->except('index','notificationid','notification');
       
    }

  
      public function homeordash(){
         $user = auth()->user();
         $notcount = Notification::get()->count();

         

         $posts = Posts::latest()->paginate(15);
         if(auth()->user()->verifiedadmin == 'verified' && $user->role == 'user' && $user->created_by == 'user'){
            return redirect('/dashboard'); //normal user/farmer

        }
        elseif ($user->verifiedadmin == 'notverified' && $user->role == 'admin' &&$user->created_by == 'admin') {
             return redirect('/dashboard'); //any other admin
        }
        elseif ($user->verifiedadmin == 'notverified' && $user->role == 'admin' &&$user->created_by == 'user') {
             return redirect('/dashboard'); //main admin
         }
        else{
            return redirect('/');
        }
        // return view('posts.index',compact('posts','user'));
    }
    public function index(){
         $user = auth()->user();
         // $notcount = Notification::get()->count();
         $posts = Posts::paginate(2);
                  $nots = Notification::latest()->paginate(3);

        return view('posts.index',compact('posts','user','nots'));
    }
    public function admin()
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
                  $nots = Notification::latest()->paginate(3);

        return view('dashboard.admin',compact('user','notcount','nots'));
    }
    public function report()
    {
        $user = auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        $teauser= Tea::where('user_id', $user->id)->pluck('tea_no');
          $db = DB::raw('YEAR(date_offered) as date');
        $year = Tea_Details::select($db)->orderBy('date', 'DESC')->pluck('date')->unique();
        $teadetail = Tea_Details::whereIn('tea_no',$teauser)->orderBy('date_offered','DESC')->paginate(60);
        $teadetaila = Tea_Details::whereIn('tea_no',$teauser)->pluck('net_weight')->sum();
         $notcount = Notification::get()->count();
                  $nots = Notification::latest()->paginate(3);

        return view('dashboard.reports', compact('user', 'tea','teadetail','teadetaila','notcount','year','nots'));
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
        $teadetail = Tea_Details::whereIn('tea_no',$teauser)->whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->orderBy('date_offered','DESC')->paginate(31);
        $teadetaila = Tea_Details::whereIn('tea_no',$teauser)->whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->pluck('net_weight')->sum();
         $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        return view('dashboard.reports', compact('user', 'tea','teadetail','teadetaila','notcount','year','nots'));
    }
   
    public function notification()
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
         $notification = Notification::orderBy('created_at','DESC')->paginate();
                          $nots = Notification::latest()->paginate(3);


        return view('dashboard.notification',compact('notcount','user','notification','nots'));
    }
    public function notificationid($id)
    {
        $user = auth()->user();
         $notcount = Notification::get()->count();
         $notification = Notification::find($id);
         $username  = User:: where('id',$notification->user_id)->first();
                          $nots = Notification::latest()->paginate(15);

        return view('dashboard.notificationid',compact('notcount','user','notification','username','nots'));
    }
    public function profile()
    {
        $user=auth()->user();
        $tea= Tea::where('user_id', $user->id)->first();
         $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        return view('dashboard.profile', compact('user', 'tea','notcount','nots'));
    }
    public function editprofile(tea $tea)
    {
        $user=auth()->user();
         $notcount = Notification::get()->count();
        $tea= Tea::where('user_id', $user->id)->first();
                          $nots = Notification::latest()->paginate(3);


        return view('dashboard.editprofile', compact('user', 'tea','notcount','nots'));
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

        $users = User::find($id);
        if(!($users->phone_no == $request->phone_no && $users->email == $request->email) ) {

           $validator = Validator::make($request->all(), [
            'f_name' => 'required|max:120',
            'l_name' => 'required|max:120',
            'phone_no' => 'required|unique:users|min:10|max:11',
            'national_id' => 'required|unique:users|min:7|max:10',
            'email' => 'required|email|unique:users',
           ]);

        if ($validator->fails()) {
            return redirect('/profile/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
         }
        }
      else{
         $users->f_name = $request->get('f_name');
        $users->l_name = $request->get('l_name');
        $users->phone_no = $request->get('phone_no');
        $users->national_id = $request->get('national_id');
        $users->email = $request->get('email');
        $users->save();
     
        $expected_produce =  911* request('no_acres');
        $bonus = $expected_produce * 28.80;
        $fert =   8 * request('no_acres');
        $teas = Tea::where('user_id',$id)->first();
        $teas->location = $request->get('location');
        $teas->no_acres = $request->get('no_acres');
        $teas->expected_produce = $expected_produce;
        $teas->no_of_fert = $fert;
        $teas->bonus = $bonus;
        $teas->save();
        return redirect('/profile');
      }
    }
}
