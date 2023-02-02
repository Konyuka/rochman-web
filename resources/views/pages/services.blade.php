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
   <div class="pxp-content">
      <div class="pxp-contact pxp-content-wrapper mt-100">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-12 mb-100">
                     <h1 class="pxp-page-header text-center">Our Services</h1>
               </div>
            </div>
         </div>
         <div class="container mb-100">
            <div class="row flex-row flex-lg-row-reverse mb-100 bg-grey">
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout3">
                     <div class="item-img">
                        <center>
                           <img src="{!! asset('assets/images/Landlord-Tenant-Relationship.jpeg') !!}" class="border-radius" alt="about" width="407" height="349">
                        </center>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout2">
                     <h2 class="item-title mt-100">Property Management.</h2>
                     <p>We handle tasks that prevent your properties from staying vacant for too long ranging from screening tenants, advising on opimal rent rate, handling rent collection to ensure consistent and reliable cash flow, Identifying and preparing any maintenance issues to avoid larger and more expensive problems in the future.</p>
                  </div>
               </div>
            </div>

            <div class="row flex-row flex-lg-row-reverse mb-100 bg-grey">
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout2 mt-100">
                     <h2 class="item-title">Development Intelligence & Alignment .</h2>
                     <p>Rochman Properties integrate the most assumed relationship between design and construction to satisfy the current market demands and gaps which results in a substantial increase of end user uptake.</p>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout3">
                     <div class="item-img">
                        <img src="{!! asset('assets/images/home-blueprints.jpg') !!}" class="border-radius" alt="about" width="407" height="349">
                     </div>
                  </div>
               </div>
            </div>

            <div class="row flex-row flex-lg-row-reverse bg-grey">
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout3">
                     <div class="item-img">
                        <img src="{!! asset('assets/images/saleproperty.jpg') !!}" class="border-radius" alt="about" width="407" height="349">
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="about-layout2">
                     <h2 class="item-title mt-100">Property Selling.</h2>
                     <p>We support you throughout the entire course of the selling process, offering all the services you need to secure the successful sale of your property. Starting from correct pricing to match the market demand through to preparing and marketing the property(s) for sale, and handling all of the legal requirements</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
