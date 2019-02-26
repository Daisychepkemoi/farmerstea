@extends('layouts.master')
@section('content')
<header id="header" style="background-image: url({{asset('image/desk.jpg')}}); height: 1400px; background-size: cover; opacity:;"  >
  
  <div class="landing-page">
    <div style="" id="page"></div>
    <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000" style="padding-top: 0%">
        @auth
       @if ($user->verified == 'notverified')
        @if ( $user->role == 'user')
       <div class="alert alert-success" id="alerta" style="background-color: red; height: 100px; margin-top: 100px; width: 80%; margin-left: 10%;">
        <p style="color: black;">Your Account has not been activated!! <button class="button" style="padding-top: 0px; margin-top:-13px; float: right; background: red; font-size: 28px;height: 80px;width: 20px" onclick="closeForm()">&times;</button> </p>
        <script type="text/javascript">
          function closeForm() {
                document.getElementById("alerta").style.display = "none";
                document.getElementById("lost").style.display = "none";
                document.getElementById("header").style.height = "100vh";
            }
        </script>
      </div>
      @endif
      @endif
      @endauth
      <div class="col-md-8" id="eight">
           <div class="" id="bla" >
        
      </div>
          <div class="" id="block" >
            <div class="imageback">
                  <img src="{{ URL::to('image/Litein.jpg') }}" title="Litein Tea Factory">
                  <div class="imgname"> 
                    <div class="imagetext">
                      Litein Tea Factory
                    </div>
                  </div>

            </div>
            <div class="imageback2">
              <h1>Litein Tea Factory</h1>
                      <p class="text-left" style="float: left; margin-left: 100px; font-size: 16px;font-weight: normal; color: grey; margin-right: 100px; line-height: 2;">Litein Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then Vice President (Hon. Oginga Odinga) in 11th March, 1966 with a design capacity of 5 million kilograms annually. The factory has since been expanded to the current capacity of 15 million kilograms. <a class="btn-success" style="width: 200px; height: 50px;">Read More</a></p>

            </div>
          </div>
        
      </div>
      <div class="col-md-4" id="four">
        <div class="" id="bla"  style=" height: 110px; width: 100%;">
        
      </div>
         <div class="col-lg-1 lg-success" style="height: 80%; background:white; margin-top: 5%;width: 100%; margin-left: 2px;">
                            <h3><a href="">Recent Stories</a></h3>

          @foreach($posts as $post)
             <div id="line2" class="col-lg-12">
                <div class="cofounder-ceo-image">
                  <img class="bloga" src="{{url('uploads/'.$post->image)}}" style="border-radius: 0%; margin-top: 15px;width: 100%;height: 150px;object-fit: cover; float: left; margin-right: 20px;">
                   </div>
                  <p style="color: black; font-size:14px;padding-top:5px;line-height: 1; letter-spacing: normal; font-weight:normal;padding-top: 20px; "><a href="/post/{{$post->id}}" style="line-height:1;font-weight: normal; font-style:Arial; letter-spacing: normal; ">{!! str_limit($post->title, 40)  !!}</a> {!! str_limit($post->body, 80)  !!}   </p>
              </div>
              <hr style="width: 100%"> <br>
          @endforeach
            <button style="width: 300px;"><a href="/blog" style="color: white">View More Posts</a></button>
         
           
           
         </div>
      </div>
    </div>
{{--     <img src="{{ URL::to('image/desk.jpg') }}">
 --}}  </div>
  <div style="background:; height: 250px; width: 100%;" id="lost"> 
  </div>
      {{-- <img src="{{ URL::to('image/desk.jpg') }}"> --}}

</header>
<!-- Features Section -->

  
<!-- About Section -->

