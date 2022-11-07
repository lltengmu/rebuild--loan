@foreach (['danger'] as $msg)
  @if(session()->has($msg))
    <div class="flash-message">
      <p class="alert alert-{{ $msg }}">
        {{ __(session()->get($msg)) }}
      </p>

    </div>
  @endif
@endforeach
