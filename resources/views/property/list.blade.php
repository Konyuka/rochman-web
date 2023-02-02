@extends('layouts.site')
@section('title','Properties')
@section('content')
   <div class="pxp-content pxp-full-height">
      <div class="pxp-map-side pxp-map-right pxp-half">
         <div id="results-map"></div>
         <a href="javascript:void(0);" class="pxp-list-toggle"><span class="fa fa-list"></span></a>
      </div>
      <div class="pxp-content-side pxp-content-left pxp-half">
         <div class="pxp-content-side-wrapper">
            <div class="d-flex">
               {{-- <div class="pxp-content-side-search-form">
                  <div class="row pxp-content-side-search-form-row">
                     <div class="col-5 col-sm-5 col-md-4 col-lg-3 pxp-content-side-search-form-col">
                        <select class="custom-select" id="pxp-p-search-status">
                           <option value="buy" selected="selected">Buy</option>
                           <option value="rent">Rent</option>
                        </select>
                     </div>
                     <div class="col-7 col-sm-7 col-md-8 col-lg-9 pxp-content-side-search-form-col">
                        <input type="text" class="form-control pxp-is-address" placeholder="Search by City, Neighborhood, or Address" id="pxp-p-search-address">
                        <span class="fa fa-search"></span>
                     </div>
                  </div>
               </div> --}}
               {{-- <div class="d-flex">
                  <a role="button" class="pxp-adv-toggle"><span class="fa fa-sliders"></span></a>
               </div> --}}
            </div>
            {{-- <div class="pxp-content-side-search-form-adv mb-3">
               <div class="row pxp-content-side-search-form-row">
                  <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                     <div class="form-group">
                           <label for="pxp-p-filter-price-min">Price</label>
                           <input type="text" class="form-control" placeholder="Min" id="pxp-p-filter-price-min">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                     <div class="form-group">
                           <label for="pxp-p-filter-price-max" class="d-none d-sm-inline-block">&nbsp;</label>
                           <input type="text" class="form-control" placeholder="Max" id="pxp-p-filter-price-max">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                     <div class="form-group">
                        <label for="pxp-p-filter-beds">Beds</label>
                        <select class="custom-select" id="pxp-p-filter-beds">
                           <option value="" selected="selected">Any</option>
                           <option value="">Studio</option>
                           <option value="">1</option>
                           <option value="">2</option>
                           <option value="">3</option>
                           <option value="">4</option>
                           <option value="">5+</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                     <div class="form-group">
                        <label for="pxp-p-filter-baths">Baths</label>
                        <select class="custom-select" id="pxp-p-filter-baths">
                           <option value="" selected="selected">Any</option>
                           <option value="">1+</option>
                           <option value="">1.5+</option>
                           <option value="">2+</option>
                           <option value="">3+</option>
                           <option value="">4+</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                     <div class="form-group">
                        <label for="pxp-p-filter-type">Type</label>
                        <select class="custom-select" id="pxp-p-filter-type">
                           <option value="">Select type</option>
                           <option value="">Apartment</option>
                           <option value="">House</option>
                           <option value="">Townhome</option>
                           <option value="">Multi-Family</option>
                           <option value="">Land</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                     <div class="form-group">
                           <label for="pxp-p-filter-size-min">Size (sq ft)</label>
                           <input type="text" class="form-control" id="pxp-p-filter-size-min" placeholder="Min">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                     <div class="form-group">
                           <label for="pxp-p-filter-size-max" class="d-none d-sm-inline-block">&nbsp;</label>
                           <input type="text" class="form-control" id="pxp-p-filter-size-max" placeholder="Max">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="mb-2">Amenities</label>
                  <div class="row pxp-content-side-search-form-row">
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Internet</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Garage</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Air Conditioning</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Dishwasher</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Disposal</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Balcony</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Gym</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Playroom</label>
                              </div>
                           </div>
                     </div>
                     <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                           <div class="form-group">
                              <div class="checkbox custom-checkbox">
                                 <label><input type="checkbox" value="1"><span class="fa fa-check"></span> Bar</label>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
               <a href="#" class="pxp-filter-btn">Apply Filters</a>
            </div> --}}
            <div class="row pb-4">
               <div class="col-sm-6">
                  <h2 class="pxp-content-side-h2">{!! $properties->count() !!} Results</h2>
               </div>
               {{-- <div class="col-sm-6">
                  <div class="pxp-sort-form form-inline float-right">
                     <div class="form-group">
                        <select class="custom-select" id="pxp-sort-results">
                           <option value="" selected="selected">Default Sort</option>
                           <option value="">Price (Lo-Hi)</option>
                           <option value="">Price (Hi-Lo)</option>
                           <option value="">Beds</option>
                           <option value="">Baths</option>
                           <option value="">Size</option>
                        </select>
                     </div>
                     <div class="form-group d-flex">
                        <a role="button" class="pxp-map-toggle"><span class="fa fa-map-o"></span></a>
                     </div>
                  </div>
               </div> --}}
            </div>
            <div class="row">
               @foreach($properties as $property)
                  <div class="col-sm-12 col-md-6 col-xxxl-4">
                     <a href="{!! route('properties.details',$property->url) !!}" class="pxp-results-card-1 rounded-lg" data-prop="1">
                        <div id="card-carousel-1" class="carousel slide" data-ride="carousel" data-interval="false">
                           <div class="carousel-inner">
                              @if(CMS::check_cover_image($property->id)==1)
                                 <div class="carousel-item active" style="background-image: url({!! CMS::admin() !!}media/products/{!! CMS::cover_image($property->id)->file_name !!})"></div>
                              @else
                                 <div class="carousel-item active" style="background-image: url({!! asset('assets/images/placeholder.png') !!})"></div>
                              @endif
                              {{-- <div class="carousel-item" style="background-image: url(images/properties/prop-1-2-gallery.jpg);"></div>
                              <div class="carousel-item" style="background-image: url(images/properties/prop-1-3-gallery.jpg);"></div> --}}
                           </div>
                           {{-- <span class="carousel-control-prev" data-href="#card-carousel-1" data-slide="prev">
                              <span class="fa fa-angle-left" aria-hidden="true"></span>
                           </span>
                           <span class="carousel-control-next" data-href="#card-carousel-1" data-slide="next">
                              <span class="fa fa-angle-right" aria-hidden="true"></span>
                           </span> --}}
                        </div>
                        <div class="pxp-results-card-1-gradient"></div>
                        <div class="pxp-results-card-1-details">
                              <div class="pxp-results-card-1-details-title">{!! $property->product_name !!}</div>
                              <div class="pxp-results-card-1-details-price">ksh {!! number_format($property->price) !!}</div>
                        </div>
                        <div class="pxp-results-card-1-features">
                              <span>{!! $property->bedrooms !!} BD <span>|</span> {!! $property->bathroom !!} BA <span>|</span> {!! $property->size !!} SF</span>
                        </div>
                        <div class="pxp-results-card-1-save"><span class="fa fa-star-o"></span></div>
                     </a>
                  </div>
               @endforeach
            </div>

            {{-- <ul class="pagination pxp-paginantion mt-2 mt-md-4">
               <li class="page-item active"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item"><a class="page-link" href="#">Next <span class="fa fa-angle-right"></span></a></li>
            </ul> --}}
         </div>
         <div class="pxp-footer pxp-content-side-wrapper">
            <div class="pxp-footer-bottom">
               <div class="pxp-footer-copyright">&copy; Rochman Properties. All Rights Reserved. 2021</div>
            </div>
         </div>
      </div>
   </div>
