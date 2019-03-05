<?php

namespace App\Http\Controllers;

use App\Tea;
use App\User;
use App\Tea_Details;
use App\Notification;
use DB;
use Carbon\Carbon;
use App\Charts\SampleCharts;
use App\Charts\ProduceChart;
use Illuminate\Http\Request;
use DateTime;

class TeaController extends Controller
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
    public function admindash()
    {
         $user= auth()->user();
        $notcount = Notification::get()->count();
                           $nots = Notification::latest()->paginate(3);

        
            if($user->role == 'admin')
            {

       
            //no of farmers as per verification
            $rejected = User::where('verifiedadmin','rejected')->where('role','user')->count();
            $verified = User::where('verifiedadmin','verified')->where('role','user')->count();
            $unverified = User::where('verifiedadmin','notverified')->where('role','user')->count();
            $revoked = User::where('verifiedadmin','revoked')->count();
            $verifiedfarmer = new ProduceChart;
             $verifiedfarmer->labels(['rejected','verified','unverified','revoked'])->options([
                    'legend' => ['display' => true],
                    ])->dataset('Farmer Verification', 'pie',[$rejected,$verified,$unverified,$revoked])->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    ],
                    ]);
        //get total produce per month in a year = totalpermonth
        $netpermonth = DB::raw('sum(net_weight) as net');
        $order=DB::raw('month(date_offered)');
        $monthinyear=DB::raw('month(date_offered) as month');
        $netmonth=Tea_Details::whereYear('date_offered', now())->select($netpermonth,$monthinyear)->groupby('month')->orderBy($order)->pluck('month');
        $month=Tea_Details::whereYear('date_offered', now())->select($netpermonth,$monthinyear)->groupby('month')->orderBy($order)->pluck('net');
            // total per month chart bar graph
            $totalpermonth = new SampleCharts;
            $totalpermonth->labels($netmonth->values())->options([
                    'legend' => ['display' => true],
                    ])->dataset('General Year Perfomance per month', 'bar',$month->values())->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    ]]);

            //ratio of produce per year 
            $orderyear=DB::raw('YEAR(date_offered)');
        $year=DB::raw('YEAR(date_offered) as year');
         $netperyear = DB::raw('sum(net_weight) as net');
        //get total produce per year = totalperyear
        $netyear=Tea_Details::select($netpermonth,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('year');
        $yearnetweight=Tea_Details::
                        select($netperyear,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('net');
            $totalperyear = new ProduceChart;
             $totalperyear->labels($netyear->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total As Per Years', 'bar',$yearnetweight->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    ],
                    ]);
                    //total produce daily line graph
                      $orderday=DB::raw('DAY(date_offered)');
                      $ordermonth=DB::raw('MONTH(date_offered)');
        $day=DB::raw('DAY(date_offered) as day');
                $monthday=DB::raw('month(date_offered) as month');

         $netperday = DB::raw('sum(net_weight) as net');
        //get total produce per day = totalperyear
        $netday=Tea_Details::whereYear('date_offered',now())
                        ->select($netperday,$day,$monthday)
                       // ->groupby('month')
                       ->groupby('date_offered')
                      
                       ->orderBy('date_offered','asc')
                        ->orderBy($ordermonth,'desc')
                       ->limit(37)->pluck('day');
                        // ->limit(30)->get();

        $netperday=Tea_Details::whereYear('date_offered',now())
                       -> select($netperday,$day,$monthday)
                       
                       ->groupby('date_offered')
                       ->groupby('month')
                       ->orderBy('date_offered' , 'desc')
                      ->orderBy($ordermonth , 'ASC')

                     ->limit(37)->pluck('net');
                      
                      //line graph
            $totalperday = new ProduceChart;
             $totalperday->labels($netday->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total As Per day', 'line',$netperday->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',


                    ],
                    ]);


            return view('charts.adminchart', compact('totalpermonth','totalperday','user','notcount','totalperyear','verifiedfarmer','nots'));
        }else{
            // dd($user->role);
                    $tea_no = Tea::where('user_id', $user->id)->pluck('tea_no');
                $ordermonth=DB::raw('MONTH(date_offered)');
                $month=DB::raw('MONTH(date_offered) as month');
                 $netpermonth = DB::raw('sum(net_weight) as net');
                //get total produce per MONTH = totalperyear
                $specificmonth=Tea_Details::where('tea_no' , $tea_no)->whereYear('date_offered',now())
                                ->select($netpermonth,$month)
                               ->groupby('month')
                               ->orderBy($ordermonth)
                               ->pluck('month');
                $netmonth=Tea_Details::where('tea_no' , $tea_no)->whereYear('date_offered',now())
                               ->select($netpermonth,$month)
                               ->groupby('month')
                               ->orderBy($ordermonth)
                               ->pluck('net');
                               // dd($netmonth,$specificmonth);
         //specific farmers produce details
                $permonthproduce = new ProduceChart;
                $permonthproduce->labels($specificmonth->values())->options([
                            'legend' => ['display' => true],
                            ])
                            ->dataset('Farmer Monthly Produce', 'bar',$netmonth->values())
                            ->options([
                            'label' => '# of Votes',
                            'borderColor' => '#ff0000',
                            'borderWidth' => 1,
                            'backgroundColor' => [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',

                            ],
                            ]);
                             $tea_no = Tea::where('user_id', $user->id)->pluck('tea_no');
                $orderyear=DB::raw('YEAR(date_offered)');
                $year=DB::raw('year(date_offered) as year');
                 $netperyear = DB::raw('sum(net_weight) as net');
                //get total produce per year = totalperyear
                $specificyear=Tea_Details::where('tea_no' , $tea_no)
                                ->select($netperyear,$year)
                               ->groupby('year')
                               ->orderBy($orderyear)
                               ->pluck('year');
                $netyear=Tea_Details::where('tea_no' , $tea_no)
                               ->select($netperyear,$year)
                               ->groupby('year')
                               ->orderBy($orderyear)
                               ->pluck('net');
                               // dd($netmonth,$specificmonth);
         //specific farmers produce details
                $peryearproduce = new ProduceChart;
                $peryearproduce->labels($specificyear->values())->options([
                            'legend' => ['display' => true],
                            ])
                            ->dataset('Farmers Yearly Produce', 'bar',$netyear->values())
                            ->options([
                            'label' => '# of Votes',
                            'borderColor' => '#ff0000',
                            'borderWidth' => 1,
                            'backgroundColor' => [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',

                            ],
                            ]);
                  $tea_no = Tea::where('user_id', $user->id)->pluck('tea_no');
                  // dd($tea_no);
                $orderperday=DB::raw('DAY(date_offered)');
                $day=DB::raw('day(date_offered) as day');
                 $netperday = DB::raw('sum(net_weight) as net');
                //get total produce per day = totalperyear
                $specificday=Tea_Details::where('tea_no' , $tea_no)
                                ->select($netperday,$day)
                               ->groupby('day')
                               ->orderBy($orderperday)
                               ->pluck('day');
                $netday=Tea_Details::where('tea_no' , $tea_no)
                               ->select($netperday,$day)
                               ->groupby('day')
                               ->orderBy($orderperday)
                               ->pluck('net');
                               // dd($netmonth,$specificmonth);
         //specific farmers produce details
                $perdayproduce = new ProduceChart;
                $perdayproduce->labels($specificday->values())->options([
                            'legend' => ['display' => true],
                            ])
                            ->dataset('Farmers Yearly Produce', 'line',$netday->values())
                            ->options([
                            'label' => '# of Votes',
                            'borderColor' => '#ff0000',
                            'borderWidth' => 1,
                            'backgroundColor' => [
                            'rgba(0, 5, 6, 0.2)',
                            

                            ],
                            ]);
                     return view('charts.farmerchart', compact('permonthproduce','user','notcount','peryearproduce','perdayproduce','nots'));
        }
   }
   public function netperday()
   {
          $user= auth()->user();
        $notcount = Notification::get()->count();
                           $nots = Notification::latest()->paginate(3);

         $adminofficial = User::where('created_by','user')->where('role','admin')->count();
        $createdadmin = User::where('created_by','admin')->where('role','admin')->count();
            $adminratio = new SampleCharts;
             $adminratio->labels(["No Of Farmers", "No Of Admins"])
                    ->dataset('Admin Ratio', 'pie',[$adminofficial,$createdadmin])
                    ->options([
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)'],
                    ]);
            //no of farmers as per verification
            $rejected = User::where('verifiedadmin','rejected')->count();
            $verified = User::where('verifiedadmin','verified')->count();
            $unverified = User::where('verifiedadmin','unverified')->count();
            $revoked = User::where('verifiedadmin','revoked')->count();
            // dd($unverifie);
            $verifiedfarmer = new ProduceChart;
             $verifiedfarmer->labels(['rejected','verified','unverified','revoked'])->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Farmer Verification', 'bar',[$rejected,$verified,$unverified,$revoked])
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    ],
                    ]);

        //get total produce per month in a year = totalpermonth

            $netpermonth = DB::raw('sum(net_weight) as net');
        $order=DB::raw('month(date_offered)');
        $monthinyear=DB::raw('month(date_offered) as month');
        $netmonth=Tea_Details::whereYear('date_offered',now())
                        ->select($netpermonth,$monthinyear)
                       ->groupby('month')
                       ->orderBy($order)
                       ->pluck('month');
        $month=Tea_Details::whereYear('date_offered',now())
                        ->select($netpermonth,$monthinyear)
                       ->groupby('month')
                       ->orderBy($order)
                       ->pluck('net');
                       // dd($netmonth);
            // total per month chart bar graph
            $totalpermonth = new SampleCharts;
             $totalpermonth->labels($netmonth->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('General Year Perfomance per month for', 'bar',$month->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    ]]);

            //ratio of produce per year 
            $orderyear=DB::raw('YEAR(date_offered)');
        $year=DB::raw('YEAR(date_offered) as year');
         $netperyear = DB::raw('sum(net_weight) as net');
        //get total produce per year = totalperyear
        $netyear=Tea_Details::select($netpermonth,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('year');
        $yearnetweight=Tea_Details::
                        select($netperyear,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('net');
            $totalperyear = new ProduceChart;
             $totalperyear->labels($netyear->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total As Per Years', 'bar',$yearnetweight->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    ],
                    ]);
                    //total produce daily line graph
                      $orderday=DB::raw('DAY(date_offered)');
                      $ordermonth=DB::raw('MONTH(date_offered)');
        $day=DB::raw('DAY(date_offered) as day');
        $monthday=DB::raw('month(date_offered) as month');
        $monthentered = request('month');
        $nmonth = date('m',strtotime($monthentered));
        $yearentered = request('year');
        $nyear = date('y',strtotime($yearentered));
         $netperday = DB::raw('sum(net_weight) as net');
        //get total produce per day = totalperyear
        $netday=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)
                        ->select($netperday,$day)
                       // ->groupby('month')
                       ->groupby('date_offered')
                      
                       ->orderBy('date_offered','asc')
                        // ->orderBy($orderday,'desc')
                       ->pluck('day');
                        // ->limit(30)->get();

        $netperday=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)
                       -> select($netperday,$day,$monthday)
                       ->groupby('date_offered')
                       ->orderBy('date_offered' , 'asc')
                    ->pluck('net');
                      //line graph
            $totalperday = new ProduceChart;
             $totalperday->labels($netday->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total Monthly Tea Produce As Per day on '.$monthentered.'  ' .request('year').' for all regions', 'line',$netperday->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',


                    ],
                    ]);


            return view('charts.adminchart', compact('totalpermonth','totalperday','user','notcount','totalperyear','verifiedfarmer','adminratio','nots'));
   }

  public function netpermonth()
  {
     $user= auth()->user();
        $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

         $adminofficial = User::where('created_by','user')->where('role','admin')->count();
        $createdadmin = User::where('created_by','admin')->where('role','admin')->count();
            $adminratio = new SampleCharts;
             $adminratio->labels(["No Of Farmers", "No Of Admins"])->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Admin Ratio', 'pie',[$adminofficial,$createdadmin])
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)'],
                    ]);
            //no of farmers as per verification
            $rejected = User::where('verifiedadmin','rejected')->count();
            $verified = User::where('verifiedadmin','verified')->count();
            $unverified = User::where('verifiedadmin','unverified')->count();
            $revoked = User::where('verifiedadmin','revoked')->count();

            $verifiedfarmer = new ProduceChart;
             $verifiedfarmer->labels(['rejected','verified','unverified','revoked'])->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Farmer Verification', 'bar',[$rejected,$verified,$unverified,$revoked])
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    ],
                    ]);

        //get total produce per month in a year = totalpermonth

            $netpermonth = DB::raw('sum(net_weight) as net');
        $order=DB::raw('month(date_offered)');
        $monthinyear=DB::raw('month(date_offered) as month');
        $netmonth=Tea_Details::whereYear('date_offered',request('year'))
                        ->select($netpermonth,$monthinyear)
                       ->groupby('month')
                       ->orderBy($order)
                       ->pluck('month');
        $month=Tea_Details::whereYear('date_offered', request('year'))
                        ->select($netpermonth,$monthinyear)
                       ->groupby('month')
                       ->orderBy($order)
                       ->pluck('net');
                       // dd($netmonth);
            // total per month chart bar graph
            $totalpermonth = new SampleCharts;
             $totalpermonth->labels($netmonth->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('General Year Perfomance per month for Year '.(request('year')), 'bar',$month->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    ]]);

            //ratio of produce per year 
            $orderyear=DB::raw('YEAR(date_offered)');
        $year=DB::raw('YEAR(date_offered) as year');
         $netperyear = DB::raw('sum(net_weight) as net');
        //get total produce per year = totalperyear
        $netyear=Tea_Details::select($netpermonth,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('year');
        $yearnetweight=Tea_Details::
                        select($netperyear,$year)
                       ->groupby('year')
                       ->orderBy($orderyear)
                       ->pluck('net');
            $totalperyear = new ProduceChart;
             $totalperyear->labels($netyear->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total As Per Years', 'bar',$yearnetweight->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    ],
                    ]);
                    //total produce daily line graph
                      $orderday=DB::raw('DAY(date_offered)');
                      $ordermonth=DB::raw('MONTH(date_offered)');
        $day=DB::raw('DAY(date_offered) as day');
        $monthday=DB::raw('month(date_offered) as month');
        $monthentered = request('month');
        $nmonth = date('m',strtotime($monthentered));
        $yearentered = request('year');
        $nyear = date('y',strtotime($yearentered));
         $netperday = DB::raw('sum(net_weight) as net');
        //get total produce per day = totalperyear
        $netday=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)
                        ->select($netperday,$day)
                       // ->groupby('month')
                       ->groupby('date_offered')
                      
                       ->orderBy('date_offered','asc')
                        // ->orderBy($orderday,'desc')
                       ->pluck('day');
                        // ->limit(30)->get();

        $netperday=Tea_Details::whereYear('date_offered',request('year'))->whereMonth('date_offered',$nmonth)
                       -> select($netperday,$day,$monthday)
                       ->groupby('date_offered')
                       ->orderBy('date_offered' , 'asc')
                    ->pluck('net');
                      //line graph
            $totalperday = new ProduceChart;
             $totalperday->labels($netday->values())->options([
                    'legend' => ['display' => true],
                    ])
                    ->dataset('Total Monthly Tea Produce As Per day on '.$monthentered.'  ' .request('year').' for all regions', 'line',$netperday->values())
                    ->options([
                    'label' => '# of Votes',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 1,
                    'backgroundColor' => [
                    'rgba(0, 99, 12, 0.4)',


                    ],
                    ]);


            return view('charts.adminchart', compact('totalpermonth','totalperday','user','notcount','totalperyear','verifiedfarmer','adminratio','nots'));
  }
}

