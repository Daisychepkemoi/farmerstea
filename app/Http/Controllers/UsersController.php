<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        return view('dashboard.reports');
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
        return view('dashboard.profile');
    }
    public function editprofile()
    {
        return view('dashboard.editprofile');
    }
    public function generate()
    {
        // set_time_limit(0);
        // if($request->has('download')) {
        //     // pass view file
        //     $pdf = PDF::loadView('dashboard.report');
        //     // download pdf
        //     return $pdf->download('userlist.pdf');
        // }
        // return view('dashboard.report');
         // $data = Customer::get();
         // $data = 'Data';
    // Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadView('dashboard.rename');
    // If you want to store the generated pdf to the server then you can use the store function
    // $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
    return $pdf->download('customers.pdf');
    }


// $pdf = PDF::loadView('pdf.test', ['data' => $data]);
// return $pdf->download('teste.pdf');


}
