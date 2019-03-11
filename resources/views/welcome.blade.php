@extends('layouts.master')
@section('title','SearchResults.Litein Tea Factory')

@section('content')
   
            <div class = "wrapper" style="margin-top: 5%;">
                <BUTTON class="btn btn-danger" style="width: 250px; margin-left: 43%; font-size: 26px; margin-top: 20px;">Search Results</BUTTON>

                                         <hr style="background-color: orange; width: 100%">
                                         <p style="margin-left: 40%; font-size: 20px;">{{$count}}  result(s) found</p>

                <div class = "container">
                    @if($user->count()>0)
                    <div class="row" style="border-width: 5px;">
                        @foreach($user as $post)
                        <div class="col-md-8" style="height: 500px; border-width: 1px; border-bottom-width: 2px;">
                                <img class="group list-group-image" src="{{url('uploads/'.$post->image)}}" alt="" style="height: 200px;" />
                                <h4 style="text-transform:capitalize; !important; font-size: 20px; height: 100px;"><a href="/post/{{$post->id}}">{!! strip_tags(\Illuminate\Support\Str::words($post->title, 20,'...')) !!}</a></h4>
                                <p style="text-transform:inherit; font-size: 16px;">{!! strip_tags(\Illuminate\Support\Str::words($post->body, 25,'...')) !!}
                                <button class="btn-success" style="width: 150px; color: white;"> <a href="/post/{{$post->id}}" style="color: white"> Read More</a></button>
                            </p>
                            
                        </div>
                        @endforeach
                        
                        
                    </div>
                    @else
                    {{-- <p>No records found</p> --}}
                    @endif
              
                  </div>
                </div> 
{{-- </div> --}}

   @endsection