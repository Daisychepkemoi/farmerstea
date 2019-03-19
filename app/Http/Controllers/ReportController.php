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
        return $pdf->download(now().'farmersreport.pdf');
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
            $teano = Tea_Details::whereYear('Date_offered', request('year'))->where('tea_no', $teanumber)->pluck('tea_no')->unique()->count();
            $location = Tea::where('tea_no', $teanumber)->pluck('location');
        } else {
            $offmonth = request('month');
            $month = date('m', strtotime($offmonth));
            $yearentered = request('year');
            $year = date('y', strtotime($yearentered));
            $total = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $month)->where('tea_no', $teanumber)->sum('net_weight');
            $teano = Tea_Details::whereYear('Date_offered', request('year'))->where('tea_no', $teanumber)->pluck('tea_no')->unique()->count();
            $location = Tea::where('tea_no', $teanumber)->pluck('location');
        }
        $pdf = PDF::loadView('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
        return $pdf->download(now().'Teareport.pdf');
        // return view('docs.tea', compact('total', 'montha', 'yr', 'teano', 'user', 'location'));
    }
    public function teasreport()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role', 'user')->get()->count();
        $teas = Tea::where('tea_no', '!=', null)->pluck('tea_no');
        $netpermonth = DB::raw('sum(net_weight) as net');
        $teano = Tea_Details::whereIn('tea_no', $teas)->get();
        $totalkg = Tea_Details::sum('net_weight');
       
        // $users = DB::table('teas')
        //     // ->join('teas', 'users.id', '=', 'teas.user_id')
        //     ->join('tea__details', 'teas.tea_no', '=', 'tea__details.tea_no')
        //     ->where('teas.tea_no' , '!=',null)->where('teas.tea_no', '=' ,4 )
        //     ->select( 'teas.tea_no',$netpermonth)
        //     ->groupBy('teas.tea_no')
        //     ->get();
            foreach ($teano as $t) {
                $teasum = Tea_Details::where('tea_no', $t->tea_no)->sum('net_weight');
                $teauser = Tea::where('tea_no', $t->tea_no)->pluck('user_id');
                $name = User::where('id', $teauser)->first();
                $tea_no = $t->tea_no;
                
            }
            return view('admin.teareport', compact('user', 'teasum', 'name', 'tea_no', 'tea', 'totalkg', 'net_weight', 'totalksh', 'farmer', 'nots'));
            
        // });
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
            ->where('users.role', 'user')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate();

        return view('admin.farmersreport', compact('user', 'notcount', 'totalksh', 'farmer', 'farmers', 'nots'));
    }
    public function farmersort()
    {
        $user= auth()->user();
        $notcount = Notification::get()->count();
        $farmer = User::where('role', 'user')->get()->count();
        // $farmers = User::where('role','user')->latest()->paginate();
        $nots = Notification::latest()->paginate(3);
        if (request('location') == 'All Regions') {
            if (request('status') == 'All') {
                $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate();
            } else {
                $farmers = DB::table('users')
            ->join('teas', 'users.id', '=', 'teas.user_id')
            ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
            ->orderBy('users.created_at', 'desc')
            ->select('users.*', 'teas.*')
            ->paginate();
            }
        } else {
            if (request('status') == 'All') {
                $farmers = DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('teas.location', request('location'))
                ->orderBy('users.created_at', 'desc')
                ->select('users.*', 'teas.*')
                ->paginate();
            } else {
                $farmers = DB::table('users')
                ->join('teas', 'users.id', '=', 'teas.user_id')
                ->where('users.role', 'user')->where('users.verifiedadmin', request('status'))
                ->where('teas.location', request('location'))
                ->orderBy('users.created_at', 'desc')
                ->select('users.*', 'teas.*')
                ->paginate();
            }
        }
        return view('admin.farmersreport', compact('user', 'notcount', 'totalksh', 'farmer', 'farmers', 'nots'));
    }
}
