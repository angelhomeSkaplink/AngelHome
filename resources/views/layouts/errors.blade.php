@if(count($errors))
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li class="text-center">{{$error}}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
