 <br>
      <div style="width: 100%;
      background:white; height: 10px;"></div>
      <div id="footer" class="text-center" style="background:">
        <div class="row" id="row1">
                  <h2 style="color: white">Quick Links</h2>

          {{-- <div class="row"> <i class="fa fa-wordpress"></i> --}}
            <div class="section-title">
              <h3 style="color: white;">Online Tea Farmer Registration</h3>
        <p style="color: white;">Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
            </div>
          {{-- </div> --}}
          {{-- <div class="row"> <i class="fa fa-cart-arrow-down"></i> --}}
            <div class="section-title">
              <h3 style="color: white">Predictions on Bonus</h3>
        <p style="color: white">Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then</p>
            </div>
          {{-- </div> --}}
        </div>
        <div class="row" id="row2">
          {{-- <div class="col-md-4"> <i class="fa fa-cloud-download"></i> --}}
                  <div id="contact" class="text-center">
                     <div class="container" style="border-style: groove;border-width: 3px;border-color: orange;">
                        <div class="section-title">
                          <h2>contact us</h2>
                           
                                <form method="POST" action="/contactus">
                                  @csrf

                                  <label>Email <strong>*</strong></label>
                                  @auth
                                  <input class="form-control" type="email" name="email" placeholder="Email.." value="{{auth()->user()->email}}" readonly>
                                    @else
                                   <input class="form-control" type="email" name="email" placeholder="Email.." required="">
                                   @endif


                                  <label>Title <strong>*</strong></label>
                                  <input class="form-control" type="text" name="title" placeholder="Title..." required="">
                                  <label>Body <strong>*</strong></label>
                                  <textarea class="form-control" name="body" style="color: black; font-weight: 800;" required=""></textarea>
                                  <button class="btn-custom" type="submit"> Submit</button>
                                </form>
                              </div>
                               
                             </div>
                     </div>
                  {{-- </div> --}}
               </div>
               <hr style="width: 100%; color: white;background-color: white;height: 2px;">  
            <div class="col text-center" id="copy">
            <div class="portfolio-item">
               <h3>Copyright © 2019 Litein Tea Factory</h3>
              <p style="padding-left: 150px; padding-right: 150px; display: none;">
      All material, information, data, images or content on this website is subject to copyright or other applicable intellectual property laws and no part of it can be reproduced in any form (including paper or electronic form) without prior written consent and approval from LTF. Infringements are subject to prosecution under the applicable laws. For consent related queries and conditions, 
      please write to <a href="www.gmail.com">liteinfeafactory.gmail.com</a></p>
            
             <p>&copy copyright 2019</p>
            </div>
        </div>
       