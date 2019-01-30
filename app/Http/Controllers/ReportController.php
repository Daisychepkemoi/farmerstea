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
    
    public function farmersreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role','user')->get()->count();
        // $users = User::where('role','user')->orderBy('id','desc')->get();
        // $userid = User::where('role','user')->orderBy('id','desc')->pluck('id');
        // // $us = DB::User('f_name','l_name')->join('tea','tea.user_id','=','user.id')->paginate(4);
        // $teano = Tea::whereIn('user_id',$userid)->pluck('tea_no');
        // $tea = Tea::whereIn('user_id',$userid)->get();
        // $tea_no = Tea::pluck()->sum();
        $teatotal = Tea::get()->count();
        $db = DB::raw('sum(net_weight) as net_weight');

      
        $teasum = DB::table('tea__details')
        ->select('tea_no',$db)
        ->groupBy('tea_no')
        ->paginate(15);
        // $userid = Tea::whereIn('tea_no',$teasum->tea_no)->pluck('user_id');
        // dd($teasum->tea_no);
        $totalkg = Tea_Details::sum('net_weight');
        // dd($teasum->tea_no);
        // $teasumm = Tea_Details::whereIn('tea_no',$teano)->pluck('net_weight','tea_no');
      
        return view('admin.farmersreport',compact('user','notcount','users','totalkg','tea','teasum','farmer','teatotal'));
       
    }
    public function index()
    {
        //
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
