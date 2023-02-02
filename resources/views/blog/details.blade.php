@extends('layouts.site')
@section('title'){!! $blog->title !!}@endsection
@section('description'){!! $blog->meta_description !!}@endsection
@section('keywords'){!! $blog->meta_tags !!}@endsection
@section('url'){!! route('child.page',['products',$blog->url]) !!}@endsection
@if($blog->thumbnail != "")
   @section('image'){!! CMS::admin() !!}/public/media/pages/{!! $blog->thumbnail !!}@endsection
@else
@section('image'){!! asset('assets/img/logo-lg.png') !!} @endsection
@endif
@section('article')
   <meta property="article:publisher" content="https://www.facebook.com/RochmanPropertiesLtd" />
   <meta property="article:section" content="View all" />
   <meta property="article:published_time" content="{!! date('Y-m-d H:i:s', strtotime($blog->created_at)) !!}" />
   <meta property="article:modified_time" content="{!! date('Y-m-d H:i:s', strtotime($blog->updated_at)) !!}" />
@endsection
@section('content')
   <div class="pxp-content mb-100">
      <div class="pxp-blog-posts pxp-content-wrapper mt-100">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="pxp-blog-post-category">
                     <span>{!! date('Y-m-d H:i:s', strtotime($blog->created_at)) !!}</span>
                  </div>
                  <h1 class="pxp-page-header">{!! $blog->title !!}</h1>
               </div>
            </div>
         </div>
         @if($blog->thumbnail)
            <div class="pxp-blog-post-hero mt-4 mt-md-5">
               <div class="pxp-blog-post-hero-fig pxp-cover" style="background-image: url({!! CMS::admin() !!}media/posts/{!! $blog->thumbnail !!}); background-position: 50% 50%;"></div>
            </div>
         @endif
         <div class="container @if($blog->thumbnail) mt-100 @endif">
            <div class="row">
               <div class="col-sm-12 col-lg-1">
                  <div class="pxp-blog-post-share">
                     <div class="pxp-blog-post-share-label">Share</div>
                     <ul class="list-unstyled mt-3">
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-10">
                  <div class="pxp-blog-post-block mt-4 mt-md-5 mt-lg-0">
                     <h2>{!! $blog->title !!}</h2>
                     <div class="mt-3 mt-md-4">
                        {!! $blog->content !!}
                     </div>
                  </div>
               </div>
            </div>
         </div>

         {{-- <div class="container mt-100">
            <h2 class="pxp-section-h2">Related Articles</h2>
            <div class="row mt-4 mt-md-5">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <a href="#" class="pxp-posts-1-item">
                     <div class="pxp-posts-1-item-fig-container">
                        <div class="pxp-posts-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/posts-1.jpg') !!});"></div>
                     </div>
                     <div class="pxp-posts-1-item-details">
                        <div class="pxp-posts-1-item-details-category">Interior Design</div>
                        <div class="pxp-posts-1-item-details-title">What to Expect When Working with an Interior Designer</div>
                        <div class="pxp-posts-1-item-details-date mt-2">April 9, 2021</div>
                        <div class="pxp-posts-1-item-cta text-uppercase">Read Article</div>
                     </div>
                  </a>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <a href="#" class="pxp-posts-1-item">
                     <div class="pxp-posts-1-item-fig-container">
                        <div class="pxp-posts-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/posts-2.jpg') !!});"></div>
                     </div>
                     <div class="pxp-posts-1-item-details">
                        <div class="pxp-posts-1-item-details-category">Architecture</div>
                        <div class="pxp-posts-1-item-details-title">Private Contemporary Home Balancing Openness</div>
                        <div class="pxp-posts-1-item-details-date mt-2">April 9, 2021</div>
                        <div class="pxp-posts-1-item-cta text-uppercase">Read Article</div>
                     </div>
                  </a>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <a href="#" class="pxp-posts-1-item">
                     <div class="pxp-posts-1-item-fig-container">
                        <div class="pxp-posts-1-item-fig pxp-cover" style="background-image: url({!! asset('assets/images/posts-3.jpg') !!});"></div>
                     </div>
                     <div class="pxp-posts-1-item-details">
                        <div class="pxp-posts-1-item-details-category">Interior Design</div>
                        <div class="pxp-posts-1-item-details-title">Stylish Modern Ranch Exuding a Welcoming Feel</div>
                        <div class="pxp-posts-1-item-details-date mt-2">April 9, 2021</div>
                        <div class="pxp-posts-1-item-cta text-uppercase">Read Article</div>
                     </div>
                  </a>
               </div>
            </div>
         </div> --}}
      </div>
   </div>
@endsection
