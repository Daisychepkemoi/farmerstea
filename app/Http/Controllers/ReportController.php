<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Tea;
use DB;
use App\Tea_Details;
use App\Notification;
// use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function teasreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role','user')->get()->count();
        $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
        $netmonth=Tea_Details::where('tea_no',$teas)->groupBy('tea_no')->sum('net_weight');
        $tea = Tea::whereIn('tea_no',$teas)->first();
            // foreach ($netmonth as $net ) {
                // $tea = Tea::where('tea_no',$net->tea_no)->first();
                $totalkg = Tea_Details::sum('net_weight');
                          $nots = Notification::latest()->paginate(3);

                // $net_weight = Tea_Details::where('tea_no' , $net->tea_no)->sum('net_weight');
                // $totalksh = $net_weight * 20 ; //total kg transformed to kenya shillings each at 20ksh

             // dd($net_weight);
                // }
                           return view('admin.farmersreport',compact('user','netmonth','notcount','tea','totalkg','net_weight','totalksh','farmer','nots'));

      
       
    }
    public function farmersreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role','user')->get()->count();
        $farmers = User::where('role','user')->latest()->get();
                           $nots = Notification::latest()->paginate(3);

        return view('admin.farmersreport',compact('user','notcount','totalksh','farmer','farmers','nots'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
