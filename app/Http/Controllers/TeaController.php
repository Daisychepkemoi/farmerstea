<?php

namespace App\Http\Controllers;

use App\Tea;
use App\User;
use App\Notification;
use DB;
use App\Charts\SampleCharts;
use App\Charts\ProduceChart;
use Illuminate\Http\Request;

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
    public function index()
    {
         $user= auth()->user();
        $notcount = Notification::get()->count();
//         $data = User::groupBy('role')
//     ->get();
//     dd($data);

//     // ->map(function ($item) {
//     //     // Return the number of persons with that age
//     //     return count($item);
//     // });

// $chart = new SampleChart;
// $chart->labels($data->keys());
// $chart->dataset('My dataset', 'line', $data->values());   
        $db = DB::raw('sum(net_weight) as total');
$data = DB::table('tea__details')
                 // ->where('created_by','user')
                 ->select($db)
                
                 ->groupBy('tea_no')
                 ->get()->toArray();
                 $dt = User::where('created_by','user')->where('role','admin')->count();
                 $dta = User::where('created_by','admin')->where('role','admin')->count();
                 $dba = User::pluck('f_name');
//                  // dd($user_info);
// $data = User::where('created_by','user')->pluck('id');
    
//     // ->map(function ($item) {
//     //     // Return the number of persons with that age
//     //     return count($item);
//     // });
// dd($data);
$chart = new SampleCharts;
 $chart->labels(["No Of Farmers", "No Of Admins"])->options([
'legend' => ['display' => true],
])
->dataset('My dataset', 'pie',[$dt,$dta])
->options([
'label' => '# of Votes',
'borderColor' => '#ff0000',
'borderWidth' => 1,
'backgroundColor' => [
'rgba(255, 99, 132, 1)',
'rgba(54, 162, 235, 1)'],
]);
$charet = new ProduceChart;
 $charet->labels(["January", "","","","","","",""])->options([
'legend' => ['display' => true],
])
->dataset('My dataset', 'pie',[40,20,60,45,25,56,24])
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
$charti = new ProduceChart;
 $charti->labels(["January", "","","","","","","hgfdfghj"])->options([
'legend' => ['display' => true],
])
->dataset('My dataset', 'bar',[40,20,60,45,25,56,24])
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

// $chart = new SampleCharts;
// $chart->labels(["January", "February", "March", "April", "May", "June"])->options([
// 'legend' => ['display' => true],
// ])
// ->dataset('Order', 'bar', [190, 65, 84, 45, 90, 55])
// ->options([
// 'label' => '# of Votes',
// 'borderColor' => '#ff0000',
// 'borderWidth' => 1,
// 'backgroundColor' => [
// 'rgba(255, 99, 132, 1)',
// 'rgba(54, 162, 235, 1)',
// 'rgba(255, 206, 86, 1)',
// 'rgba(75, 192, 192, 1)',
// 'rgba(153, 102, 255, 1)',
// 'rgba(255, 159, 64, 1)'
// ],
// ]);
// dd($chart);
return view('chart', compact('chart','user','notcount','charet','charti'));




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
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function show(Tea $tea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tea $tea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tea $tea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tea  $tea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tea $tea)
    {
        //
    }
}
