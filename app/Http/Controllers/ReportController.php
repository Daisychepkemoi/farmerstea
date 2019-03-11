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
use PDF;
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
    public function farmers()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $verified = User::where('created_by', 'user')->where('role', 'user')->where('verifiedadmin', 'verified')->count();
        $notverified = User::where('created_by', 'user')->where('role', 'user')->where('verifiedadmin', 'notverified')->count();
        $denied = User::where('created_by', 'user')->where('role', 'user')->where('verifiedadmin', 'denied')->count();
        $revoked = User::where('created_by', 'user')->where('role', 'user')->where('verifiedadmin', 'revoked')->count();
        $all = User::where('created_by', 'user')->where('role', 'user')->count();
        // dd($all);
        $locations = Tea::pluck('location')->unique()->count();
        // dd($locations);
        $pdf = PDF::loadView('docs.farmers', compact('verified', 'notverified', 'denied', 'revoked', 'all', 'user', 'locations')) ;       
         return $pdf->download( now().'farmersreport.pdf');
        return view('docs.farmers', compact('verified', 'notverified', 'denied', 'revoked', 'all', 'user', 'locations'));
    }
    public function tea()
    {
        $user = auth()->user();
        $montha = request('month');
        $yr = request('year');
        if (request('month') == 'All') {
            $total = Tea_Details::whereYear('date_offered', request('year'))->sum('net_weight');
            $teano = Tea_Details::whereYear('Date_offered', request('year'))->pluck('tea_no')->unique()->count();
            $location = Tea::pluck('location')->unique()->count();
        } else {
            $offmonth = request('month');
            $month = date('m', strtotime($offmonth));
            $yearentered = request('year');
            $year = date('y', strtotime($yearentered));
            $total = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $month)->sum('net_weight');
            $teano = Tea_Details::whereYear('Date_offered', request('year'))->pluck('tea_no')->unique()->count();
            $location = Tea::pluck('location')->unique()->count();
        }
        return view('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
    }
    public function teasreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role', 'user')->get()->count();
        $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
        $totalkg = Tea_Details::sum('net_weight');
        $netmonth=Tea_Details::where('tea_no', $teas)->groupBy('tea_no')->sum('net_weight');
        $teas = Tea::whereIn('tea_no', $teas)->first();
        $nots = Notification::latest()->paginate(3);
        $netpermonth = DB::raw('sum(net_weight) as net');

        $teasum = DB::table('tea__details')
            // ->join('tea__details', 'tea__details.tea_no')
            // ->select('*',$netpermonth)
           // ->orderB1y('created_at', 'desc')
            // ->groupBy('tea_no')
            ->get();
        // $net_weight = Tea_Details::where('tea_no' , $net->tea_no)->sum('net_weight');
        // $totalksh = $net_weight * 20 ; //total kg transformed to kenya shillings each at 20ksh

        // dd($teasum);
        // }
        return view('admin.teareport', compact('user', 'netmonth', 'teasum', 'notcount', 'tea', 'totalkg', 'net_weight', 'totalksh', 'farmer', 'nots'));
    }
    public function farmersreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role', 'user')->get()->count();
        // $farmers = User::where('role','user')->latest()->paginate();
        $nots = Notification::latest()->paginate(3);
        $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate();

        return view('admin.farmersreport', compact('user', 'notcount', 'totalksh', 'farmer', 'farmers', 'nots'));
    }

    
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
