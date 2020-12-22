<link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/css/fontawesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <script src="{{ asset('public/js/popper.min.js') }}" defer></script>
  <script src="{{ asset('public/js/bootstrap.min.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<div class="container">
  <div class="row justify-content-center">
<!--      <img src="https://www.agu.edu.vn/themes/custom/versh/logo_vi.png">
 -->    <div class="col-md-6">

      <div class="card">
        <div class="card-header text-center"><h3>{{ __('Đăng Nhập') }}</h3></div>

        <div class="card-body">
          <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email">{{ __('Tài khoản') }}</label>
              <input type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email address or Username" required />
              @if ($errors->has('email') || $errors->has('username'))
                <span class="invalid-feedback" role="alert"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></span>
              @endif
            </div>
            <div class="form-group">
              <label for="password">{{ __('Mật khẩu') }}</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
              @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                <label class="custom-control-label" for="remember">{{ __('Remember me') }}</label>
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> {{ __('Login') }}</button>
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
