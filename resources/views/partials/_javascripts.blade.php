<script src="{!! asset('assets/js/jquery-3.4.1.min.js') !!}"></script>
<script src="{!! asset('assets/js/popper.min.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
{{-- <script src="{!! asset('assets/js/photoswipe.min.js') !!}"></script> --}}
{{-- <script src="{!! asset('assets/js/photoswipe-ui-default.min.js') !!}"></script> --}}
<script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>

@yield('scripts')
<script>
   //Get the button:
   mybutton = document.getElementById("myBtn");

   // When the user scrolls down 20px from the top of the document, show the button
   window.onscroll = function() {scrollFunction()};

   function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         mybutton.style.display = "block";
      } else {
         mybutton.style.display = "none";
      }
   }

   // When the user clicks on the button, scroll to the top of the document
   function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
   }
</script>
@livewireScripts

<script src="{!! asset('assets/js/main3813.js') !!}"></script>
{{-- <script src="{!! asset('assets/js/fancybox.min.js') !!}"></script> --}}
