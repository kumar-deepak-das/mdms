<div class="mt-2"> 
@if($errors->any())
	<div class="alert alert-danger alert-dismissable auto-close1">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Error:</strong> {{$errors->first()}}
	</div>
@elseif(session()->has('message'))
	<div class="alert alert-success alert-dismissable auto-close1">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Success:</strong> {{ session()->get('message') }}
	</div>
@elseif(session()->has('success'))
	<div class="alert alert-success alert-dismissable auto-close1">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Success:</strong> {{ session()->get('success') }}
	</div>
@elseif(session()->has('info'))
	<div class="alert alert-info alert-dismissable auto-close1">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Information:</strong> {{ session()->get('info') }}
	</div>
@elseif(session()->has('error'))
	<div class="alert alert-danger alert-dismissable auto-close1">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Error:</strong> {{ session()->get('error') }}
	</div>
@endif
</div>

