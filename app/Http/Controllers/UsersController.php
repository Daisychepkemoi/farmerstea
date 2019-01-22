<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Tea;
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


    //
    public function index()
    {
        return view('posts.index');
    }

    public function admin()
    {
        return view('dashboard.admin');
    }
    public function report()
    {
        $user = auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        // dd($tea);
        return view('dashboard.reports', compact('user', 'tea'));
    }
    public function events()
    {
        return view('dashboard.events');
    }
    public function eventid()
    {
        return view('dashboard.eventid');
    }
    public function notification()
    {
        return view('dashboard.notification');
    }
    public function notificationid()
    {
        return view('dashboard.notificationid');
    }
    public function profile()
    {
        $user=auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        // dd($tea);
        return view('dashboard.profile', compact('user', 'tea'));
    }
    public function editprofile(tea $tea)
    {
        $user=auth()->user();
        $tea= Tea::where('user_id', $user->id)->get();
        return view('dashboard.editprofile', compact('user', 'tea'));
    }
    public function generate()
    {
        $pdf = PDF::loadView('dashboard.rename');
        // If you want to store the generated pdf to the server then you can use the store function
        // $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('customers.pdf');
    }
    public function edit($id)
    {
        $users= User::find($id);
    }
}
