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
      <div class="pxp-contact pxp-content-wrapper mt-100 mb-100">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-7">
                     <h1 class="pxp-page-header">Contact Us</h1>
                     <p class="pxp-text-light">Say hello. Tell us how we can guide you.</p>
               </div>
            </div>
         </div>

         <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({!! asset('assets/images/contact-bg.jpg') !!}); background-position: 50% 80%;"></div>

            <div class="pxp-contact-hero-offices-container">
               <div class="container">
                  <div class="pxp-contact-hero-offices">
                     <h2 class="pxp-section-h2">Contacts</h2>
                     <div class="row">
                        <div class="col-sm-12 col-md-4">
                           <div class="pxp-contact-hero-offices-info mt-2 mt-md-3">
                              <p class="pxp-is-address">1st Floor,Morningside Office Park, Ngong Road.</p>
                              <p class="pxp-is-address"> P.O. Box 58622-00200 Nairobi, Kenya.</p>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                           <div class="pxp-contact-hero-offices-info mt-2 mt-md-3">
                              <p class="pxp-is-address"><a href="tel:+254 707 111 777"> +254 707 111 777</a><br><a href="mailto:sales@rochman-properties.co.ke">sales@rochman-properties.co.ke</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="container mt-200">
            <div class="row">
               <div class="col-sm-12 col-lg-6">
                  @include('partials._message')
                  <h2 class="pxp-section-h2">Send Us A Message</h2>
                  <div class="pxp-contact-form mt-3 mt-md-4">
                     <form action="{!! route('inquiry.save') !!}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="name" placeholder="Name" required>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                 <input type="email" class="form-control" name="email" placeholder="Email" required>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="phone_number" placeholder="Phone" required>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send Message</a>
                     </form>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-6">
                  <div class="row mt-4 mt-md-5 mt-lg-0">
                     <div class="col-6">
                        <h2 class="pxp-section-h2">Our Locations</h2>
                     </div>
                  </div>
                  <div class="mt-3">
                     <iframe src="https://maps.google.com/maps?q=Morning+Side+Office+Park,+Ngong+Rd,+Nairobi&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="330" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
