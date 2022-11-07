@if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
          @if($error=="The password format is invalid.")
          	<li>The password format:
          	{!! session("pwd_error") !!}
          </li>
          @else
           <li>{{ $error }}</li>
          @endif
          @endforeach
      </ul>
  </div>
@endif