@extends('layouts.master')
@section('title','BlogPost.Litein Tea Factory')

@section('content')
   
            <div class = "wrapper" style="margin-top: 5%;">
                <BUTTON class="btn btn-danger" style="width: 250px; margin-left: 43%; font-size: 26px; margin-top: 20px;">Top Stories</BUTTON>
                                         <hr style="background-color: orange; width: 100%">
                                         <style type="text/css">
                                         .container{
                                            height: auto;
                                            width: 100% !important;
                                         }
                           .container .hello{
                                float: left;
                                width:22%;
                                height: 600px;
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
                                height:270px;
                                border-width: 1px;
                            }
                            .hello .image img{
                                height: 100%;
                                width: 100%;
                                 border-bottom-width: 1px;
                                border-bottom-color: black;
                            }
                             .hello .image img:hover{
                                height: 105%;
                                width: 105%;
                                opacity:0.7;
                                 border-bottom-width: 1px;
                                border-bottom-color: black;
                            }
                            .hello .body{
                                height:300px;
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
                                height: 100px; 
                                /*background-color: yellow;*/
                            }
                             .hello .body h4{
                                height: 80px;
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
                                        
                          @foreach($posts as $post)

                        <div class="hello">
                            <div class="image">
                                <img class="group list-group-image" src="{{url('uploads/'.$post->image)}}" alt="" style=""  title="{!! strip_tags(\Illuminate\Support\Str::words($post->title, 20,'...')) !!}" />

                            </div>
                                                            <hr style="width: 100%;color: black; height: 1px;">

                            <div class="body">
                                <h4 ><a href="/post/{{$post->id}}" style="text-transform: capitalize;!important">{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($post->title, 20,'...'))) !!}</a></h4>
                                <p >{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($post->body, 25,'...'))) !!}
                                    <br>
                                    <b>Posted : {{$post->created_at->diffForHumans()}}</b>

                                
                            </p>
                            <a href="/post/{{$post->id}}" > <button class="btn-danger" > Read More</button> </a>
                                
                            </div>
                        </div>
                        @endforeach
                         <p> {{$posts->links()}}</p>
                         
                        
                        
                    </div>
              
                  </div>
                        
                </div> 
{{-- </div> --}}
   @endsection