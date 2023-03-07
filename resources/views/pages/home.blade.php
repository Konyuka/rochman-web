@extends('layouts.site')
@section('title','Home')
@section('description'){!! $page->meta_description !!}@endsection
@section('keywords'){!! $page->meta_tags !!}@endsection
@section('url'){!! route('child.page',['products',$page->url]) !!}@endsection
@if($page->thumbnail != "")
   @section('image'){!! CMS::admin() !!}/public/media/pages/{!! $page->thumbnail !!}@endsection
@else
   @section('image'){!! asset('assets/img/winguplusseo.jpg') !!} @endsection
@endif
@section('article')
   <meta property="article:publisher" content="https://www.facebook.com/winguplus" />
   <meta property="article:section" content="View all" />
   <meta property="article:published_time" content="{!! date('Y-m-d H:i:s', strtotime($page->created_at)) !!}" />
   <meta property="article:modified_time" content="{!! date('Y-m-d H:i:s', strtotime($page->updated_at)) !!}" />
@endsection
@section('stylesheet')
<style>
       .modal-newsletter {
         color: #999;
         /* width: 480px; */
         font-size: 15px;
      }
      .modal-newsletter .modal-content {
         padding: 40px 50px;
         border-radius: 1px;
         border: none;
      }
      .modal-newsletter .modal-header {
         border-bottom: none;
         position: relative;
         text-align: center;
         border-radius: 5px 5px 0 0;
      }
      .modal-newsletter h4 {
         color: #000;
         text-align: center;
         font-family: 'Lato', sans-serif;
         font-weight: 900;
         font-size: 30px;
         margin: 0 0 25px;
         text-transform: uppercase;
      }
      .modal-newsletter .close {
         position: absolute;
         top: -5px;
         right: -15px;
         color: #c0c3c8;
         text-shadow: none;
         opacity: 0.5;
         width: 32px;
         height: 32px;
         border-radius: 20px;
         font-size: 18px;
         border: 2px solid;
         padding: 0;
      }
      .modal-newsletter .close:hover {
         opacity: 0.8;
      }
      .modal-newsletter .icon-box {
         color: #49c5c1;
         display: inline-block;
         z-index: 9;
         text-align: center;
         position: relative;
      }
      .modal-newsletter .icon-box i {
         font-size: 110px;
      }
      .modal-newsletter .form-control, .modal-newsletter .btn {
         min-height: 46px;
         text-align: center;
         border-radius: 1px;
      }
      .modal-newsletter .form-control {
         box-shadow: none;
         border-color: #dbdbdb;
      }
      .modal-newsletter .form-control:focus {
         border-color: #49c5c1;
         box-shadow: 0 0 8px rgba(73, 197, 193, 0.5);
      }
      .modal-newsletter .btn, .modal-newsletter .btn:active {
         color: #fff;
         background: #49c5c1 !important;
         text-decoration: none;
         transition: all 0.4s;
         line-height: normal;
         padding: 6px 20px;
         min-width: 180px;
         border: none;
         margin-top: 20px;
         font-family: 'Airal', sans-serif;
         font-size: 14px;
         font-weight: bold;
         text-transform: uppercase;
      }
      .modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
         background: #39b3af !important;
         outline: none;
      }
      .modal-newsletter .form-group {
         margin-top: 30px;
      }
      .hint-text {
         margin: 100px auto;
         text-align: center;
      }

      .pxp-results-card-1-features {
         position: absolute;
         top: 20px;
         left: 20px;
         transform: translateY(-50%);
         color: #fff;
         font-weight: 700;
         text-transform: uppercase;
         padding: 6px 10px;
         border-radius: 3px;
         font-size: .6rem;
         /* overflow: hidden; */
         opacity: 1 !important;
         z-index: 4;
         background-color: #af1010;
         white-space: nowrap;
         box-shadow: 0px 3px 6px rgb(0 0 0 / 10%);
         -webkit-transition: all .3s ease-in-out;
         -o-transition: all .3s ease-in-out;
         transition: all .3s ease-in-out;
      }

   </style>
