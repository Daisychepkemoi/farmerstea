@extends('layouts.master')
@section('title','Events.Litein Tea Factory')
@section('head','View Events')

@section('content')
   
            <div class = "wrapper" style="margin-top: 5%;">
                <BUTTON class="btn btn-danger" style="width: 250px; margin-left: 43%; font-size: 26px; margin-top: 20px;">Top Events</BUTTON>
                         <hr style="background-color: orange; width: 100%">
    <style type="text/css">
                                         .row{
                                            height: auto;
                                                                            float: left;

                                            /*width: 75% !important;*/
                                         }
                                         #letme{
                                          width: 75% !important;
                                         }
                                         #letyou{
                                          width: 25% !important;
                                         }
                           .row .hello{
                                float: left;
                                width:27%;
                                min-height: 400px;
                                border-width: 1px;
                                border-style: ridge;
                                margin-left: 3%;
/*                                margin-top: L6px;
*/                                margin-bottom: 100px;
                                    background: #eaeaea;
                                    -moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;

                            }
                            .hello .image{
                                min-height:270px;
                                border-width: 1px;
                            }
                                 
                            .hello .body{
                                min-height:600px;
                                border-bottom-width: 1px;
                                border-bottom-color: black;
                            }
                            .hello .body a{
                                padding: px;
                            }
                            .hello .body p{
                                color: black !important;
                                font-weight: 800;
                                font-size: 16px !important;
                                text-transform: initial;
                                padding-left: 15px !important;
                                padding-right: 15px !important;
                                min-height: 150px; 
                                /*background-color: yellow;*/
                            }
                             .hello .body h4{
                                min-height: 150px;
                                padding-left:  15px; 
                                padding-right:  15px; 
                                /*background-color: red;*/

                                }
                                .hello .body h4 a{
                                color: black !important;
                                font-weight: 800;
                                font-size: 20px !important;
                                text-transform: inherit !important;
                                padding: 5px !important;
                            }
                             .hello .body a:hover{
                                color: red !important;
                                text-decoration: underline;
                                font-weight: 800;
                                
                            }
                        </style>  
                <div class = "container">
                  <div class="" style="margin-right: 10%;">
                    @if (session()->has('success'))
                     <div class="alert alert-success" style="text-transform:normal; background: #356c37 !important; color:white ; ">
                      {{ session('success') }}
                    </div>
                    @endif
                  {{-- <div class="col-md-8"> --}}
                    <div class="row" id="letme" style="border-width: 5px; ">
                       @foreach($events as $event)

                        <div class="hello">
                            {{-- <div class="image">
                                <img class="group list-group-image" src="{{url('uploads/'.$event->image)}}" alt="" style=""  title="{!! strip_tags(\Illuminate\Support\Str::words($event->title, 20,'...')) !!}" />

                            </div> --}}
                                                            {{-- <hr style="width: 100%;color: black; height: 1px;"> --}}

                            <div class="body">
                                <h4 ><a href="/events/{{$event->id}}" style="text-transform: capitalize;!important">{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($event->title, 20,'...'))) !!}</a></h4>
                                <p >{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($event->body, 25,'...'))) !!}
                                    <br>
                                    <b>Posted : {{$event->created_at->diffForHumans()}}</b>

                                
                            </p>
                            <a href="/events/{{$event->id}}" > <button class="btn-danger" > Read More</button> </a>
                                
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-md-8" style=" border-style: groove;border-width: 1px; border-color: orange;">
                        @foreach($events as $event)
                        <div class="col-md-4" style="height: 300px; border-width: 1px; border-bottom-width: 2px; margin-top: 10px;">
                                <h4 style="text-transform:capitalize; !important; font-size: 20px; height: 100px;"><a href="/posts/{{$event->id}}">{!! strip_tags(\Illuminate\Support\Str::words($event->title, 20,'...')) !!}</a></h4>
                                <p style="text-transform:inherit; font-size: 16px;">{!! strip_tags(\Illuminate\Support\Str::words($event->body, 25,'...')) !!}
                                <button class="btn-success" style="width: 150px; color: white;"> <a href="/viewevents/{{$event->id}}" style="color: white"> Read More</a></button>
                            </p>
                            
                        </div>
                        @endforeach --}}

                        {{-- {{$events->links()}} --}}
                    </div>

                    {{-- </div> --}}
                    <div class="row" id="letyou" style="background:; min-height: 100px; ">
                         <div class=" text-center" style="height: 300px; border-width: 1px; border-bottom-width: 2px; margin-top: 10px; width: 100%;">
                                <h4 style="text-transform:capitalize; !important; font-size: 20px; padding-top: 60px; height: 100px;">Have A complaint or an inquiry? Contact us</h4>
                                
                                <button class="btn-danger" style="width: 150px; color: white; background: ; color: white; background-color: ;" onclick="openForm()"> Contact Us</button>
                                <form method="POST" action="/contactus" name="form" style="margin: 50px; border-style: groove;border-color: orange; padding: 40px; font-size: 20px;       background: #356c37; color: white; display: ; width: 100% !important;">
                                  @csrf
                                  <label>Email <strong>*</strong></label>
                                   @auth
                                  <input class="form-control" type="email" name="email" placeholder="Email.." value="{{auth()->user()->email}}" readonly>
                                    @else
                                   <input class="form-control" type="email" name="email" placeholder="Email.." required="">
                                   @endif
                                  <label>Title <strong>*</strong></label>
                                  <input class="form-control" name="title" type="text" name="title" placeholder="Title..." required="">
                                  <label>Body <strong>*</strong></label>
                                  <textarea class="form-control" name="body" style="height: 150px;" required=""></textarea>
                                  <button class="btn-custom" name="submit" type="submit" style="margin-top: 20px;" > Submit</button>
                                </form>

                            
                        </div>
                    </div>
                     <div style="width: 70%; margin-right: 30%; background-color:; height:; clear: both" class="text-center">
                         <p style="padding-left: 20% !important;"> {{$events->links()}}</p>
                       </div>
                        
                        
                    </div>
              
                  </div>
                </div> 
                <script type="text/javascript">
                    function openForm() {
                    document.getElementById("form").style.display = "block";
                    }
                </script>
{{-- </div> --}}

   @endsection