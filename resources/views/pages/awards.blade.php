@extends('layouts.site')
@section('title','Home')
@section('content')
<div class="pxp-content">
   <div class="pxp-agents pxp-content-wrapper mt-100">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <h1 class="pxp-page-header text-center">Awards</h1>
               {{-- <p class="pxp-text-light">Pairing the industry's top technology with unsurpassed local expertise.</p> --}}
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row mt-100 mb-40 mb-100">
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
   </div>
</div>
@endsection
