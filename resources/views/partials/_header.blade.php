@if(request()->route()->getName() == 'home.page')
   <div class="pxp-header fixed-top pxp-animate">
@else
   <div class="pxp-header pxp-full fixed-top">
@endif
   <div class="container">
      <div class="row align-items-center">
         <div class="col-5 col-md-2">
            <a href="{!! url('/') !!}" class="pxp-logo text-decoration-none">
               <img src="{!! asset('assets/images/logo.png') !!}" alt="Rochman">
            </a>
         </div>
         <div class="col-2 col-md-9 text-center">
            <ul class="pxp-nav list-inline">

               <li class="list-inline-item"><a href="{!! url('/') !!}">Home</a></li>
               <li class="list-inline-item">
                  <a href="#">Properties</a>
                  <ul class="pxp-nav-sub rounded-lg">
                     @foreach(CMS::product_categories(1) as $category1)
                        <li><a href="{!! route('properties.list',$category1->url) !!}">{!! $category1->name !!}</a> </li>
                     @endforeach
                  </ul>
               </li>
               <li class="list-inline-item">
                  <a href="#">Projects</a>
                  <ul class="pxp-nav-sub rounded-lg">
                     @foreach(CMS::product_categories(2) as $category1)
                        <li><a href="{!! route('properties.list',$category1->url) !!}">{!! $category1->name !!}</a> </li>
                     @endforeach
                  </ul>
               </li>
               @if(CMS::check_menu(1) == 1)
                  @foreach(CMS::menu_main_pages(1) as $menuPages)
                     <li class="list-inline-item">
                        @if($menuPages->custom_url != "")
                           <a href="{!! $menuPages->custom_url !!}" class="">{!! $menuPages->title !!}</a>
                        @else
                           <a href="{!! route('main.page',$menuPages->url) !!}" class="">{!! $menuPages->title !!}</a>
                        @endif
                        @if(CMS::check_menu_page_children(1,$menuPages->pageID) > 0)
                           <ul class="">
                              @foreach(CMS::menu_page_children(1,$menuPages->pageID) as $child)
                                 <li>
                                    @if($child->custom_url != "")
                                       <a href="{!! $child->custom_url !!}">{!! $child->title !!}</a>
                                    @else
                                       <a href="{!! route('child.page',[$menuPages->url,$child->url]) !!}">{!! $child->title !!}</a>
                                    @endif
                                 </li>
                              @endforeach
                           </ul>
                        @endif
                     </li>
                  @endforeach
               @endif
               {{-- <li class="list-inline-item">
                  <a href="#">Home</a>
                  <ul class="pxp-nav-sub rounded-lg">
                      <li><a href="index.html">Version 1</a></li>
                      <li><a href="index-2.html">Version 2</a></li>
                      <li><a href="index-3.html">Version 3</a></li>
                      <li><a href="index-4.html">Version 4</a></li>
                      <li><a href="index-5.html">Version 5</a></li>
                      <li><a href="index-6.html">Version 6</a></li>
                  </ul>
               </li> --}}
               {{-- <li class="list-inline-item pxp-has-btns">
                  <a href="tel:2540707111777" class="btn btn-success"> +254 0707 111 777 </a>
               </li> --}}
            </ul>
         </div>
         <div class="col-5 col-md-1 text-right">
            <a href="javascript:void(0);" class="pxp-header-nav-trigger"><span class="fa fa-bars"></span></a>
            <a href="tel:2540707111777" class="pxp-header-user"><span class="fa fa-phone"></span></a>
         </div>
      </div>
   </div>
</div>
