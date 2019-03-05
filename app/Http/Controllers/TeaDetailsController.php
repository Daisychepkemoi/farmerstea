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


class TeaDetailsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
         $user = auth()->user();
         $notcount = Notification::get()->count();
                           $nots = Notification::latest()->paginate(3);

         $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->latest()->paginate(5);
        return view('admin.addteaproduce', compact('user','notcount','teadetails','nots'));
    }

        public function dailyreport()
    {
       $user = auth()->user();
       $notcount = Notification::get()->count(); 
       $teaproduce = Tea_Details::whereDate('created_at',Carbon::today())->paginate(31);
       $totalkg = Tea_Details::whereDate('created_at', Carbon::today())->sum('net_weight');
                                  $nots = Notification::latest()->paginate(3);

        return view('agent.viewdailyreport', compact('user','notcount','teaproduce','totalkg','nots'));

    }
    public function sort()
    {
       $user = auth()->user();
       $notcount = Notification::get()->count(); 
       $monthday=DB::raw('month(date_offered) as month');
        $monthentered = request('month');
        $nmonth = date('m',strtotime($monthentered));
        $yearentered = request('year');
        $nyear = date('y',strtotime($yearentered));
                           $nots = Notification::latest()->paginate(3);


       if(request('location') == 'All Regions')
       {
         $totalkg = Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->sum('net_weight');
         $teaproduce=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->orderBy('date_offered','asc')->get();
         return view('agent.viewdailyreport', compact('user','notcount','teaproduce','totalkg','nots'));
       }
       else
       {
         $tea_no = Tea::where('location',request('location'))->where('tea_no', '!=' , null)->pluck('tea_no');
         $totalkg = Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->whereIn('tea_no',$tea_no)->sum('net_weight');
         $teaproduce=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)->whereIn('tea_no',$tea_no)->orderBy('date_offered','asc')->get();
         return view('agent.viewdailyreport', compact('user','notcount','teaproduce','totalkg','nots'));

       }
      
       

    }
    public function store(Request $request)
    {
        $teano = Tea::where('tea_no',$request->tea_no)->first();
        // dd($teano);
        if(($teano== null)){
                 return redirect('/addteaproduce')->with('warning', ' This Tea number does not exist in our records');
         }
    else{
           $user= auth()->user();
        $users =$user->id;
        $notcount = Notification::get()->count();
        $total = Tea_Details::where('tea_no',$request->tea_no)->latest()->first();
        // dd($total->total_as_at_day);
        if ($total == null) {
             $date= date('Ymd');
        $rand=strtoupper(substr(uniqid(sha1(time())), 0,4));

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
      
            }
            else {

        $date= date('Ymd');
        $rand=strtoupper(substr(uniqid(sha1(time())), 0,4));
        $receipt_no = $date . $rand;
        // dd($receipt_no);
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
            // 'title'=>request('title'),
            // 'body'=>request('body'),
            
        ]);
            }
         return redirect('/addteaproduce')->with('success','tea details added successfully');

    
    }
    }
    public function editteaproduce($id)
    {
        $user =auth()->user();
        $notcount = Notification::get()->count();
        $teaproduce = Tea_Details::find($id);
        $teadetails = Tea_Details::whereDate('created_at', Carbon::today())->get();
                           $nots = Notification::latest()->paginate(3);


        return view('admin.editteaproduce',compact('notcount','user','teaproduce','teadetails','nots'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tea_Details  $tea_Details
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tea_Details  $tea_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Tea_Details $tea_Details, $id, Request $request)
    {
        $net = $request->gross_weight - 1;
        $teadetails = Tea_Details::find($id);
        $tea_no = $request->get('tea_no');
        if(!($tea_no == $teadetails->tea_no))
        {
            $date = Tea_Details::where('created_at','<', $teadetails->created_at)->where('tea_no',$tea_no)->latest()->first();
            if($date == null){
            $totalday =  $net;
            $teadetails->tea_no = $tea_no;
            $teadetails->gross_weight = $request->get('gross_weight');
            $teadetails->net_weight = $net;
            $teadetails->total_as_at_day = $totalday;
            $teadetails->offered_by = auth()->user()->f_name;
            $teadetails->save();
            $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                // dd($teas);
                $netmonth=Tea_Details::whereIn('tea_no',$teas)->get();
                // dd($netmonth);
                 foreach ($netmonth as $net ) {
                $total = Tea_Details::where('id',$net->id)->first();
                $totalprev = Tea_Details::where('id','<',$net->id)->where('tea_no',$net->tea_no)->latest()->first();
                if($totalprev == null){
                   $total_as_at_day = $total->net_weight + 0;
                   DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);

                }
                else {
                    $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                     DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                }

               
               }
         }
        else{

            

                 $totalday = $date->total_as_at_day + $net;
                $teadetails->tea_no = $tea_no;
                $teadetails->gross_weight = $request->get('gross_weight');
                $teadetails->net_weight = $net;
                $teadetails->total_as_at_day = $totalday;
                $teadetails->offered_by = auth()->user()->f_name;
                $teadetails->save();
                $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                $netmonth=Tea_Details::whereIn('tea_no',$teas)->get();
                 foreach ($netmonth as $net ) {
                $total = Tea_Details::where('id',$net->id)->first();
                $totalprev = Tea_Details::where('id','<',$net->id)->where('tea_no',$net->tea_no)->latest()->first();
                if($totalprev == null){
                   $total_as_at_day = $total->net_weight + 0;
                   DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);

                }
                else {
                    $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                     DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                }

               
               }
            }

         }
        else
        {
         $date = Tea_Details::where('created_at','<', $teadetails->created_at)->where('tea_no',$tea_no)->latest()->first();
         // dd($date);
        $totalday = $date->total_as_at_day + $net;
        $teadetails->tea_no = $tea_no;
        $teadetails->gross_weight = $request->get('gross_weight');
        $teadetails->net_weight = $net;
        $teadetails->total_as_at_day = $totalday;
        $teadetails->offered_by = auth()->user()->f_name;
        $teadetails->save();
            $teas = Tea_Details::groupBy('tea_no')->pluck('tea_no');
                $netmonth=Tea_Details::whereIn('tea_no',$teas)->get();
                foreach ($netmonth as $net ) {
                $total = Tea_Details::where('id',$net->id)->first();
                $totalprev = Tea_Details::where('id','<',$net->id)->where('tea_no',$net->tea_no)->latest()->first();
                if($totalprev == null){
                   $total_as_at_day = $total->net_weight + 0;
                   DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                }
                else {
                    $total_as_at_day = $total->net_weight + $totalprev->total_as_at_day;

                     DB::table('tea__details')->where('id',$net->id)->update(['total_as_at_day' => $total_as_at_day,'updated_at' => now()]);
                }
               }
         
        }
        
        return redirect('/addteaproduce');
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tea_Details  $tea_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tea_Details $tea_Details,$id)
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
