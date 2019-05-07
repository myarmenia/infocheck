@if ($message = Session::get('oneerror'))
<div class="alert alert-warning alert-block fade show">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
