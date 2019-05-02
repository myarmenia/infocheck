@if (count($errors) > 0)
  <!-- Список ошибок формы -->
  <div class="alert alert-danger">
    <h4>
        <strong>Woops! Something went wrong.</strong>
    </h4>

    <ul class="list-group list-group-flush">
      @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
