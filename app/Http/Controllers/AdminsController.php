<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Notification;
use App\Tea;
use Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // $notcount = Notification::get()->count();
    public function admin()
    {
        $notcount = Notification::get()->count();
        return view('admin.admindashboard', compact('notcount'));//
    }
    // public function report()
    // {
    //     $notcount = Notification::get()->count();
    //     return view('admin.report', compact('notcount'));
    // }
    public function createevents()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        return view('admin.createevents', compact('user', 'notcount'));
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
        return redirect('/admin/viewevents');
    }

    public function vieweventid($id)
    {
        $user = auth()->user();
        $event= Event::where('id', $id)->first();
        $notcount = Notification::get()->count();
        $users = User::where('id', $event->user_id)->first();
        return view('admin.vieweventid', compact('user', 'event', 'users', 'notcount'));
    }
    public function viewevents()
    {
        $user = auth()->user();
        $event = Event::all();
        $notcount = Notification::get()->count();
        if ($event->count() > 0) {
            // $eventcount= Event::('user_id');
            $user_id = Event::pluck('user_id');
            $events = Event::orderBy('held_at', 'DESC')->get();
            $createdby= User::where('id', $user_id)->get();
            // dd($events);
            return view('admin.viewevents', compact('user', 'events', 'createdby', 'notcount'));
        } else {
            return view('admin.emptyevent', compact('user', 'notcount'));
        }
    }
    public function createnotification()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        return view('admin.createnotification', compact('user', 'notcount'));
    }
    public function storenotification(Request $request)
    {
        $user= auth()->user();
        $users =$user->id;
        $detail=$request->body;
 
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->savehtml();
        $notification = Notification::create([
                'user_id'=>$users,
                'title'=>request('title'),
                'body'=>$detail,
        ]);
        //     return view('summernote_display',compact('summernote'));

       
        // // $notcount = Notification::get()->count();
        // $notification = Notification::create([
            
            
            
            
        // ]);
        // dd($notification);
        return redirect('/admin/viewnotifications');
    }
    public function viewnotifications()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        if ($notcount>0) {
            $notification = Notification::orderBy('created_at', 'DESC')->paginate(7);
            $user_id = Notification::pluck('user_id');
            $createdby =User::where('id', $user_id)->get();
            // $all = Notification::orderBy('created_at', 'DESC')->pluck('body');
            // $body = $all->body;
            // $bodylimitd = str::limit($all, 100, '...');

            // dd($bodylimitd);
            return view('admin.viewnotifications', compact('notification', 'user', 'createdby', 'notcount'));
        } else {
            return view('admin.emptynot', compact('user', 'notcount'));
        }
    }
    
  
    public function viewnotificationid($id)
    {
        $user = auth()->user();
        $notification= Notification::where('id', $id)->first();
        $users = User::where('id', $notification->user_id)->first();
        $notcount = Notification::get()->count();
        // dd($notification);

        // DB::table('notifications')->where('id',$id)->update(['viewed' => true]);
        return view('admin.viewnotificationid', compact('user', 'users', 'notification', 'notcount'));
    }
    public function profile()
    {
        return view('admin.adminprofile');
    }
    public function upgradefarmer()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $farmers = User::where('verifiedadmin', 'notverified')->where('role', 'user')->where('created_by', 'user')->orderBy('created_at', 'DESC')->paginate(15);
        $rejected = User::where('verifiedadmin', 'denied')->where('role', 'user')->where('created_by', 'user')->orderBy('created_at', 'DESC')->paginate(15);
        // dd($farmers);
        $farmerver = User::where('verifiedadmin', 'verified')->where('role', 'user')->where('created_by', 'user')->orderBy('updated_at', 'DESC')->paginate(15);
        $revokedfarmer = User::where('verifiedadmin', 'revoked')->where('role', 'user')->where('created_by', 'user')->orderBy('updated_at', 'DESC')->paginate(15);
        // dd($farmers);
        return view('crudfarmer.verifyfarmer', compact('user', 'notcount', 'farmers', 'farmerver', 'rejected', 'tea_no', 'revokedfarmer'));
    }
    public function verifyfarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        
        $admin = User::where('role', 'admin')->pluck('f_name');
        $tea_no = Tea::whereIn('verified_by', $admin)->latest()->first();
        $tea = $tea_no->tea_no+1;
        

        
        DB::table('teas')->where('user_id', $request->id)->update(['tea_no' => $tea,'date_verified'=>now(),'verified_by'=>$user->f_name]);
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'verified']);
       
        return redirect('/admin/upgradefarmer');
    }
    public function denyfarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        
      
        // DB::table('teas')->where('user_id', $request->id)->update(['tea_no' => $tea ,'date_verified'=>now(),'verified_by'=>$user->f_name]);
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'denied']);
       
        return redirect('/admin/upgradefarmer');
    }
    public function revokefarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        
      
        // DB::table('teas')->where('user_id', $request->id)->update(['tea_no' => $tea ,'date_verified'=>now(),'verified_by'=>$user->f_name]);
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'revoked']);
       
        return redirect('/admin/upgradefarmer');
    }
    public function unrevokefarmer($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        DB::table('users')->where('id', $request->id)->update(['verifiedadmin' => 'verified']);
       
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
   
            return view('crudfarmer.addrole', compact('user', 'notcount', 'farmerver', 'admins', 'admindenied'));
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
        return redirect('/admin/addrole');
    }
    public function addpriviledge($id, Request $request)
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $farmerver = User::where('role', 'admin')->orderBy('updated_at', 'DESC')->paginate(15);
        DB::table('users')->where('id', $id)->update(['role' => 'admin']);
        return redirect('/admin//addrole');
    }
    public function addadmin()
    {
        $user = auth()->user();
        $users =$user->f_name;
        $notcount =Notification::get()->count();
        $admin = User::create([
            'f_name'=>request('firstname'),
            'l_name'=>request('lastname'),
            'created_by'=>request('created_by'),
            'national_id'=>request('national_id'),
            'phone_no'=>request('phone_no'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
            
            'role'=>'admin',
            

        ]);
        DB::table('users')->where('id', $admin->id)->update(['created_by' => $users]);
        // dd($admin->created_by);
        return redirect('/admin/addrole');
    }
    public function back()
    {
        return redirect('/viewnotifications');
    }
}