<!-- Services Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title">
      <h2>Features</h2>
    </div>
    <div class="row">
      <div class="col-xs-6 col-md-3"> <i class="fa fa-comments-o"></i>
        <h3> Hello Litein!</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-bullhorn"></i>
        <h3> Hello Litein!</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-group"></i>
        <h3> Hello Litein!</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-magic"></i>
        <h3> Hello Litein!</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
      </div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="{{ URL('/image/desk.jpg')}}" class="img-responsive" alt=""> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>About Us</h2>
          <p></p>
          <h3>Litein Tea Factory</h3>
          <div class="list-style">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <ul>
                <li>Mission</li>
                    <p>To invest in tea and other related profitable ventures for the benefit of the shareholders and other stakeholders</p>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <ul>
                <li>Vision</li>
              <p>To be the preferred investment vehicle for the small holder tea farmers in Eastern Africa.</p>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services" class="text-center">
  <div class="container">
    <div class="section-title">
      <h2>Our Services</h2>
    </div>
    <div class="row">
      <div class="col-md-4"> <i class="fa fa-wordpress"></i>
        <div class="service-desc">
          <h3>Online Tea Farmer Registration</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-cart-arrow-down"></i>
        <div class="service-desc">
          <h3>Predictions on Bonus</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-cloud-download"></i>
        <div class="service-desc">
          <h3>Instant Farmer Notification</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"> <i class="fa fa-language"></i>
        <div class="service-desc">
          <h3>Farmers Tea Report Summary</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-plane"></i>
        <div class="service-desc">
          <h3>Approximation On Fertilizer Allocation</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-pie-chart"></i>
        <div class="service-desc">
          <h3>Trends in Tea Production</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery Section -->
  <div id="portfolio" class="text-center">
    <div class="container">
      <div class="section-title">
        <h2>Gallery</h2>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs </p>
      </div>
      <div class="row">
        <div class="portfolio-items">
             <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Litein</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Tea Farm</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Tea Buying Center</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Tea Truck</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Factory</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
             <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Cup of Tea</h4>
                </div>
                <img src="{{URL('/image/tea3.jpg')}}" class="img-responsive" alt="Project Title" style="width: 100%; height: 360px;"> </a> </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
    
          
      {{-- footer --}}
      <div id="footer" class="text-center">
        <div class="row" id="row">
          {{-- <div class="row"> <i class="fa fa-wordpress"></i> --}}
            <div class="section-title">
              <h3>Online Tea Farmer Registration</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
            </div>
          {{-- </div> --}}
          {{-- <div class="row"> <i class="fa fa-cart-arrow-down"></i> --}}
            <div class="section-title">
              <h3>Predictions on Bonus</h3>
        <p>Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
            </div>
          {{-- </div> --}}
        </div>
        <div class="row" id="row2">
          {{-- <div class="col-md-4"> <i class="fa fa-cloud-download"></i> --}}
                  <div id="contact" class="text-center">
                     <div class="container">
                        <div class="section-title">
                          <h2>contact us</h2>
                           
                             {{-- <h3>Form</div>/h3> --}}
                                <form method="POST" action="">
                                  <label>Email <strong>*</strong></label>
                                  <input class="form-control" type="email" name="email" placeholder="Email..">
                                  <label>Title <strong>*</strong></label>
                                  <input class="form-control" type="text" name="title" placeholder="Title...">
                                  <label>Body <strong>*</strong></label>
                                  <textarea class="form-control"></textarea>
                                  <button class="btn-custom" type="submit"> Submit</button>
                                </form>
                              </div>
                               
                             </div>
                     </div>
                  {{-- </div> --}}
               </div>
            <div class="col text-center" id="copy">
            <div class="portfolio-item">
               <h3>Copyright © 2019 Litein Tea Factory</h3>
              <p style="padding-left: 150px; padding-right: 150px; display: none;">
      All material, information, data, images or content on this website is subject to copyright or other applicable intellectual property laws and no part of it can be reproduced in any form (including paper or electronic form) without prior written consent and approval from LTF. Infringements are subject to prosecution under the applicable laws. For consent related queries and conditions, 
      please write to <a href="www.gmail.com">liteinfeafactory.gmail.com</a></p>
            
             <p>&copy copyright 2019</p>
            </div>
        </div>
       
          
     

   @endsection