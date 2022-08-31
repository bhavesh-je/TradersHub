<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Traders Hub | Admin Log in</title>
  <link rel="icon" type="image/png" href="{{ asset('logo/cropped-fav-512x450.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <!-- Bootstrap Css -->
  <link rel="stylesheet" href="{{ asset('traders-assets/bootstrap/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('traders-assets/css/style.css') }}">


</head>

<body>

  <!-- login-page -->
  <section class="login-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 col-xl-7">
          <div class="row">
            <div class="p-0 login-banner-image">
              <img src="{{ asset('traders-assets/img/loginbanner.png') }}" class="img-fluid" alt="loginbanner">
            </div>
          </div>
         
        </div>
        <div class="col-md-7 col-xl-5">
          <div class="row">
            <div class="d-flex justify-content-sm-center align-items-center flex-column min-h-screen px-4 px-sm-5 pt-4 pt-sm-0 overflow-hidden">
              <form action="{{ route('login.post') }}" method="post" class="login-form">
              @csrf
                <div class="login-detail">
                  <h2>Welcome to FU Academy! 👋🏻</h2>
                  <p>Please sign-in to your account and start the trading adventure</p>
                </div>
                @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="icon fas fa-check"></i> {{ session('success') }}
                  </div>
                @endif

                @if(session('danger'))
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="icon fas fa-ban"></i> {{ session('danger') }}
                  </div>
                @endif
                <div class="mb-3">
                  <label for="email_address" class="form-label">Email</label>
                  <input type="email" id="email_address" name="email" class="form-control custom-control @error('email') is-invalid @enderror" placeholder="Email" aria-describedby="emailHelp">
                  @if($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="mb-3">
                  <!-- <div class="d-flex justify-content-between align-items-center"> -->
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <!-- <a class="forgot-pass">Forgot Password?</a> -->
                  <!-- </div> -->
                  <input type="password" class="form-control custom-control @error('password') is-invalid @enderror" name="password" placeholder="Password" id="exampleInputPassword1">
                  @if($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="login-butn w-100">Login</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- jQuery -->
  <!-- <script src="{{ asset('traders-assets/bootstrap/jquery/jquery.min.js') }}"></script> -->
  <!-- Bootstrap Js -->
  <script src="{{ asset('traders-assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>