@endsection
@section('content')
   <div class="pxp-content">

      <div class="pxp-hero vh-100">
         <div id="pxp-hero-props-carousel-1" class="carousel slide pxp-hero-props-carousel-1" data-ride="carousel" data-pause="false" data-interval="7000">
            <ol class="carousel-indicators container">
               @foreach($sliders as $item)
                  <li data-target="#pxp-hero-props-carousel-1" data-slide-to="{!! $item->id !!}" class="pxp-cover @if($item->id == 1) active @endif" style="background-image: url({!! CMS::admin() !!}media/sliders/{!! $item->image !!});"></li>
               @endforeach

                  <!-- <li data-target="#pxp-hero-props-carousel-1" data-slide-to="0" class="pxp-cover active" style="background-image: url(images/properties/prop-1-1-thmb.jpg);"></li>
                  <li data-target="#pxp-hero-props-carousel-1" data-slide-to="1" class="pxp-cover" style="background-image: url(images/properties/prop-2-1-thmb.jpg);"></li>  -->

            </ol>

            <div class="carousel-inner">
               @foreach($sliders as $item)
                  <div class="carousel-item @if($item->id == 1) active @endif" data-slide="{!! $item->id !!}">
                     <div class="pxp-hero-bg pxp-cover" style="background-image: url({!! CMS::admin() !!}media/sliders/{!! $item->image !!});"></div>
                     <div class="pxp-caption">
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-12 col-md-8 col-lg-6">
                                 <div class="pxp-caption-prop-title">{!! $item->caption_one !!}</div>
                              </div>
                           </div>
                           <div class="pxp-caption-prop-features mt-4">{!! $item->caption_two !!}</div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>

            <div class="pxp-carousel-controls">
               <a class="pxp-carousel-control-prev" role="button" data-slide="prev">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32.414" height="20.828" viewBox="0 0 32.414 20.828">
                     <g id="Group_30" data-name="Group 30" transform="translate(-1845.086 -1586.086)">
                        <line id="Line_2" data-name="Line 2" x1="30" transform="translate(1846.5 1596.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                        <line id="Line_3" data-name="Line 3" x1="9" y2="9" transform="translate(1846.5 1587.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                        <line id="Line_4" data-name="Line 4" x1="9" y1="9" transform="translate(1846.5 1596.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                     </g>
                  </svg>
               </a>
               <a class="pxp-carousel-control-next" role="button" data-slide="next">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32.414" height="20.828" viewBox="0 0 32.414 20.828">
                     <g id="Symbol_1_1" data-name="Symbol 1 – 1" transform="translate(-1847.5 -1589.086)">
                        <line id="Line_5" data-name="Line 2" x2="30" transform="translate(1848.5 1599.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                        <line id="Line_6" data-name="Line 3" x2="9" y2="9" transform="translate(1869.5 1590.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                        <line id="Line_7" data-name="Line 4" y1="9" x2="9" transform="translate(1869.5 1599.5)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="2"/>
                     </g>
                  </svg>
               </a>
            </div>
         </div>
         <div class="carousel slide pxp-hero-props-carousel-1-prices" data-ride="carousel" data-pause="false" data-interval="false">
            <div class="carousel-inner">
               @foreach($sliders as $item)
                  <div class="carousel-item @if($item->id == 1) active @endif" data-slide="{!! $item->id !!}"

                        @if($item->id == 1)
                           style="background-color: #e1a447;"
                        @endif
                        @if($item->id == 2)
                           style="background-color: #837c12;"
                        @endif
                        @if($item->id == 3)
                           style="background-color: #898668;"
                        @endif
                        @if($item->id == 4)
                           style="background-color: #687389;"
                        @endif
                     >
                     <div class="pxp-progress"></div>
                     <div class="pxp-price"><span>{!! $item->caption_three !!}</span></div>
                     <a href="#" class="pxp-cta text-uppercase pxp-animate">View Details</a>
                  </div>
               @endforeach

           
               <!-- <div class="carousel-item" data-slide="1" style="background-color: #837c12;">
                  <div class="pxp-progress"></div>
                  <div class="pxp-price"><span>ksh 2,675</span></div>
                  <a href="single-property.html" class="pxp-cta text-uppercase pxp-animate">View Details</a>
               </div>
               <div class="carousel-item" data-slide="2" style="background-color: #687389;">
                     <div class="pxp-progress"></div>
                     <div class="pxp-price"><span>ksh 960,000</span></div>
                     <a href="single-property.html" class="pxp-cta text-uppercase pxp-animate">View Details</a>
               </div>
               <div class="carousel-item" data-slide="3" style="background-color: #6e463a;">
                     <div class="pxp-progress"></div>
                     <div class="pxp-price"><span>ksh 7,995</span></div>
                     <a href="single-property.html" class="pxp-cta text-uppercase pxp-animate">View Details</a>
               </div>  -->

            </div>

            <div class="pxp-carousel-ticker">
               <div class="pxp-carousel-ticker-counter"></div>
               <div class="pxp-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>
               <div class="pxp-carousel-ticker-total"></div>
            </div>
            
         </div>
      </div>

      <div class="container-fluid pxp-props-carousel-right mt-100">
         <h2 class="pxp-section-h2">Latest Properties</h2>
         <p class="pxp-text-light">Be the first to browse exclusive listings before they hit the market.</p>
         <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
               @foreach($featured as $property)
                  <div>
                     <a href="{!! route('properties.details',$property->url) !!}" class="pxp-prop-card-1 rounded-lg">
                        
                        @if(CMS::check_cover_image($property->id)==0)   
                           <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!});"></div>
                        @else
                           <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({!! asset('assets/images/placeholder.png') !!});"></div>
                        @endif
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                           <div class="pxp-prop-card-1-details-title">{!! $property->product_name !!}</div>
                           <div class="pxp-prop-card-1-details-price">ksh {!! number_format($property->price) !!}</div>
                           <div class="pxp-prop-card-1-details-features text-uppercase"> @if($property->bedrooms){!! $property->bedrooms !!} BD <span>|</span> @endif @if($property->bathroom) {!! $property->bathroom !!} BA <span>|</span> @endif @if($property->size) {!! $property->size !!} SF @endif</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                        @if($property->feature_alert && $property->feature_color)
                           <div class="pxp-results-card-1-features" @if($property->feature_color) style="background-color: {{$property->feature_color}};"@endif>
                              <span>{!! $property->feature_alert !!}</span>
                           </div>
                        @endif
                     </a>
                  </div>
               @endforeach
            </div>
            <a href="https://rochman-properties.co.ke/properties/type/to-let" class="pxp-primary-cta text-uppercase mt-4 mt-md-5 pxp-animate">Browse All</a>
         </div>
      </div>

      <div class="pxp-numbers vh-100">
         <div class="container pt-300 pb-100 mt-100">
            <h2 class="pxp-section-h2">Real Estate by the Numbers</h2>
            <p class="pxp-text-light">In 2022, things look like this:</p>
            <div class="row">
               {{-- <div class="col-sm-4">
                  <div class="pxp-numbers-item mt-4 mt-md-5">
                     <div class="pxp-numbers-item-number"><span class="numscroller" data-min="0" data-max="195" data-delay="1" data-increment="1">995</span>M</div>
                     <div class="pxp-numbers-item-title">Property value</div>
                  </div>
               </div> --}}
               @php
                  $number1 = CMS::custom_field($page->id,'Number 1')->getData();
                  $number2 = CMS::custom_field($page->id,'Number 2')->getData();
                  $number3 = CMS::custom_field($page->id,'Number 3')->getData();
               @endphp
               @if($number1->check == 1)
                  {!! $number1->field->content !!}
               @endif
               @if($number2->check == 1)
                  {!! $number2->field->content !!}
               @endif
               @if($number3->check == 1)
                  {!! $number3->field->content !!}
               @endif
            </div>
         </div>
      </div>

      <div class="pxp-services-accordion pxp-services-accordion-has-image mt-100">
         {{-- <div class="container">
            <div class="row">
               <div class="col-md-5">
                     <h2 class="pxp-section-h2">Search Smarter, From Anywhere</h2>
               </div>
            </div>
         </div> --}}
         <div class="row no-gutters align-items-center">
            <div class="col-md-6">
               <div class="pxp-services-accordion-fig pxp-cover" style="background-image: url(https://crm.rochman-properties.co.ke/public//media/gallery/MNdTWSWhatsApp%20Image%202022-07-20%20at%2010.08.18%20AM.jpeg);"></div>
            </div>
            <div class="col-md-6 pxp-services-accordion-right">
               <div class="pxp-services-accordion-right-container">
                  <div class="row">
                     <div class="col-xl-10 col-xxl-8">
                        <h2 class="pxp-section-h2 mt-3 mt-md-5 mt-lg-0">Who we are</h2>
                        <p class="pxp-text-light mt-3 mt-lg-4">{!! $page->content !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="container mt-100">
         <h2 class="pxp-section-h2">Find the Neighborhood For You</h2>
         <p class="pxp-text-light">The neighborhoods best suited to your lifestyle, and the agents who know them best.</p>

         <div class="row mt-4 mt-md-5">
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(https://www.micato.com/wp-content/uploads/2018/09/Nairobi_Skyline-1110x700.jpg);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Nairobi</div>
                     <div class="pxp-areas-1-item-details-city">Kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>324 Properties</span></div> --}}
                  {{-- <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(https://i0.wp.com/kimisituinvestment.co.ke/wp-content/uploads/2021/02/kitengela-800x400-1.png?fit=800%2C400&ssl=1);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Kitengela</div>
                     <div class="pxp-areas-1-item-details-city">kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>158 Properties</span></div>
                  <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(https://firstavenueproperties.co.ke/wp-content/uploads/2016/03/Shaba-Village.jpg);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Syokimau</div>
                     <div class="pxp-areas-1-item-details-city">kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>129 Properties</span></div>
                  <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(https://victormatara.com/wp-content/uploads/2018/07/Webp.net-compress-image-26.jpg);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Kiserian</div>
                     <div class="pxp-areas-1-item-details-city">kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>129 Properties</span></div>
                  <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(https://cdn.standardmedia.co.ke/sdemedia/sdeimages/wednesday/qfktu4grsvipab5efc441007684.jpg);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Ruiru</div>
                     <div class="pxp-areas-1-item-details-city">Kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>324 Properties</span></div>
                  <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
               <a href="#" class="pxp-areas-1-item rounded-lg">
                  <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(http://www.hiiraan.com/images/2017/July/201773636346422819309534nakuru_HOL_660.jpg);"></div>
                  <div class="pxp-areas-1-item-details">
                     <div class="pxp-areas-1-item-details-area">Naivasha</div>
                     <div class="pxp-areas-1-item-details-city">Kenya</div>
                  </div>
                  {{-- <div class="pxp-areas-1-item-counter"><span>158 Properties</span></div>
                  <div class="pxp-areas-1-item-cta text-uppercase">Explore</div> --}}
               </a>
            </div>
         </div>

         <a href="#" class="pxp-primary-cta text-uppercase mt-2 mt-md-4 pxp-animate">Explore Neighborhoods</a>
      </div>

      <div class="pxp-testim-1 pt-100 pb-100 mt-100 pxp-cover" style="background-image: url({!! asset('assets/images/testim-1-fig.jpg') !!});">
         <div class="pxp-testim-1-intro">
            <h2 class="pxp-section-h2">Customer Testimonials</h2>
            <p class="pxp-text-light">What our customers say about us</p>
            <a href="#" class="pxp-primary-cta text-uppercase mt-2 mt-md-3 mt-lg-5 pxp-animate">Read All Stories</a>
         </div>
         <div class="pxp-testim-1-container mt-4 mt-md-5 mt-lg-0">
            <div class="owl-carousel pxp-testim-1-stage">
               <div>
                  <div class="pxp-testim-1-item">
                     <div class="pxp-testim-1-item-name mt-3">Peter Karanja</div>
                     <div class="pxp-testim-1-item-location">Maryland, USA</div>
                     <div class="pxp-testim-1-item-message">Rochman Properties Limited have been managing my properties for over 25 years and I have not had a complain.  I recommend them to anyone looking for a genuine real estate partner in Kenya.</div>
                  </div>
               </div>
               <div>
                  <div class="pxp-testim-1-item">
                     <div class="pxp-testim-1-item-name mt-3">Catherine Mukuria</div>
                     <div class="pxp-testim-1-item-location">St. Louis, USA</div>
                     <div class="pxp-testim-1-item-message">I had my fears of investing back in Kenya given the trend of most Kenyans in Diaspora being duped of their hard earned money by fraudulent companies, and even relatives. Rochman Properties was patient with me during the transaction and allowed me to send as many people to verify the property. I would recommend Rochman to any Kenyan living abroad who wants genuine and quality property in Kenya</div>
                  </div>
               </div>
               <div>
                  <div class="pxp-testim-1-item">

                     <div class="pxp-testim-1-item-name mt-3">Emily Wangari Muiruri</div>
                     <div class="pxp-testim-1-item-location">Maryland, USA</div>
                     <div class="pxp-testim-1-item-message">For as long as I can remember, Real Estate investing has been a part of my life. As kids we’d drive around with dad looking for land or homes to invest in. Not all were successful but we learned in the process. Part of that process is finding a good developer and builder that will go above and beyond and deliver for their clients over and over again. The other challenge is finding one that is reputable and can work and communicate efficiently with those of us in the Diaspora. We have been fortunate to have found such a company and over the years that we’ve done business with Rochman Properties Limited, they’ve continued in their excellence of delivering beautiful homes for their clients.</div>
                  </div>
               </div>
               <div>
                  <div class="pxp-testim-1-item">

                     <div class="pxp-testim-1-item-name mt-3">Abdi Hussein</div>
                     <div class="pxp-testim-1-item-location">Mombasa, Kenya</div>
                     <div class="pxp-testim-1-item-message">All their properties are prime and within competitive prices.I also like the customer experience from their property consultants. Good job!</div>
                  </div>
               </div>
               <div>
                  <div class="pxp-testim-1-item">

                     <div class="pxp-testim-1-item-name mt-3">John Mokaya</div>
                     <div class="pxp-testim-1-item-location">Minnesota, USA</div>
                     <div class="pxp-testim-1-item-message">My title was out in good time as promised and the property prime for immediate development. If you are looking for a company that delivers on their promise, Rochman Properties is the go to company.</div>
                  </div>
               </div>
               <div>
                  <div class="pxp-testim-1-item">

                     <div class="pxp-testim-1-item-name mt-3">Issac Otieno</div>
                     <div class="pxp-testim-1-item-location">Karen, Nairobi</div>
                     <div class="pxp-testim-1-item-message">I like the quality finishing of their apartment along Ngong Road. Keep up the good work</div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="container mt-100">
         <h2 class="pxp-section-h2">From Our Blog</h2>
         <p class="pxp-text-light">Read our latest articles on real estate.</p>
         <div class="row mt-4 mt-md-5">
            @foreach($blogs as $blog)
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <a href="{!! route('blog.details',$blog->url) !!}" class="pxp-posts-1-item">
                     <div class="pxp-posts-1-item-fig-container">
                        @if($blog->thumbnail)
                           <div class="pxp-posts-1-item-fig pxp-cover" style="background-image: url({!! CMS::admin() !!}media/posts/{!! $blog->thumbnail !!});"></div>
                        @else
                           <div class="pxp-posts-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/placeholder.png') !!});"></div>
                        @endif

                     </div>
                     <div class="pxp-posts-1-item-details">
                        {{-- <div class="pxp-posts-1-item-details-category">Interior Design</div> --}}
                        <div class="pxp-posts-1-item-details-title">{!! $blog->title !!}</div>
                        <div class="pxp-posts-1-item-details-date mt-2">{!! date('F jS, Y', strtotime($blog->created_at)) !!}</div>
                        <div class="pxp-posts-1-item-cta text-uppercase">Read Article</div>
                     </div>
                  </a>
               </div>
            @endforeach
         </div>
         <a href="#" class="pxp-primary-cta text-uppercase mt-2 mt-md-4 pxp-animate">Read More</a>
      </div>

      <div class="container">
         <div class="row mt-5">
            <div class="col-md-12 mb-5">
               <h2 class="pxp-section-h2 text-center">Awards</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="#" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                     <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url(https://crm.rochman-properties.co.ke/public//media/gallery/DggXzKWhatsApp%20Image%202022-07-19%20at%204.53.18%20PM.jpeg); background-size:contain"></div>
                  </div>
               </a>
               <p class="text-center"><b>Best Mid Level Property Agency 2022</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="#" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                     <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/2021.png') !!}); background-size:contain"></div>
                  </div>
               </a>
               <p class="text-center"><b>Best Mid Level Property Agency 2021</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="#" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                     <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/award.jpeg') !!}); background-size:contain"></div>
                  </div>
               </a>
               <p class="text-center"><b>Best Mid Level Property Agency 2021</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
               <a href="#" class="pxp-agents-1-item">
                  <div class="pxp-agents-1-item-fig-container rounded-lg">
                     <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/2019.png') !!}); background-size:contain"></div>
                  </div>
               </a>
               <p class="text-center"><b>Most Improved Residential Estate Agency</b></p>
            </div>
         </div>
      </div>

      <div class="pxp-full pxp-cover pt-100 pb-100 mt-100" style="background-image: url({!! asset('assets/images/newsletter-1-fig.jpg') !!});">
         <div class="container">
            <h2 class="pxp-section-h2">Stay Up to Date</h2>
            <p class="pxp-text-light">Subscribe to our newsletter to receive our weekly feed</p>
            <div class="row mt-4 mt-md-5">
               <div class="col-sm-12 col-md-6">

                     <!-- <form action="http://pixelprime.co/themes/Rochman Properties/light/index-2.html" class="pxp-newsletter-1-form">
                        <input type="text" class="form-control" placeholder="Enter your email...">
                        <a href="#" class="pxp-primary-cta text-uppercase pxp-animate mt-3 mt-md-4">Subscribe</a>
                     </form> -->
                     @include('partials._message')   
                     <form action="{!! route('newsletter.save') !!}" method="POST">
                        @csrf
                        <h4>Subscribe</h4>
                        <p>Subscriber to our newsletter to receive the latest updates and promotions.</p>
                        <div class="form-group">
                           <input type="text" name="first_name" class="form-control mb-3" placeholder="Enter First Name" required>
                           <input type="text" name="last_name" class="form-control mb-3" placeholder="Enter Last Name" required>
                           <input type="email" name="email" class="form-control mb-3" placeholder="Enter your Email" required>
                           <input type="number" name="phone_number" class="form-control mb-3" placeholder="Enter Your Phone Number" required>
                           <input type="submit" class="btn btn-success" value="Subscribe">
                        </div>
                     </form>

               </div>
            </div>
         </div>
      </div> 
      
   </div>

   <!-- <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-newsletter">
         <div class="modal-content">
            <div class="modal-header justify-content-center">
               <div class="icon-box">
                  <i class="fa fa-envelope"></i>
               </div>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
            </div>
            <div class="modal-body text-center">
               @include('partials._message')
               <form action="{!! route('newsletter.save') !!}" method="POST">
                  @csrf
                  <h4>Subscribe</h4>
                  <p>Subscriber to our newsletter to receive the latest updates and promotions.</p>
                  <div class="form-group">
                     <input type="text" name="first_name" class="form-control mb-3" placeholder="Enter First Name" required>
                     <input type="text" name="last_name" class="form-control mb-3" placeholder="Enter Last Name" required>
                     <input type="email" name="email" class="form-control mb-3" placeholder="Enter your Email" required>
                     <input type="number" name="phone_number" class="form-control mb-3" placeholder="Enter Your Phone Number" required>
                     <input type="submit" class="btn btn-primary" value="Subscribe">
                  </div>
               </form>
            </div>
         </div>
      </div> -->

   </div>

@endsection
@section('scripts')
   <script>
      $(document).ready(function(){
         $("#myModal").modal('show');
      });
   </script>
@endsection
