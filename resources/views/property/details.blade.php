@extends('layouts.site')
@section('title'){!! $property->product_name  !!} @endsection
@section('description'){!! $property->product_name !!}@endsection
@section('keywords'){!!$property->product_name  !!}@endsection
@section('url'){!! route('properties.details',$property->url) !!}@endsection
@section('image')@if(CMS::check_cover_image($property->id)==1){!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!}@else{!! asset('assets/images/placeholder.png') !!}@endif @endsection
@section('article')
   <meta property="article:publisher" content="https://www.facebook.com/RochmanPropertiesLtd" />
   <meta property="article:section" content="View all" />
   <meta property="article:published_time" content="{!! date('Y-m-d H:i:s', strtotime($property->created_at)) !!}" />
   <meta property="article:modified_time" content="{!! date('Y-m-d H:i:s', strtotime($property->updated_at)) !!}" />
@endsection
@section('stylesheet')
   <link rel="stylesheet" href="{!! asset('assets/css/photoswipe.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/default-skin/default-skin.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/styled354.css') !!}">
@endsection
@section('content')
<div class="pxp-content">
   <div class="pxp-single-property-top pxp-content-wrapper mt-100">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-5">
               <h2 class="pxp-sp-top-title">{!! $property->product_name !!}</h2>
               <p class="pxp-sp-top-address pxp-text-light">{!! $property->location !!}</p>
            </div>
            <div class="col-sm-12 col-md-7">
               <div class="pxp-sp-top-btns mt-2 mt-md-0">
                  @if($property->video)
                     <a href="{!! $property->video !!}" target="_blank" class="pxp-sp-top-btn"><span class="fa fa-play"></span> Video</a>
                  @endif
                  @php
                     $title= $property->product_name;
                     $url= route('properties.details',$property->url);
                     $image='assets/images/placeholder.png';
                  @endphp

                  <div class="dropdown">
                     <a class="pxp-sp-top-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-share-alt"></span> Share
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]={{ $title }}&amp;p[url]={{ $url }}&amp;&p[images][0]={{ $image }}', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><span class="fa fa-facebook"></span> Facebook</a>
                        @php

                           $title = $property->product_name;
                           $short_url = route('properties.details',$property->url);
                           $url = route('properties.details',$property->url);

                           $twitter_params =
                           '?text=' . urlencode($title) . '+-' .
                           '&amp;url=' . urlencode($short_url) .
                           '&amp;counturl=' . urlencode($url) .
                           '';


                           $link = "http://twitter.com/share" . $twitter_params . "";
                        @endphp
                        <a class="dropdown-item" href="{{ $link }}" target="_blank"><span class="fa fa-twitter"></span> Twitter</a>
                     </div>
                  </div>
               </div>
               <div class="clearfix d-block d-xl-none"></div>
               <div class="pxp-sp-top-feat mt-3 mt-md-0">
                  @if($property->bedrooms)
                     <div>{!! $property->bedrooms !!} <span>BD</span></div>
                  @endif
                  @if($property->bathroom)
                     <div>{!! $property->bathroom !!} <span>BA</span></div>
                  @endif
                  @if($property->size)
                     <div>{!! $property->size !!}</div>
                  @endif
               </div>
               <div class="pxp-sp-top-price mt-3 mt-md-0">ksh {!! number_format($property->price) !!}</div>
            </div>
         </div>
      </div>
   </div>

   <div class="pxp-single-property-gallery-container mt-4 mt-md-5">
      <div class="pxp-single-property-gallery" itemscope itemtype="http://schema.org/ImageGallery">
         @if(CMS::check_cover_image($property->id)==1)
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
               <a data-fancybox="light-masonry" href="{!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!}" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url({!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!});"></a>
               <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
         @else
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
               <a data-fancybox="light-masonry" href="{!! asset('assets/images/placeholder.png') !!}" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url({!! asset('assets/images/placeholder.png') !!});"></a>
               <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
         @endif

         @foreach($images as $image)
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
               <a data-fancybox="light-masonry" href="{!! CMS::admin() !!}media/products/{!! $image->file_name !!}" itemprop="contentUrl" data-size="1920x1459" class="pxp-cover" style="background-image: url({!! CMS::admin() !!}media/products/{!! $image->file_name !!});"></a>
               {{-- <figcaption itemprop="caption description">Image caption</figcaption> --}}
               <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
         @endforeach

         {{-- <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="images/properties/prop-7-3-big.jpg" itemprop="contentUrl" data-size="1920x2560" class="pxp-cover" style="background-image: url(images/properties/prop-7-3-gallery.jpg);"></a>
            <figcaption itemprop="caption description">Image caption</figcaption>
         </figure>

         <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="images/properties/prop-2-3-big.jpg" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url(images/properties/prop-2-3-gallery.jpg);"></a>
            <figcaption itemprop="caption description">Image caption</figcaption>
         </figure>

         --}}

      </div>
      <a data-fancybox="light-masonry" href="{!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!}" class="pxp-sp-gallery-btn">
      View Photos</a>
      <div class="clearfix"></div>
   </div>

   <div class="container mt-100">
      <div class="row">
         <div class="col-lg-8 ">
            <div class="pxp-single-property-section">
               <h3>Key Details</h3>
               <div class="row mt-3 mt-md-4">
                  @if($property->type)
                     <div class="col-sm-6">
                        <div class="pxp-sp-key-details-item">
                           <div class="pxp-sp-kd-item-label text-uppercase">Property Type</div>
                           <div class="pxp-sp-kd-item-value">{!! $property->type !!}</div>
                        </div>
                     </div>
                  @endif
                  @if($property->year)
                     <div class="col-sm-6">
                        <div class="pxp-sp-key-details-item">
                           <div class="pxp-sp-kd-item-label text-uppercase">Year Built</div>
                           <div class="pxp-sp-kd-item-value">{!! $property->year !!}</div>
                        </div>
                     </div>
                  @endif
                  @if($property->stories)
                  <div class="col-sm-6">
                     <div class="pxp-sp-key-details-item">
                        <div class="pxp-sp-kd-item-label text-uppercase">Stories</div>
                        <div class="pxp-sp-kd-item-value">{!! $property->stories !!}</div>
                     </div>
                  </div>
                  @endif
                  {{-- <div class="col-sm-6">
                     <div class="pxp-sp-key-details-item">
                        <div class="pxp-sp-kd-item-label text-uppercase">Room Count</div>
                        <div class="pxp-sp-kd-item-value">6</div>
                     </div>
                  </div> --}}
                  @if($property->garadge)
                     <div class="col-sm-6">
                        <div class="pxp-sp-key-details-item">
                           <div class="pxp-sp-kd-item-label text-uppercase">Parking Spaces</div>
                           <div class="pxp-sp-kd-item-value">{!! $property->garadge !!}</div>
                        </div>
                     </div>
                  @endif
                  @if($property->size)
                     <div class="col-sm-6">
                        <div class="pxp-sp-key-details-item">
                           <div class="pxp-sp-kd-item-label text-uppercase">Size</div>
                           <div class="pxp-sp-kd-item-value">{!! $property->size !!}</div>
                        </div>
                     </div>
                  @endif
               </div>
            </div>

            <div class="pxp-single-property-section mt-4 mt-md-5">
               <h3>Details</h3>
               <div class="mt-3 mt-md-4">
                  {!! $property->description !!}
               </div>
            </div>

            <div class="pxp-single-property-section mt-4 mt-md-5">
               <h3>Amenities</h3>
               <div class="row mt-3 mt-md-4">
                  @if(CMS::check_string($property->amenities,'Internet')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-wifi"></span> Internet</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Garage')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-car"></span> Garage</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Air Conditioning')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-sun-o"></span> Air Conditioning</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Dishwasher')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-bullseye"></span> Dishwasher</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Disposal')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-recycle"></span> Disposal</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Balcony')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Balcony</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Gym')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-futbol-o"></span> Gym</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Playroom')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-smile-o"></span> Playroom</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Bar')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-glass"></span> Bar</div>
                     </div>
                  @endif

                  @if(CMS::check_string($property->amenities,'Balcony')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Balcony</div>
                     </div>
                  @endif

                  @if(CMS::check_string($property->amenities,'Storage space')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Storage space</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Large closets')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Large closets</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Walk-in closets')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Walk-in closets</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Patio')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Patio</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Energy-efficient appliances')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Energy-efficient appliances</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Renovated kitchen')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Renovated kitchen</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Marble or granite countertops')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Marble or granite countertops</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Garbage disposal')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Garbage disposal</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Built-in microwave')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Built-in microwave</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Large windows with lots of light')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Large windows with lots of light</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Window coverings')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Window coverings</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Views')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Views</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Fireplace')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Fireplace</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Hardwood floors')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Hardwood floors</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Pet-friendly')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Pet-friendly</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Furnished')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Furnished</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Level (garden versus penthouse)')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Level (garden versus penthouse)</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Wheelchair accessible')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Wheelchair accessible</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Pet washing stations')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Pet washing stations</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Dog parks')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Dog parks</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Pet walking')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Pet walking</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Pet grooming')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Pet grooming</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Laundry facilities')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Laundry facilities</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Laundry services')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Laundry services</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Dry-cleaning')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Dry-cleaning</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Swimming pool')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Swimming pool</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Hot tub')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Hot tub</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Fitness center')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Fitness center</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Yoga studio')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Yoga studio</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Sauna')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Sauna</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Spa')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Spa</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Sports court')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Sports court</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Tennis courts')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Tennis courts</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Pickle ball courts')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Pickle ball courts</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Grilling areas')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Grilling areas</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Picnic area')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Picnic area</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Firepits')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Firepits</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Fitness center')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Fitness center</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Rooftop deck')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Rooftop deck</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Garden')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Garden</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Patio')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Patio</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Playground')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Playground</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'On-site daycare')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> On-site daycare</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'On-site classes')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> On-site classes</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Gated community')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Gated community</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Controlled access')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Controlled access</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Security guard')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Security guard</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Secured garage')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Secured garage</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Parking space')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Parking space</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Firepits')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Firepits</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Access to public transportation')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Access to public transportation</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Electric vehicle charging stations')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Electric vehicle charging stations</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Guest parking')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Guest parking</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Conference rooms')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Conference rooms</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Co-working spaces')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Co-working spaces</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Printing services')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Printing services</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Wi-Fi in common areas')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Wi-Fi in common areas</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Complimentary coffee bar')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Complimentary coffee bar</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Guest suites')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Guest suites</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'On-site convenience store')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> On-site convenience store</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Recycling center')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Recycling center</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Daily trash pick up')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Daily trash pick up</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Extra storage space')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Extra storage space</div>
                     </div>
                  @endif
                  @if(CMS::check_string($property->amenities,'Elevator')=='true')
                     <div class="col-sm-6 col-lg-4">
                        <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Elevator</div>
                     </div>
                  @endif
               </div>
            </div>

            @if($property->map)
               <div class="pxp-single-property-section mt-4 mt-md-5">
                  <h3>Explore the Area</h3>
                  {!! $property->map !!}
               </div>
            @endif

            {{-- <div class="pxp-single-property-section mt-md-5 mt-5">
               <h3>Payment Calculator</h3>
               <div class="pxp-calculator-view mt-3 mt-md-4">
                  <div class="row">
                     <div class="col-sm-12 col-lg-4 align-self-center">
                        <div class="pxp-calculator-chart-container">
                           <canvas id="pxp-calculator-chart"></canvas>
                           <div class="pxp-calculator-chart-result">
                              <div class="pxp-calculator-chart-result-sum">ksh 11,277</div>
                              <div class="pxp-calculator-chart-result-label">per month</div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-8 align-self-center mt-3 mt-lg-0">
                        <div class="pxp-calculator-data">
                           <div class="row justify-content-between">
                              <div class="col-8">
                                    <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>Principal and Interest</div>
                              </div>
                              <div class="col-4 text-right">
                                    <div class="pxp-calculator-data-sum" id="pxp-calculator-data-pi"></div>
                              </div>
                           </div>
                        </div>
                        <div class="pxp-calculator-data">
                           <div class="row justify-content-between">
                              <div class="col-8">
                                    <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>Property Taxes</div>
                              </div>
                              <div class="col-4 text-right">
                                    <div class="pxp-calculator-data-sum" id="pxp-calculator-data-pt"></div>
                              </div>
                           </div>
                        </div>
                        <div class="pxp-calculator-data">
                           <div class="row justify-content-between">
                              <div class="col-8">
                                    <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>HOA Dues</div>
                              </div>
                              <div class="col-4 text-right">
                                 <div class="pxp-calculator-data-sum" id="pxp-calculator-data-hd"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pxp-calculator-form mt-3 mt-md-4">
                  <input type="hidden" id="pxp-calculator-form-property-taxes" value="ksh 1,068">
                  <input type="hidden" id="pxp-calculator-form-hoa-dues" value="ksh 2,036">
                  <div class="row">
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                           <label for="pxp-calculator-form-term">Term</label>
                           <select class="custom-select" id="pxp-calculator-form-term">
                              <option value="30">30 Years Fixed</option>
                              <option value="20">20 Years Fixed</option>
                              <option value="15">15 Years Fixed</option>
                              <option value="10">10 Years Fixed</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                           <div class="form-group">
                              <label for="pxp-calculator-form-interest">Interest</label>
                              <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-interest" data-type="percent" value="4.45%">
                           </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                           <div class="form-group">
                              <label for="pxp-calculator-form-price">Home Price</label>
                              <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-price" data-type="currency" value="ksh 5,198,000">
                           </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                           <div class="row">
                              <div class="col-7 col-sm-7 col-md-8">
                                 <div class="form-group">
                                       <label for="pxp-calculator-form-down-price">Down Payment</label>
                                       <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-down-price" data-type="currency" value="ksh 519,800">
                                 </div>
                              </div>
                              <div class="col-5 col-sm-5 col-md-4">
                                 <div class="form-group">
                                       <label for="pxp-calculator-form-down-percentage">&nbsp;</label>
                                       <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-down-percentage" data-type="percent" value="10%">
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </div> --}}
            @if($property->schools)
               <div class="pxp-single-property-section mt-4 mt-md-5 mb-5">
                  <h3>Schools around</h3>
                  {!! $property->schools !!}
               </div>
            @endif
         </div>
         <div class="col-lg-4">
            <div class="card">
               <div class="card-body bg-grey">
                  <h3 class="widget-subtitle">Book a Viewing</h3>
                  <p>For more information and free viewing, submit your contact details below.</p>
                  <form class="contact-box rt-contact-form" method="POST" action="{!! route('properties.view.inquiry') !!}">
                     <input type="hidden" value="{!! $property->id !!}" name="property_id" required>
                     <input type="hidden" value="{!! $property->product_name !!} Viewing inquiry" name="subject" required>
                     @csrf
                     <div class="row">
                        <div class="form-group col-lg-12">
                           <label for="">Your Names <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="names" placeholder="Names" required/>
                        </div>

                        <div class="form-group col-lg-12">
                           <label for="">Your Phone number<span class="text-danger">*</span></label>
                           <input type="number" class="form-control" name="phone_number" placeholder="Phone number" required/>
                        </div>

                        <div class="form-group col-lg-12">
                           <label for="">Your Email </label>
                           <input type="email" class="form-control" name="email" placeholder="Email address"/>
                        </div>

                        <!-- <div class="form-group col-lg-6">
                           <label for="">Visit Date <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" name="view_date" required/>
                        </div>

                        <div class="form-group col-lg-6">
                           <label for="">Visit Time <span class="text-danger">*</span></label>
                           <input type="time" class="form-control" name="view_time" required/>
                        </div> -->

                        <div class="form-group col-lg-12">
                           <label for="">Message </label>
                           <textarea  name="message" class="form-control" cols="30" rows="4" placeholder="start typing ......"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                           <div class="advanced-button">
                              <button type="submit" class="btn btn-success">
                                 Send Message
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
   {{-- <script src="{!! asset('assets/js/photoswipe.min.js') !!}"></script>
   <script src="{!! asset('assets/js/photoswipe-ui-default.min.js') !!}"></script>
   <script src="{!! asset('assets/js/jquery.sticky.js') !!}"></script>
   <script src="{!! asset('assets/js/gallery.js') !!}"></script>
   <script src="{!! asset('assets/js/infobox.js') !!}"></script>
   <script src="{!! asset('assets/js/single-map.js') !!}"></script>
   <script src="{!! asset('assets/js/Chart.min.js') !!}"></script>
   <script src="{!! asset('assets/js/main.js?asdasd12') !!}"></script> --}}
@endsection
