@extends('layouts.site')
@section('title'){!! $page->title !!} @endsection
@section('description'){!! $page->meta_description !!}@endsection
@section('keywords'){!! $page->meta_tags !!}@endsection
@section('url'){!! route('child.page',['products',$page->url]) !!}@endsection
@if($page->thumbnail != "")
   @section('image'){!! CMS::admin() !!}/public/media/pages/{!! $page->thumbnail !!}@endsection
@else
@section('image'){!! asset('assets/images/logo-lg.png') !!} @endsection
@endif
@section('article')
   <meta property="article:publisher" content="https://www.facebook.com/RochmanPropertiesLtd" />
   <meta property="article:section" content="View all" />
   <meta property="article:published_time" content="{!! date('Y-m-d H:i:s', strtotime($page->created_at)) !!}" />
   <meta property="article:modified_time" content="{!! date('Y-m-d H:i:s', strtotime($page->updated_at)) !!}" />
@endsection
@section('stylesheet')
   <style>
      .item-img {
         opacity: 1;
         /* background-color: rgb(236 250 247); */
         padding: 30px 30px 30px 30px;
      }

      .border-radius{
         border-radius: 24px
      }

   </style>
@endsection
@section('content')
   <div class="pxp-contact pxp-content-wrapper mt-100">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 mb-2">
                  <h1 class="pxp-page-header text-center">About Us</h1>
            </div>
         </div>
      </div>
      <div class="pxp-cta-3 mt-100 mb-5">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="pxp-cta-3-image pxp-cover rounded-lg" style="background-image: url({!! asset('assets/images/about.jpg') !!});"></div>
               </div>
               <div class="col-lg-1"></div>
               <div class="col-lg-5">
                  <h2 class="pxp-section-h2 mt-3 mt-md-5 mt-lg-0">Who we are</h2>
                  <p class="pxp-text-light mt-3 mt-lg-4">Rochman Properties has a heritage of 15 years in the real estate industry, driven by a vision to provide quality property solutions in Kenya that offers optimum returns of investment. With its wealth of experience, Rochman Properties Limited is continuously dedicated to providing environmentally sustainable, strategically located and economically viable properties within Kenya.</p>

               </div>
            </div>
         </div>
      </div>

      {{-- <div class="pxp-services pxp-cover mt-100 pt-100 mb-200" style="background-image: url({!! asset('assets/images/services-h-fig.jpg') !!}); background-position: 50% 60%;">
         <h2 class="text-center pxp-section-h2">Why Choose Us</h2>
         <p class="pxp-text-light text-center">We offer perfect real estate services</p>

         <div class="container">
            <div class="pxp-services-container rounded-lg mt-4 mt-md-5">
               <a href="properties.html" class="pxp-services-item">
                     <div class="pxp-services-item-fig">
                        <img src="{!! asset('assets/images/service-icon-1.svg') !!}" alt="...">
                     </div>
                     <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Find your future home</div>
                        <div class="pxp-services-item-text-sub">We help you find a new home by offering<br>a smart real estate experience</div>
                     </div>
                     <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
               </a>
               <a href="agents.html" class="pxp-services-item">
                     <div class="pxp-services-item-fig">
                        <img src="{!! asset('assets/images/service-icon-2.svg') !!}" alt="...">
                     </div>
                     <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Experienced agents</div>
                        <div class="pxp-services-item-text-sub">Find an agent who knows<br>your market best</div>
                     </div>
                     <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
               </a>
               <a href="properties.html" class="pxp-services-item">
                     <div class="pxp-services-item-fig">
                        <img src="{!! asset('assets/images/service-icon-3.svg') !!}" alt="...">
                     </div>
                     <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Buy or rent homes</div>
                        <div class="pxp-services-item-text-sub">Millions of houses and apartments in<br>your favourite cities</div>
                     </div>
                     <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
               </a>
               <a href="submit-property.html" class="pxp-services-item">
                     <div class="pxp-services-item-fig">
                        <img src="{!! asset('assets/images/service-icon-4.svg') !!}" alt="...">
                     </div>
                     <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">List your own property</div>
                        <div class="pxp-services-item-text-sub">Sign up now and sell or rent<br>your own properties</div>
                     </div>
                     <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
               </a>
               <div class="clearfix"></div>
            </div>
         </div>
      </div> --}}

      {{-- <div class="container mt-100">
         <h2 class="pxp-section-h2">Our Featured Agents</h2>
         <p class="pxp-text-light">Meet the best real estate agents</p>

         <div class="row mt-4 mt-md-5">
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="single-agent.html" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/Profile_avatar_placeholder_large.png') !!}); background-position: top center"></div>
                  </div>
                  <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Scott Goodwin</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (123) 456-7890</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                  </div>
                  <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></div>
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="single-agent.html" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/Profile_avatar_placeholder_large.png') !!}); background-position: top center"></div>
                  </div>
                  <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Alayna Becker</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (456) 123-7890</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                  </div>
                  <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span></span></div>
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="single-agent.html" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/Profile_avatar_placeholder_large.png') !!}); background-position: top center"></div>
                  </div>
                  <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Melvin Blackwell</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (789) 123-4560</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                  </div>
                  <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></div>
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="single-agent.html" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/Profile_avatar_placeholder_large.png') !!}); background-position: top center"></div>
                  </div>
                  <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Erika Tillman</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (890) 456-1237</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                  </div>
                  <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span></span></div>
               </a>
            </div>
         </div>
      </div> --}}
   </div>
@endsection
