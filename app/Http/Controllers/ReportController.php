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
use Carbon\Carbon;

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
        return $pdf->download(now().'farmersreport.pdf');
        return view('docs.farmers', compact('verified', 'notverified', 'denied', 'revoked', 'all', 'user', 'locations'));
    }
    public function tea()
    {
        $user = auth()->user();
        $montha = request('month');
        $yr = request('year');
        $tea = Tea::where('user_id',$user->id)->first();
        $teano = $tea->tea_no;
        if (request('month') == 'All') {
            $total = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no',$teano)->sum('net_weight');
            // $teano = Tea_Details::whereYear('date_offered', request('year'))->pluck('tea_no');
            $location = Tea::pluck('location')->unique()->count();
        } else {
            $offmonth = request('month');
            $month = date('m', strtotime($offmonth));
            $yearentered = request('year');
            $year = date('y', strtotime($yearentered));
            $total = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $month)->where('tea_no',$teano)->sum('net_weight');
            // $teano = Tea_Details::whereYear('Date_offered', request('year'))->pluck('tea_no')->unique()->count();
            $location = Tea::pluck('location')->unique()->count();
        }
        $pdf = PDF::loadView('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
        return $pdf->download(now().'Teareport.pdf');
        // return view('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
    }
    public function farmertea()
    {
        $user = auth()->user();
        $montha = request('month');
        $yr = request('year');
        $teanumber = Tea::where('user_id', $user->id)->pluck('tea_no');
        if (request('month') == 'All') {
            $total = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', $teanumber)->sum('net_weight');
            $teano = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', $teanumber)->pluck('tea_no')->unique()->count();
            // dd($teano);
            $location = Tea::where('tea_no', $teanumber)->pluck('location');
        } else {
            $offmonth = request('month');
            $month = date('m', strtotime($offmonth));
            $yearentered = request('year');
            $year = date('y', strtotime($yearentered));
            $total = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $month)->where('tea_no', $teanumber)->sum('net_weight');
            $teano = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', $teanumber)->pluck('tea_no')->unique()->count();
            $location = Tea::where('tea_no', $teanumber)->pluck('location');
        }
        $pdf = PDF::loadView('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
        return $pdf->download(now().'Teareport.pdf');
        // return view('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
    }
    public function teasreport()
    {
       
$user = auth()->user();
        $notcount = Notification::get()->count();
        $teaproduce = Tea_Details::whereMonth('created_at', Carbon::now()->month)->orderBy('created_at','desc','')->paginate(100);
        $totalkg = Tea_Details::whereMonth('created_at',Carbon::now()->now())->sum('net_weight');
        $nots = Notification::latest()->paginate(3);
        $day = Carbon::today();

        return view('admin.teareport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));    
    }
     public function teasreportsort()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $monthday=DB::raw('month(date_offered) as month');
        $monthentered = request('month');
        $nmonth = date('m', strtotime($monthentered));
        $yearentered = request('year');
        $nyear = date('y', strtotime($yearentered));
        $nots = Notification::latest()->paginate(3);

        if (request('location') == 'All Regions') {
            if (request('month') == 'All') {
                if (request('tea_no') == '') {
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->sum('net_weight');
                    // dd($totalkg);
                    $day = 'All regions for the year : '.request('year');

                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    $day = ' Tea Number : '.request('tea_no'). '  for the year : '.request('year');

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->sum('net_weight');
                    // dd($totalkg);

                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                }
            } else {
                if (request('tea_no') == '') {
                    $day = 'All regions for the year : '.request('year'). ' and Month : '.request('month');
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    $day = ' Tea Number : '.request('tea_no'). '  for the year : '.request('year').'  and Month: '.request('month');

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                }
            }
        } else {
            if (request('month') == 'All') {
                if (request('tea_no') == '') {
                    $day = request('location').'  for the year : '.request('year');

                    $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereIn('tea_no', $tea_no)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereIn('tea_no', $tea_no)->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'day', 'notcount', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    // $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                     $day = request('location').'  for the year : '.request('year').'  and tea number = '.request('tea_no') ;

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->orderBy('created_at', 'desc')->get();
                    return view('admin.teareport', compact('user', 'notcount','day', 'teaproduce', 'totalkg', 'nots'));
                }
            } else {
                // $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                $day = request('location').'  for the year : '.request('year').' '.request('month').'   and tea number = '.request('tea_no') ;

                $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('tea_no', request('tea_no'))->sum('net_weight');
                $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('tea_no', request('tea_no'))->orderBy('created_at', 'desc')->get();
                return view('admin.teareport', compact('user', 'notcount','day', 'teaproduce', 'totalkg', 'nots'));
            }
        }
    }
    public function farmersreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        // $farmer = User::where('role', 'user')->where('created_by','user')->get()->count();
        // dd($farmer);
        $farmer =DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->count();
        // $farmers = User::where('role','user')->latest()->paginate();
        $nots = Notification::latest()->paginate(3);
        $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate(100);
            $total = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->count();
            // dd($total);

        return view('admin.farmersreport', compact('user', 'notcount', 'totalksh','total', 'farmer', 'farmers', 'nots'));
    }
    public function farmersort()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->count();
        // $farmers = User::where('role','user')->latest()->paginate();
        $nots = Notification::latest()->paginate(3);
        if (request('location') == 'All Regions') {
            if (request('status') == 'All') {
                $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate(100);
            $total =DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->count();
            } else {
                $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate(100);
            $total =DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
            ->count();
            }
        } else {
            if (request('status') == 'All') {
                $farmers = DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('teas.location', request('location'))
                ->orderBy('users.created_at', 'desc')
                ->select('users.*', 'teas.*')
                ->paginate(100);
                $total = DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('teas.location', request('location'))
                ->count();
            } else {
                $farmers = DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
                ->where('teas.location', request('location'))
                ->orderBy('users.created_at', 'desc')
                ->select('users.*', 'teas.*')
                ->paginate(100);
                $total =  DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
                ->where('teas.location', request('location'))
                ->count();

            }
        }
        return view('admin.farmersreport', compact('user', 'notcount','total', 'totalksh', 'farmer', 'farmers', 'nots'));
    }
}
