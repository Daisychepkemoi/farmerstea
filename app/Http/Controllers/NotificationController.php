<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Tea_Details;
use Illuminate\Http\Request;
use App\User;
use App\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $user = User::where('email',$request->email)->first();
        if($user == null){
             $notification = Notification::create([
                'user_id'=>70,
                'title'=>request('title'),
                'body'=>$request->body,
        ]);
         }
         else {

            $notification = Notification::create([
                'user_id'=>$user->id,
                'title'=>request('title'),
                'body'=>$request->body,
        ]);
         }
         dd($notification);
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
     **/
         public function store(Request $request)
    {
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
