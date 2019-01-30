<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Notification;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;

class EventController extends Controller
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
    public function eventsperday()
    {
         $user = auth()->user();
        $notcount = Notification::get()->count();
        $month = request('month');
        $nmonth = date('m',strtotime($month));
       $user_id = Event::pluck('user_id');
            // $events = Event::orderBy('held_at', 'DESC')->get();
            $createdby= User::where('id', $user_id)->get();
       
               $eventcount = Event::whereYear('held_at', '=', request('year'))
              ->whereMonth('held_at', '=', $nmonth)
              ->count();

              if($eventcount == 0) {
                return view('admin.emptyevent',compact('user','notcount'));
              }
              else{
                 $events = Event::whereYear('held_at', '=', request('year'))
              ->whereMonth('held_at', '=', $nmonth)
              ->paginate(10);
              
              // dd($eventcount);
              return view('admin.viewevents',compact('user','notcount','events','createdby'));
          }
              // dd($event);
    }

    public function notificationsperday()
    {
         $user = auth()->user();
        $notcount = Notification::get()->count();
        $month = request('month');
        $nmonth = date('m',strtotime($month));
       $user_id = Notification::pluck('user_id');
            // $events = Event::orderBy('held_at', 'DESC')->get();
            $createdby= User::where('id', $user_id)->get();
       
               $notcount = Notification::whereYear('created_at', '=', request('year'))
              ->whereMonth('created_at', '=', $nmonth)
              ->count();

              if($notcount == 0) {
                return view('admin.emptynot',compact('user','notcount'));
              }
              else{
                 $notification = Notification::whereYear('created_at', '=', request('year'))
              ->whereMonth('created_at', '=', $nmonth)
              ->paginate(10);
              
              // dd($eventcount);
              return view('admin.viewnotifications',compact('user','notcount','notification','createdby'));
          }
              // dd($event);
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
        $user= auth()->user();
        $users =$user->id;
        $notification = Notification::create([
            'user_id'=>$users,
            'title'=>request('title'),
            'body'=>request('body'),
            
        ]);
        dd($notification);
        return redirect('/viewnotifications', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
