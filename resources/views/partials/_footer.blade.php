<div class="pxp-footer pt-100 pb-100">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-lg-4">
            <div class="pxp-footer-logo">
               <img src="{!! asset('assets/images/logo-lg.png') !!}" alt="Rochman">
            </div>
            <div class="pxp-footer-social mt-2">
               <a href="https://www.instagram.com/rochmanpropertieslimited/" target="_blank"><span class="fa fa-instagram"></span></a>
               <a href="https://www.facebook.com/RochmanPropertiesLtd" target="_blank"><span class="fa fa-facebook-square"></span></a>
               <a href="https://twitter.com/rochmangroup" target="_blank"><span class="fa fa-twitter"></span></a>
               <a href="https://ke.linkedin.com/company/rochman-properties-ltd"><span class="fa fa-linkedin"></span></a>
               <a href="https://www.youtube.com/channel/UCbp5pkyBgNyo1dySuBAbi2g" target="_blank"><span class="fa fa-youtube"></span></a>
            </div>
         </div>
         <div class="col-sm-12 col-lg-8">
            <div class="row">
                  <div class="col-sm-12 col-md-4">
                     <h4 class="pxp-footer-header mt-4 mt-lg-0">Company</h4>
                     <ul class="list-unstyled pxp-footer-links mt-2">
                        <li><a href="{!! route('main.page','about-us') !!}">About Us</a></li>
                        <li><a href="{!! route('main.page','blog') !!}">Blog</a></li>
                        <li><a href="{!! route('main.page','contact-us') !!}">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-12 col-md-4">
                     <h4 class="pxp-footer-header mt-4 mt-lg-0">Actions</h4>
                     <ul class="list-unstyled pxp-footer-links mt-2">
                        @foreach(CMS::product_categories(1) as $category1)
                           <li><a href="{!! route('properties.list',$category1->url) !!}">{!! $category1->name !!}</a> </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="col-sm-12 col-md-4">
                     <h4 class="pxp-footer-header mt-4 mt-lg-0">Address</h4>
                     <div class="pxp-footer-address mt-2">
                        1st Floor,Morningside Office Park, Ngong Road.<br>
                        P.O. Box 58622-00200 Nairobi, Kenya.<br>
                        <a href="tet:0707111777">0707111777</a><br>
                        <a href="mailto:sales@rochman-properties.co.ke">sales@rochman-properties.co.ke</a>
                     </div>
                  </div>
            </div>
         </div>
      </div>

      <div class="pxp-footer-bottom mt-2">
         <div><a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></div>
         <div class="pxp-footer-copyright">&copy; Rochman Properties. All Rights Reserved. 2021</div>
      </div>
   </div>
</div>
