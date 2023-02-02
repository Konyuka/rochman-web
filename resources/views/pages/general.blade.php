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
@section('content')
   <div class="pxp-content">
      <div class="pxp-contact pxp-content-wrapper mt-100">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-12 mb-100">
                     <h1 class="pxp-page-header text-center">{!! $page->title !!}</h1>
               </div>
            </div>
         </div>
         <div class="container mb-100">
            {!! $page->content !!}
         </div>
      </div>
   </div>
@endsection
