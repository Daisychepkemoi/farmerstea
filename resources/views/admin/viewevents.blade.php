@extends('layouts.master')
@section('content')
   
            <div class = "wrapper" style="margin-top: 5%;">
                <BUTTON class="btn btn-danger" style="width: 250px; margin-left: 43%; font-size: 26px; margin-top: 20px;">Top Events</BUTTON>
                         <hr style="background-color: orange; width: 100%">

                <div class = "container">

                    <div class="row" style="border-width: 5px;">
                        <div class="col-md-8" style=" border-style: groove;border-width: 1px; border-color: orange;">
                        @foreach($events as $event)
                        <div class="col-md-4" style="height: 300px; border-width: 1px; border-bottom-width: 2px; margin-top: 10px;">
                                <h4 style="text-transform:capitalize; !important; font-size: 20px; height: 100px;"><a href="/posts/{{$event->id}}">{!! strip_tags(\Illuminate\Support\Str::words($event->title, 20,'...')) !!}</a></h4>
                                <p style="text-transform:inherit; font-size: 16px;">{!! strip_tags(\Illuminate\Support\Str::words($event->body, 25,'...')) !!}
                                <button class="btn-success" style="width: 150px; color: white;"> <a href="/viewevents/{{$event->id}}" style="color: white"> Read More</a></button>
                            </p>
                            
                        </div>
                        @endforeach

                        {{$events->links()}}
                    </div>
                    <div class="col-md-4" style="background:; min-height: 100px;">
                         <div class="col-md-12 text-center" style="height: 300px; border-width: 1px; border-bottom-width: 2px; margin-top: 10px; width: 100%;">
                                <h4 style="text-transform:capitalize; !important; font-size: 20px; padding-top: 60px; height: 100px;">Have A complaint or an inquiry? Contact us</h4>
                                
                                <button class="btn-danger" style="width: 150px; color: white; background: ; color: white; background-color: ;" onclick="openForm()"> Contact Us</button>
                                <form method="POST" action="" name="form" style="margin: 50px; border-style: groove;border-color: orange; padding: 40px; font-size: 20px;       background: #356c37; color: white; display: ;">
                                  <label>Email <strong>*</strong></label>
                                  <input class="form-control" name="email" type="email" name="email" placeholder="Email..">
                                  <label>Title <strong>*</strong></label>
                                  <input class="form-control" name="title" type="text" name="title" placeholder="Title...">
                                  <label>Body <strong>*</strong></label>
                                  <textarea class="form-control" style="height: 150px;"></textarea>
                                  <button class="btn-custom" name="body" type="submit" style="margin-top: 20px;" > Submit</button>
                                </form>

                            
                        </div>
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