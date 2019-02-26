@extends('layouts.master')
@section('content')
<header id="header">
  
  <div class="landing-page">
    <div style="" id="page"></div>
    <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000" style="padding-top: 0%">
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
         <div class="col-lg-1 lg-success">
           
         </div>
      </div>
    </div>
    <img src="{{ URL::to('image/desk.jpg') }}">
  </div>
  
  
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
        <h3>Lorem ipsum</h3>
        <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque etiam.</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-bullhorn"></i>
        <h3>Dolor sit amet</h3>
        <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque.</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-group"></i>
        <h3>Tempus eleifend</h3>
        <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque etiam.</p>
      </div>
      <div class="col-xs-6 col-md-3"> <i class="fa fa-magic"></i>
        <h3>Pellentesque</h3>
        <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque.</p>
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
      <p>jhgfghj</p>
    </div>
    <div class="row">
      <div class="col-md-4"> <i class="fa fa-wordpress"></i>
        <div class="service-desc">
          <h3>Online Tea Farmer Registration</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-cart-arrow-down"></i>
        <div class="service-desc">
          <h3>Predictions on Bonus</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-cloud-download"></i>
        <div class="service-desc">
          <h3>Instant Farmer Notification</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"> <i class="fa fa-language"></i>
        <div class="service-desc">
          <h3>Farmers Tea Report Summary</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-plane"></i>
        <div class="service-desc">
          <h3>Approximation On Fertilizer Allocation</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
        </div>
      </div>
      <div class="col-md-4"> <i class="fa fa-pie-chart"></i>
        <div class="service-desc">
          <h3>Trends in Tea Production</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
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
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
      </div>
      <div class="row">
        <div class="portfolio-items">
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
             <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
                 <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
             <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
             <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="/" title="Project Title" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4>Lorem Ipsum</h4>
                </div>
                <img src="{{URL('/image/desk.jpg')}}" class="img-responsive" alt="Project Title"> </a> </div>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
            </div>
          {{-- </div> --}}
          {{-- <div class="row"> <i class="fa fa-cart-arrow-down"></i> --}}
            <div class="section-title">
              <h3>Predictions on Bonus</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
             <h3>Property Of Litein Tea Factory</h3>
             <p>&copy copyright 2019</p>
            </div>
        </div>
       
          
     

   @endsection