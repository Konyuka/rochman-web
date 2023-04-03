@extends('layouts.site')
@section('title'){!! $page->title !!} @endsection
@section('description'){!! $page->meta_description !!}@endsection
@section('keywords'){!! $page->meta_tags !!}@endsection
@section('url'){!! route('child.page',['products',$page->url]) !!}@endsection
@if($page->thumbnail != "")
   @section('image'){!! CMS::admin() !!}/public/media/pages/{!! $page->thumbnail !!}@endsection
@else
@section('image'){!! asset('assets/img/logo-lg.png') !!} @endsection
@endif
@section('article')
   <meta property="article:publisher" content="https://www.facebook.com/RochmanPropertiesLtd" />
   <meta property="article:section" content="View all" />
   <meta property="article:published_time" content="{!! date('Y-m-d H:i:s', strtotime($page->created_at)) !!}" />
   <meta property="article:modified_time" content="{!! date('Y-m-d H:i:s', strtotime($page->updated_at)) !!}" />
@endsection

@section('content')
   <div class="pxp-content">
      <div class="pxp-blog-posts pxp-content-wrapper mt-100">
         <div class="container">
            <h1 class="pxp-page-header">Latest Articles</h1>
            <div class="row mt-100">
               <div class="col-sm-12 col-lg-9">
                  <div class="row">
                     @foreach($blogs as $blog)
                        <div class="col-sm-12 col-md-6">
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
                  {{-- <ul class="pagination pxp-paginantion mt-3 mt-md-4">
                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">Next <span class="fa fa-angle-right"></span></a></li>
                  </ul> --}}
               </div>
               <div class="col-sm-12 col-lg-3 mt-4 mt-md-5 mt-lg-0">
                  <div class="pxp-blog-posts-side-section">
                     <h3>Search Articles</h3>
                     <div class="mt-3 mt-md-4">
                        <div class="form-group">
                           <input type="text" class="form-control pxp-is-address" placeholder="Search">
                           <span class="fa fa-search"></span>
                        </div>
                     </div>
                  </div>

                  {{-- <div class="pxp-blog-posts-side-section mt-4 mt-md-5">
                     <h3>Categories</h3>
                     <ul class="pxp-blog-posts-side-v-list list-unstyled mt-3 mt-md-4">
                        <li><a href="#">Fashion (3)</a></li>
                        <li><a href="#">Lifestyle (2)</a></li>
                        <li><a href="#">Personal (2)</a></li>
                        <li><a href="#">Stories (2)</a></li>
                        <li><a href="#">Travel (4)</a></li>
                     </ul>
                  </div> --}}

                  {{-- <div class="pxp-blog-posts-side-section mt-4 mt-md-5">
                     <h3>Tags</h3>
                     <div class="pxp-blog-posts-side-tags mt-3 mt-md-4">
                           <a href="#">Premium (10)</a>
                           <a href="#">Interior (12)</a>
                           <a href="#">Stories (6)</a>
                           <a href="#">Fashion (2)</a>
                           <a href="#">Architecture (8)</a>
                           <a href="#">Lifestyle (5)</a>
                           <a href="#">Travel (10)</a>
                           <a href="#">Personal (11)</a>
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="pxp-full pxp-cover pt-100 pb-100 mt-100" style="background-image: url({!! asset('assets/images/newsletter-1-fig.jpg') !!});">
      <div class="container">
         <h2 class="pxp-section-h2">Stay Up to Date</h2>
         <p class="pxp-text-light">Subscribe to our newsletter to receive our weekly feed</p>
         <div class="row mt-4 mt-md-5">
            <div class="col-xs-12 col-sm-6">
               <form action="http://pixelprime.co/themes/Rochman Properties./light/blog.html" class="pxp-newsletter-1-form">
                  <input type="text" class="form-control" placeholder="Enter your email...">
                  <a href="#" class="pxp-primary-cta text-uppercase pxp-animate mt-3 mt-md-4">Subscribe</a>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
