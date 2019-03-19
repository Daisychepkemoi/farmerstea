<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use App\Notification;
use App\Mail\ReplyContact;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index()
    {
    	$user = auth()->user();
        $notcount = Notification::get()->count();
        $notifications = Notification::orderBy('created_at','desc')->paginate(3);
         $nots = Notification::latest()->paginate(3);

    	$contacts = Contacts::get();
    	return view('admin.contactusreport',compact('user','notcount','notifications','nots','contacts'));

    }
    public function contactid($id)
    {
    	 DB::table('contacts')->where('id', $id)->update(['status' => 'read','updated_at'=>now()]);

    	$user = auth()->user();
        $notcount = Notification::get()->count();
        $notifications = Notification::orderBy('created_at','desc')->paginate(3);
         $nots = Notification::latest()->paginate(3);
         $contacts = Contacts::orderBy('created_at','desc')->paginate(3);

    	$contact = Contacts::find($id);
    	return view('admin.contactid',compact('user','notcount','notifications','nots','contact','contacts'));

    }
     public function reply(request $request)
    {
    	
    	 Mail::send(new ReplyContact($title,$body,$email));
    	     	return redirect('/admin/contactus')->with('success','Reply Sent Successfully');
    }
     public function sort(request $request)
    {
    	$user = auth()->user();
        $notcount = Notification::get()->count();
        $notifications = Notification::orderBy('created_at','desc')->paginate(3);
         $nots = Notification::latest()->paginate(3);

    if (request('month') == 'All') {
    	// dd(re)
    	    $contacts = Contacts::whereYear('created_at', request('year'))->get();
    	    return view('admin.contactusreport',compact('user','notcount','notifications','nots','contacts'));
    }
    else 
    {
       $contacts = Contacts::whereYear('created_at', request('year'))->whereMonth('created_at',request('month'))->get();
       return view('admin.contactusreport',compact('user','notcount','notifications','nots','contacts'));

    }
    	

    }

    
}
