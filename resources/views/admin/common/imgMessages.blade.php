@if (count($errors) > 0)
<div class="alert alert-danger">
    <h4>
        <strong> Woops! Something went wrong.</strong>
    </h4>
    <ul class="list-group list-group-flush">
        @foreach ($errors->messages() as $key => $value)
            <li class="list-group-item">{{ $key . ' --> '. $value[0] }}</li>
        @endforeach
    </ul>
</div>
@endif

@isset(session()->get( 'imgDebug' )['errors'])
<div class="alert alert-danger">
  <ul>
    @foreach (session()->get( 'imgDebug' )['errors'] as $error)
    <li>{{ $error['message'] }}</li>
    @endforeach
  </ul>
</div>
@endisset
@isset(session()->get( 'imgDebug' )['success'])
<div class="alert alert-success">
    <ul class="list-group-item">
      @foreach (session()->get( 'imgDebug' )['success'] as $success)
      <li>{{ $success['path'] }}</li>
      @endforeach
    </ul>
</div>
@endisset
