<?php

namespace App\Http\Controllers;

use App\Tea_Details;
use App\Tea;
use App\User;
use Session;
use App\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PDF;

class TeaDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function receipt($id)
    {
        $user = auth()->user();
        $tea = Tea_Details::find($id);
        // dd($tea);

        $notcount = Notification::get()->count();
        $nots = Notification::latest()->paginate(3);
        $user_id = Tea::where('tea_no', $tea->tea_no)->pluck('user_id');
        $username = User::where('id', $user_id)->first();
        $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->paginate(5);

        // $pdf = PDF::loadView('docs.receipt', compact('user', 'notcount', 'teadetails','tea', 'nots','username'));
        return view('docs.receipt', compact('user', 'notcount', 'teadetails', 'tea', 'nots', 'username'));
        // return redirect('/addteaproduce');
    }
    public function printreceipt($id)
    {
        $user = auth()->user();
        $tea = Tea_Details::find($id);
        // dd($tea);

        $notcount = Notification::get()->count();
        $nots = Notification::latest()->paginate(3);
        $user_id = Tea::where('tea_no', $tea->tea_no)->pluck('user_id');
        $username = User::where('id', $user_id)->first();
        $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->paginate(5);
        // dd('hae');

        $pdf = PDF::loadView('docs.receipt', compact('user', 'notcount', 'teadetails', 'tea', 'nots', 'username'));
        return $pdf->download('DailyReceipt'.$tea->receipt_no.'pdf');
  
        // return view( 'docs.receipt', compact('user', 'notcount', 'teadetails','tea', 'nots','username'));
         // return redirect('/addteaproduce');
    }
    public function index()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $nots = Notification::latest()->paginate(3);

        $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->where('offered_by',$user->f_name)->latest()->paginate(5);
        return view('admin.addteaproduce', compact('user', 'notcount', 'teadetails', 'nots'));
    }

    public function dailyreport()
    {
        $user = auth()->user();
        $notcount = Notification::get()->count();
        $teaproduce = Tea_Details::whereDate('created_at', Carbon::today())->where('offered_by', $user->f_name)->paginate(31);
        $totalkg = Tea_Details::whereDate('created_at', Carbon::today())->where('offered_by', $user->f_name)->sum('net_weight');
        $nots = Notification::latest()->paginate(3);
        $day = Carbon::today();

        return view('agent.viewdailyreport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
    }
    public function sort()
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
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->where('offered_by', $user->f_name)->sum('net_weight');
                    // dd($totalkg);
                    $day = 'All regions for the year : '.request('year');

                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    // dd($teaproduce);
                    return view('agent.viewdailyreport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    $day = ' Tea Number : '.request('tea_no'). '  for the year : '.request('year');

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->where('offered_by', $user->f_name)->where('tea_no', request('tea_no'))->sum('net_weight');
                    // dd($totalkg);

                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    return view('agent.viewdailyreport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                }
            } else {
                if (request('tea_no') == '') {
                    $day = 'All regions for the year : '.request('year'). ' and Month : '.request('month');
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('offered_by', $user->f_name)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    return view('agent.viewdailyreport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    $day = ' Tea Number : '.request('tea_no'). '  for the year : '.request('year').'  and Month: '.request('month');

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('offered_by', $user->f_name)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    return view('agent.viewdailyreport', compact('user', 'notcount', 'day', 'teaproduce', 'totalkg', 'nots'));
                }
            }
        } else {
            if (request('month') == 'All') {
                if (request('tea_no') == '') {
                    $day = request('location').'  for the year : '.request('year');

                    $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                    // dd($tea_no);
                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereIn('tea_no', $tea_no)->where('offered_by', $user->f_name)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereIn('tea_no', $tea_no)->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    // dd($teaproduce);
                    return view('agent.viewdailyreport', compact('user', 'day', 'notcount', 'teaproduce', 'totalkg', 'nots'));
                } else {
                    // $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                     $day = request('location').'  for the year : '.request('year').'  and tea number = '.request('tea_no') ;

                    $totalkg = Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->where('offered_by', $user->f_name)->sum('net_weight');
                    $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->where('tea_no', request('tea_no'))->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                    return view('agent.viewdailyreport', compact('user', 'notcount','day', 'teaproduce', 'totalkg', 'nots'));
                }
            } else {
                // $tea_no = Tea::where('location', request('location'))->where('tea_no', '!=', null)->pluck('tea_no');
                $day = request('location').'  for the year : '.request('year').' '.request('month').'   and tea number = '.request('tea_no') ;

                $totalkg = Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('tea_no', request('tea_no'))->where('offered_by', $user->f_name)->sum('net_weight');
                $teaproduce=Tea_Details::whereYear('date_offered', request('year'))->whereMonth('date_offered', $nmonth)->where('tea_no', request('tea_no'))->where('offered_by', $user->f_name)->orderBy('created_at', 'desc')->get();
                return view('agent.viewdailyreport', compact('user', 'notcount','day', 'teaproduce', 'totalkg', 'nots'));
            }
        }
    }
    public function store(Request $request)
    {
        $teano = Tea::where('tea_no', $request->tea_no)->first();
        // dd($status);
        if (($teano== null)) {
            return redirect('/addteaproduce')->with('warning', ' This Tea number does not exist in our records');
        } else {
            $user= auth()->user();
            $users =$user->id;
            $notcount = Notification::get()->count();
            $total = Tea_Details::where('tea_no', $request->tea_no)->whereMonth('date_offered', Carbon::now()->month)->latest()->first();
            $status = User::where('id', $teano->user_id)->first();

            if ($status->verifiedadmin == 'revoked') {
                return redirect('/addteaproduce')->with('warning', ' This Tea number has been revoked');
            }
            // dd($total->total_as_at_day);
            elseif ($total == null) {
                $date= date('Ymd');
                $rand=strtoupper(substr(uniqid(sha1(time())), 0, 4));

                $receipt_no = $date . $rand;
                $tea_no = (request('tea_no'));
                $net = $request->gross_weight - 1;
                $time = now();
                $tea = Tea_Details::create([
                'tea_no' => request('tea_no'),
                'gross_weight' => request('gross_weight'),
                'net_weight' =>$net,
                'total_as_at_day' => $net,
                'offered_by' => $user->f_name,
                'date_offered' => now(),
                'receipt_no'=>$receipt_no,
                
            
        ]);
            } else {
                $date= date('Ymd');
                $rand=strtoupper(substr(uniqid(sha1(time())), 0, 4));
                $receipt_no = $date . $rand;
                $net = $request->gross_weight - 1;

                $totalday = $total->total_as_at_day + $net;

                $tea = Tea_Details::create([
            'tea_no'=>request('tea_no'),
            'gross_weight'=>request('gross_weight'),
            'net_weight'=>$net,
            'total_as_at_day'=>$totalday,
            'offered_by'=>$user->f_name,
            'date_offered'=>now(),
            'receipt_no'=>$receipt_no,
            
            
        ]);
            }
            // $user_id = Tea::where('tea_no', $tea->tea_no)->pluck('user_id');
            // $username = User::where('id', $user_id)->first();
            //  $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->orderBy('created_at','desc')->paginate(5);
            //  // $pdf = PDF::loadView('docs.receipt', compact('user', 'notcount', 'teadetails','tea', 'nots','username'));
             

            return redirect('/addteaproduce')->with('success', 'tea details added successfully');
        }
    }
    public function editteaproduce($id)
    {
        $user =auth()->user();
        $notcount = Notification::get()->count();
        $teaproduce = Tea_Details::find($id);
        // $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->get();
        $teadetails = Tea_Details::orderBy('created_at', 'desc')->paginate(15);

        $nots = Notification::latest()->paginate(3);


        return view('admin.editteaproduce', compact('notcount', 'user', 'teaproduce', 'teadetails', 'nots'));
    }

    public function edit(Tea_Details $tea_Details, $id, Request $request)
    {
        $net = $request->gross_weight - 1;
        $user = auth()->user();
        $tea = Tea_Details::find($id);
        $tea_no = $request->get('tea_no');
        $total = Tea_Details::where('tea_no', $request->tea_no)->latest()->first();
        $teano = Tea::where('tea_no', $request->tea_no)->first();

        if (($teano== null)) {
            return redirect()->back()->with('warning', ' The Tea number: '.request('tea_no').' does not exist in our records');
        } else {
            $status = User::where('id', $teano->user_id)->first();

            if ($status->verifiedadmin == 'revoked') {
                return redirect()->back()->with('warning', ' This Tea number revoked !!');
            } elseif (!($tea_no == $tea->tea_no)) {
                $date = Tea_Details::where('created_at', '<', $tea->created_at)->where('tea_no', $tea_no)->whereMonth('date_offered', Carbon::now()->month)->orderBy('created_at', 'desc')->first();

                if ($date == null) {
                    $totalday =  $net;
                    $tea->tea_no = $tea_no;
                    $tea->gross_weight = $request->get('gross_weight');
                    $tea->net_weight = $net;
                    $tea->total_as_at_day = $totalday;
                    $tea->offered_by = auth()->user()->f_name;
                    $tea->save();
                    $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                    // dd($teas);
                    $netmonth=Tea_Details::whereIn('tea_no', $teas)->get();
                    // dd($netmonth);
                    foreach ($netmonth as $net) {
                        $total = Tea_Details::where('id', $net->id)->first();
                        $totalprev = Tea_Details::where('id', '<', $net->id)->whereMonth('date_offered', Carbon::now()->month)->where('tea_no', $net->tea_no)->latest()->first();
                        if ($totalprev == null) {
                            $total_as_at_day = $total->net_weight + 0;
                            DB::table('tea__details')->whereMonth('date_offered', Carbon::now()->month)->where('id', $net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                        } else {
                            $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                            DB::table('tea__details')->where('id', $net->id)->whereMonth('date_offered', Carbon::now()->month)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                        }
                    }
                } else {
                    $totalday = $date->total_as_at_day + $net;
                    $tea->tea_no = $tea_no;
                    $tea->gross_weight = $request->get('gross_weight');
                    $tea->net_weight = $net;
                    $tea->total_as_at_day = $totalday;
                    $tea->offered_by = auth()->user()->f_name;
                    $tea->save();
                    $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                    $netmonth=Tea_Details::whereIn('tea_no', $teas)->get();
                    foreach ($netmonth as $net) {
                        $total = Tea_Details::where('id', $net->id)->first();
                        $totalprev = Tea_Details::where('id', '<', $net->id)->whereMonth('date_offered', Carbon::now()->month)->where('tea_no', $net->tea_no)->latest()->first();
                        if ($totalprev == null) {
                            $total_as_at_day = $total->net_weight + 0;
                            DB::table('tea__details')->where('id', $net->id)->whereMonth('date_offered', Carbon::now()->month)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                        } else {
                            $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                            DB::table('tea__details')->where('id', $net->id)->whereMonth('date_offered', Carbon::now()->month)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                        }
                    }
                }
            } else {
                $date = Tea_Details::where('created_at', '<', $tea->created_at)->whereMonth('date_offered', Carbon::now()->month)->where('tea_no', $tea_no)->latest()->first();
                // dd($date);
                if ($date == null) {
                    $totalday =  $net;
                } else {
                    $totalday = $date->total_as_at_day + $net;
                }
                $tea->tea_no = $tea_no;
                $tea->gross_weight = $request->get('gross_weight');
                $tea->net_weight = $net;
                $tea->total_as_at_day = $totalday;
                $tea->offered_by = auth()->user()->f_name;
                $tea->save();
                $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                $netmonth=Tea_Details::whereIn('tea_no', $teas)->get();
                foreach ($netmonth as $net) {
                    $total = Tea_Details::where('id', $net->id)->first();
                    $totalprev = Tea_Details::where('id', '<', $net->id)->whereMonth('date_offered', Carbon::now()->month)->where('tea_no', $net->tea_no)->latest()->first();
                    if ($totalprev == null) {
                        $total_as_at_day = $total->net_weight + 0;
                        DB::table('tea__details')->where('id', $net->id)->whereMonth('date_offered', Carbon::now()->month)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                    } else {
                        $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                        DB::table('tea__details')->where('id', $net->id)->whereMonth('date_offered', Carbon::now()->month)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                    }
                }
            }
            // $user_id = Tea::where('tea_no', $tea->tea_no)->pluck('user_id');
            //     $username = User::where('id', $user_id)->first();
            //      $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->orderBy('created_at','desc')->paginate(5);
            //      $pdf = PDF::loadView('docs.receipt', compact('user', 'notcount', 'teadetails','tea', 'nots','username'));
            //      // dd($pdf);
            return redirect('/addteaproduce')->with('success', 'Tea Details Edited Successfully');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tea_Details  $tea_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tea_Details $tea_Details, $id)
    {
        $teaproduce =Tea_Details::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tea_Details  $tea_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tea_Details $tea_Details)
    {
        //
    }
}
