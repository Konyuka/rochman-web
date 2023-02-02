@if(Session::has('success'))
	<div class="alert alert-success no-border">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		{{ Session::get('success') }}
   </div>
@endif

@if(Session::has('error'))
	<div class="alert alert-danger no-border">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		{{ Session::get('error') }}
   </div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-warning no-border">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		{{ Session::get('warning') }}
   </div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger no-border">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		<span class="text-semibold">Errors!</span><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
   </div>
@endif
