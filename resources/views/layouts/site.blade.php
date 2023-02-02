<!doctype html>
<html lang="en">
   @include('partials._head')
   <body>
      @include('partials._header')
      @yield('content')
      @if(request()->route()->getName() != 'properties.list')
      @include('partials._footer')
      @endif
      <div class="modal fade" id="pxp-signin-modal" tabindex="-1" role="dialog" aria-labelledby="pxpSigninModal" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <h5 class="modal-title" id="pxpSigninModal">Welcome back!</h5>
                     <form class="mt-4">
                           <div class="form-group">
                              <label for="pxp-signin-email">Email</label>
                              <input type="text" class="form-control" id="pxp-signin-email" placeholder="Enter your email address">
                           </div>
                           <div class="form-group">
                              <label for="pxp-signin-pass">Password</label>
                              <input type="password" class="form-control" id="pxp-signin-pass" placeholder="Enter your password">
                           </div>
                           <div class="form-group">
                              <a href="#" class="pxp-agent-contact-modal-btn">Sign In</a>
                           </div>
                           <div class="form-group mt-4 text-center pxp-modal-small">
                              <a href="#" class="pxp-modal-link">Forgot password</a>
                           </div>
                           <div class="text-center pxp-modal-small">
                              New to Rochman Properties? <a href="javascript:void(0);" class="pxp-modal-link pxp-signup-trigger">Create an account</a>
                           </div>
                     </form>
                  </div>
               </div>
         </div>
      </div>

      <!-- Back to  top Start -->
      <div class="backto-top" onclick="topFunction()" id="myBtn">
         <div>
            <i class="text-white fa fa-arrow-up"></i>
         </div>
      </div>
      <!-- Back to top end -->
      @include('partials._javascripts')
   </body>
</html>
