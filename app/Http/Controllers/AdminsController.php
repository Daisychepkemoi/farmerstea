<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Notification;
use App\Tea;
use Redirect;
use App\Contacts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEvent;
use App\Mail\VerifyFarmer;
use App\Mail\NewNotification;
use App\Mail\ContactForm;
use App\Mail\NewAdmin;
use App\Mail\RevokeAdmin;
use App\Mail\ContactReply;
use Illuminate\Support\Facades\Validator;




// use App\Notification\NewEvent;
// use Illuminate\Notifications\Notification;

// use App\Notifications\AcceptOrReject;



class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['viewevents','vieweventid','contactus']);
    }
    public function createevents()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $events = Event::orderBy('created_at','desc')->paginate(3);
        $nots = Notification::latest()->paginate(3);
        $mindate = now();

        return view('admin.createevents', compact('user', 'notcount','events','nots','mindate'));
    }
    public function store()
    {
        $user= auth()->user();
        $users =$user->id;
        $notcount = Notification::get()->count();
        $event = Event::create([
            'held_at'=>request('held_at'),
            'user_id'=>$users,
            'title'=>request('title'),
            'body'=>request('body'),
            
        ]);
        Mail::send(new NewEvent($event));
        return redirect('/admin/createevents');
    }

    public function vieweventid($id)
    {
        $user = auth()->user();
        $event= Event::where('id', $id)->first();
        $notcount = Notification::get()->count();
         $events = Event::orderBy('created_at','desc')->paginate(3);
         $auth = Event::where('id',$id)->first();

         $db = DB::raw('YEAR(held_at) as created');
        $eventyear = Event::select($db)->orderBy('created','DESC')->pluck('created')->unique();
        $users = User::where('id', $event->user_id)->first();
                          $nots = Notification::latest()->paginate(3);

        return view('admin.vieweventid', compact('user', 'event', 'users','auth', 'notcount','eventyear','nots'));
    }
    public function editeventview($id)
    {
        $user = auth()->user();
        $event= Event::find($id);
       
        $notcount = Notification::get()->count();
         $db = DB::raw('YEAR(held_at) as created');
        $eventyear = Event::select($db)->orderBy('created','DESC')->pluck('created')->unique();
        $users = User::where('id', $event->user_id)->first();
         $nots = Notification::latest()->paginate(3);
       $mindate = now();
         $events = Event::orderBy('created_at','desc')->paginate(3);
         // $date = Event::where('id',$id)->pluck('held_at');
         // $cform = $date->format('y-m-d');
         // dd(cform);



        return view('admin.editevent', compact('user','mindate', 'event','events', 'users', 'notcount','eventyear','nots'));
    }

    
    public function editevent($id, Request $request)
    {
        $user = auth()->user();
        $event= Event::find($id);
        $event->title=$request->get('title');
        $event->held_at=$request->get('held_at');
        $event->body=$request->get('body');
        $event->user_id=$user->id;
            
        $event->save();
        $notcount = Notification::get()->count();
         $db = DB::raw('YEAR(held_at) as created');
        $eventyear = Event::select($db)->orderBy('created','DESC')->pluck('created')->unique();
        $users = User::where('id', $event->user_id)->first();
                          $nots = Notification::latest()->paginate(3);

        return redirect('/viewevents')->with('success', 'Event Edited successfully');
    }
    public function viewevents()
    {
       
        $db = DB::raw('YEAR(held_at) as created');
        $eventyear = Event::select($db)->orderBy('created','DESC')->pluck('created')->unique();
        $user = auth()->user();
        $event = Event::all();
      $nots = Notification::latest()->paginate(3);

        $notcount = Notification::get()->count();
        if ($event->count() > 0) {
            $user_id = Event::pluck('user_id');
            $events = Event::orderBy('held_at', 'DESC')->paginate();
            $createdby= User::where('id', $user_id)->get();
                          $nots = Notification::latest()->paginate(3);

            return view('admin.viewevents', compact('user', 'events', 'createdby', 'notcount','nots','eventyear','nots'));
        } else {
          
            return view('admin.emptyevent', compact('user', 'notcount','eventyear','nots'));
        }
    }
    public function createnotification()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $notifications = Notification::orderBy('created_at','desc')->paginate(3);
                          $nots = Notification::latest()->paginate(3);


        return view('admin.createnotification', compact('user', 'notcount','notifications','nots'));
    }
    public function storenotification(Request $request)
    {
        $user= auth()->user();
        $users =$user->id;
        $detail=$request->body;
 
        // $dom = new \domdocument();
        // $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $detail = $dom->savehtml();
        $notification = Notification::create([
                'user_id'=>$users,
                'title'=>request('title'),
                'body'=>$detail,
        ]);
        Mail::send(new NewNotification($notification));
        return redirect('/admin/createnotification');
    }
    public function contactus( Request $request)
    {

        $email = $request->email;
             $contactus = Contacts::create([
                'email'=>request('email'),
                'title'=>request('title'),
                'body'=>$request->body,
        ]);

           
          Mail::send(new ContactForm($contactus));
         Mail::send(new ContactReply($email));

          return redirect('/')->with('success', 'Message sent Successfully');
    }

    public function viewnotifications()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        if ($notcount>0) {
            $notification = Notification::orderBy('created_at', 'DESC')->paginate(7);
            $user_id = Notification::pluck('user_id');
            $createdby =User::where('id', $user_id)->get();
                          $nots = Notification::latest()->paginate(3);


            return view('admin.viewnotifications', compact('notification', 'user', 'createdby', 'notcount','nots'));
        } else {
            return view('admin.emptynot', compact('user', 'notcount','nots'));
        }
    }
    
  
    public function viewnotificationid($id)
    {
        $user = auth()->user();
        $notification= Notification::where('id', $id)->first();
        $users = User::where('id', $notification->user_id)->first();
        $notcount = Notification::get()->count();
        $nots = Notification::latest()->paginate(3);
        return view('admin.viewnotificationid', compact('user', 'users', 'notification', 'notcount','nots'));
    }
     public function editnotificationid($id, Request $request)
    {
        $user = auth()->user();
        $notification= Notification::find($id);
        $notification->title=$request->get('title');
        $notification->body=$request->get('body');
        $notification->user_id=$user->id;
            
        $notification->save();
        

        return redirect('/notifications')->with('success', 'Event Edited successfully');
    }
    public function editnotificationview($id)
    {
        $user = auth()->user();
        $notification= Notification::where('id', $id)->first();
        $users = User::where('id', $notification->user_id)->first();
        $notcount = Notification::get()->count();
        $nots = Notification::latest()->paginate(3);
        $auth = Notification::where('id',$id)->first();

        return view('admin.editnotification', compact('user', 'users','auth', 'notification', 'notcount','nots'));
    }
    public function profile()
    {
                          $nots = Notification::latest()->paginate(3);

        return view('admin.adminprofile','nots');
    }
    public function upgradefarmer()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        // $farmers = User::where('verifiedadmin', 'notverified')->where('role', 'user')->where('created_by', 'user')->orderBy('created_at', 'DESC')->paginate(15);
         $farmers = DB::table('users')->join('teas','users.id','=', 'teas.user_id')->select('users.*','teas.tea_no')->where('users.verifiedadmin','notverified')->where('role','user')->orderBy('updated_at','desc')->paginate(15);
        $rejected = User::where('verifiedadmin', 'denied')->where('role', 'user')->where('created_by', 'user')->orderBy('updated_at', 'DESC')->paginate(15);
        // dd($farmers);
        $farmerver = DB::table('users')->join('teas','users.id','=', 'teas.user_id')->select('users.*','teas.tea_no')->where('users.verifiedadmin','verified')->where('role','user')->orderBy('updated_at','desc')->paginate(15);
        // dd($farmerver);
            $revokedfarmer = DB::table('users')->join('teas','users.id','=', 'teas.user_id')->select('users.*','teas.tea_no')->where('users.verifiedadmin','revoked')->orderBy('updated_at','desc')->paginate(15);
        // dd($farmers);
        return view('crudfarmer.verifyfarmer', compact('user', 'notcount', 'farmers', 'farmerver', 'rejected', 'tea_no', 'revokedfarmer','nots'));
    }
    public function verifyfarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        
        $admin = User::where('role', 'admin')->pluck('f_name');

        // $tea_no = Tea::whereIn('verified_by', $admin)->orderBy('updated_at','desc')->first();
        $teano = Tea::max('tea_no');
                          $nots = Notification::latest()->paginate(3);

        // $tea
        // dd($teano);
        // dd($tea_no == null);
        if($teano == null){
            // $tea = 1;
            // $tea = $tea+1;
             DB::table('teas')->where('user_id', $request->id)->update(['tea_no' => 1,'updated_at'=>now(),'date_verified'=>now(),'verified_by'=>$user->f_name]);
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'verified']);
        

        }
        else{
             $tea = $teano + 1;
             // dd($teano);
              DB::table('teas')->where('user_id', $request->id)->update(['tea_no' => $tea,'date_verified'=>now(),'updated_at'=>now(),'verified_by'=>$user->f_name]);
            DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'verified','updated_at'=>now()]);

         // $farmers = Tea::where('user_id',$id)->first();
         // dd($farmers);

        }
         $farmer = User::find($id);
                Mail::send(new VerifyFarmer($farmer));
         
        return redirect('/admin/upgradefarmer');
    }
    public function denyfarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'denied','updated_at'=>now()]);
     $farmer = User::find($id);
      Mail::send(new VerifyFarmer($farmer));

        return redirect('/admin/upgradefarmer');
    }
    public function revokefarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
 
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'revoked','updated_at'=>now()]);
       $farmer = User::find($id);
       // dd($farmer);
       Mail::send(new VerifyFarmer($farmer));
        return redirect('/admin/upgradefarmer');
    }
    public function unrevokefarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'verified','updated_at'=>now()]);
       $farmer = User::find($id);
      Mail::send(new VerifyFarmer($farmer));
        return redirect('/admin/upgradefarmer');
    }
    public function addrole(Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        if ($user->role =='admin' && $user->created_by=='user') {
            $farmerver = User::where('role', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
            $admins = User::where('role', 'admin')->where('created_by', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
            $admindenied = User::where('role', 'user')->where('created_by', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
                          $nots = Notification::latest()->paginate(3);

   
            return view('crudfarmer.addrole', compact('user', 'notcount', 'farmerver', 'admins', 'admindenied','nots'));
        } else {
            abort('403', 'unauthorized action');
        }
    }
    public function removepriviledge($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $farmerver = User::where('role', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
        DB::table('users')->where('id', $id)->update(['role' => 'user']);
        $admin = User::find($id);
        Mail::send(new RevokeAdmin($admin));

        return redirect('/admin/addrole');
    }
    public function addpriviledge($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $farmerver = User::where('role', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
        DB::table('users')->where('id', $id)->update(['role' => 'admin']);
        $admin = User::find($id);
        Mail::send(new RevokeAdmin($admin));

        return redirect('/admin/addrole');
    }
    public function addadmin(request $request)
    {
        $user = auth()->user();
        $users =$user->f_name;
        $notcount =Notification::get()->count();
        // dd(request('function'));
        $password = request('password');
        // dd($password);
        // $admin = User::where('id',20)->first();
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|max:120',
            'l_name' => 'required|max:120',
            'phone_no' => 'required|unique:users|min:10|max:11',
            'national_id' => 'required|unique:users|min:7|max:10',
            'email' => 'required|email|unique:users',
          'password' => 'required|string|min:6',

           ]);
        if ($validator->fails()) {
            return redirect('/admin/addrole')
                        ->withErrors($validator)
                        ->withInput();
         }
         else{
        $admin = User::create([
            'f_name'=>request('f_name'),
            'l_name'=>request('l_name'),
            'created_by'=>request('created_by'),
            'national_id'=>request('national_id'),
            'phone_no'=>request('phone_no'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
            
            'role'=>'admin',
             ]);
            // dd($admin);
        // Mail::send(new NewAdmin($admin));


        DB::table('users')->where('id', $admin->id)->update(['created_by' => $users,'role'=>'admin','function' => request('function')]);
        Mail::send(new NewAdmin($admin,$password));
        return redirect('/admin/addrole')->with('success','New Admin Added Successfully');
    }
    }
    public function back()
    {
        return redirect('/viewnotifications');
    }
    public function editfarmer($id,Request $request)
    {
        $user = auth()->user();
        $notcount =Notification::get()->count();
        $farmer = User::find($id);
        // dd($farmer);
        $tea= Tea::where('user_id', $farmer->id)->first();
                          $nots = Notification::latest()->paginate(3);

        // dd($tea);

        return view('admin.editfarmer',compact('user','farmer','tea','notcount','nots'));

    }
    public function saveeditfarmer($id,Request $request)
    {
        $users= User::find($id);
        $users->f_name=$request->get('firstname');
        $users->l_name=$request->get('lastname');
        $users->national_id=$request->get('national_id');
        $users->phone_no=$request->get('phone_no');
        $users->email=$request->get('email');
            
        $users->save();
         // $tea= Tea::where('user_id', $id)->first();
         // dd/($users);

        // dd($request->get('lastname'));
        $expected_produce=  911* request('no_acres');
        $bonus= $expected_produce * 28.80;
        $fert=   8 * request('no_acres');
        
          $up =DB::table('teas')->where('user_id', $id)->update(['no_acres'=>request('no_acres'),'location'=>request('location'),'expected_produce'=>$expected_produce,'bonus'=>$bonus,'no_of_fert'=>$fert]);
          // dd($up);
        $user = auth()->user();
        $notcount =Notification::get()->count();
        $farmer = User::find($id);
        // dd($farmer);
        $tea= Tea::where('user_id', $farmer->id)->first();
                          $nots = Notification::latest()->paginate(3);
        return redirect('/admin/upgradefarmer')->with('success','Farmers details editted successfully');

       // return view('admin.editfarmer',compact('user','farmer','tea','notcount','nots'));

    }
}
