@if(isset($errors) && count($errors) > 0)
  <div class="alert alert-danger" role="alert" align="center">
  <ul>
     @foreach($errors as $error)
        <li>{{$error}}</li>
     @endforeach
  </ul>
  </div>
@endif

@if (isset($custom_errors) && count($custom_errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($custom_errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
