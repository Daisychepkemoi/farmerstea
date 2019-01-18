<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
     public function admin()
    {
        return view('admin.admindashboard');//
    }
     public function report()
    {
        return view('admin.report');
    }
     public function createevents()
    {
        return view('admin.createevents');
    }
     public function vieweventid()
    {
        return view('admin.vieweventid');
    }
    public function viewevents()
    {
        return view('admin.viewevents');
    }
    
     public function viewnotifications()
    {
        return view('admin.viewnotifications');
    }
     public function createnotification()
    {
        return view('admin.createnotification');
   }
    public function viewnotificationid()
    {
        return view('admin.viewnotificationid');
    }
    public function profile()
    {
        return view('admin.adminprofile');
    }
}