@endsection
@section('scripts')
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUrMDJXH_pjp46t-D6un_fRFeULSYeNAk&amp;libraries=places"></script>
   <script src="{!! asset('assets/js/markerclusterer.js') !!}"></script>
   <script src="{!! asset('assets/js/main.js') !!}"></script>
   <script src="{!! asset('assets/js/map.js') !!}"></script>
   <script>
      (function($) {
         "use strict";

         var map;
         var markers = [];
         var markerCluster;
         var styles;
         var propertiesList;
         var options = {
            zoom : 10,
            mapTypeId : 'Styled',
            panControl: false,
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            scrollwheel: false,
            zoomControlOptions: {
               position: google.maps.ControlPosition.RIGHT_BOTTOM,
            },
            fullscreenControl: false,
         };

         styles = [{"featureType": "water","elementType": "geometry","stylers": [{"color": "#e9e9e9"},{"lightness": 17}]},{"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 16}]},{"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},{"elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},{"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]}];

         propertiesList = {!! json_encode($mapData) !!}

         function CustomMarker(id, latlng, map, classname, html) {
            this.id        = id;
            this.latlng_   = latlng;
            this.classname = classname;
            this.html      = html;

            this.setMap(map);
         }

         CustomMarker.prototype = new google.maps.OverlayView();

         CustomMarker.prototype.draw = function() {
            var me = this;
            var div = this.div_;

            if (!div) {
               div = this.div_ = document.createElement('div');
               div.classList.add(this.classname);
               div.innerHTML = this.html;

               google.maps.event.addDomListener(div, 'click', function(event) {
                     google.maps.event.trigger(me, 'click');
               });

               var panes = this.getPanes();
               panes.overlayImage.appendChild(div);
            }

            var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);

            if (point) {
               div.style.left = point.x + 'px';
               div.style.top = point.y + 'px';
            }
         };

         CustomMarker.prototype.remove = function() {
            if (this.div_) {
               this.div_.parentNode.removeChild(this.div_);
               this.div_ = null;
            }
         };

         CustomMarker.prototype.getPosition = function() {
            return this.latlng_;
         };

         CustomMarker.prototype.addActive = function() {
            if (this.div_) {
               $('.pxp-price-marker').removeClass('active');
               this.div_.classList.add('active');
            }
         };

         CustomMarker.prototype.removeActive = function() {
            if (this.div_) {
               this.div_.classList.remove('active');
            }
         };

         function addMarkers(props, map) {
            $.each(props, function(i, prop) {
               var latlng = new google.maps.LatLng(prop.position.lat, prop.position.lng);

               var html = '<div class="pxp-marker-short-price">' + prop.price.short + '</div>' +
                           '<a href="' + prop.link + '" class="pxp-marker-details">' +
                                 '<div class="pxp-marker-details-fig pxp-cover" style="background-image: url(' + prop.photo + ');"></div>' +
                                 '<div class="pxp-marker-details-info">' +
                                    '<div class="pxp-marker-details-info-title">' + prop.title + '</div>' +
                                    '<div class="pxp-marker-details-info-price">' + prop.price.long + '</div>' +
                                    '<div class="pxp-marker-details-info-feat">' + prop.features.beds + ' BD<span>|</span>' + prop.features.baths + ' BA<span>|</span>' + prop.features.size + '</div>' +
                                 '</div>' +
                           '</a>';

               var marker = new CustomMarker(prop.id, latlng, map, 'pxp-price-marker', html);

               marker.id = prop.id;
               markers.push(marker);
            });
         }

         setTimeout(function() {
            if($('#results-map').length > 0) {
               map = new google.maps.Map(document.getElementById('results-map'), options);
               var styledMapType = new google.maps.StyledMapType(styles, {
                     name : 'Styled',
               });

               map.mapTypes.set('Styled', styledMapType);
               map.setCenter(new google.maps.LatLng(37.7577627,-122.4726194));
               map.setZoom(15);

               addMarkers(propertiesList, map);

               map.fitBounds(markers.reduce(function(bounds, marker) {
                     return bounds.extend(marker.getPosition());
               }, new google.maps.LatLngBounds()));

               markerCluster = new MarkerClusterer(map, markers, {
                     maxZoom: 18,
                     gridSize: 60,
                     styles: [
                        {
                           width: 40,
                           height: 40,
                        },
                        {
                           width: 60,
                           height: 60,
                        },
                        {
                           width: 80,
                           height: 80,
                        },
                     ]
               });

               google.maps.event.trigger(map, 'resize');

               $('.pxp-results-card-1').each(function(i) {
                     var propID = $(this).attr('data-prop');

                     $(this).on('mouseenter', function() {
                        if (map) {
                           var targetMarker = $.grep(markers, function(e) {
                                 return e.id == propID;
                           });

                           if(targetMarker.length > 0) {
                                 targetMarker[0].addActive();
                                 map.setCenter(targetMarker[0].latlng_);
                           }
                        }
                     });
                     $(this).on('mouseleave', function() {
                        var targetMarker = $.grep(markers, function(e) {
                           return e.id == propID;
                        });

                        if(targetMarker.length > 0) {
                           targetMarker[0].removeActive();
                        }
                     });
               });
            }
         }, 300);
      })(jQuery);
   </script>
@endsection
