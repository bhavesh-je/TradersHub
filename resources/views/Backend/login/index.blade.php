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
  <link rel="stylesheet" href="{{ asset('traders-assets/font-awesome/css/font-awesome.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('traders-assets/css/style.css') }}">


</head>

<body>

  <!-- login-page -->
  <section class="login-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-lg-7 p-0">
          <!-- <div class="row"> -->
            <div class="login-banner-image">
              <div class="logo-boxs">
                <img src="{{ asset('traders-assets/img/admin-logo.png') }}" class="img-fluid" alt="loginbanner">
              </div>
            </div>
          <!-- </div> -->

        </div>
        <div class="col-sm-6 col-lg-5 p-0">
          <!-- <div class="row"> -->
            <div
              class="d-flex justify-content-sm-center align-items-center min-h-screen flex-column px-4 px-sm-5 py-4 py-sm-0">
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
                  <div class="input-group ">
                    <div class="input-group-text @error('email') fu-danger @enderror"><img src="traders-assets/img/mail.png" alt="">
                    </div>
                    <input type="emaill" name="email" id="email_address" class="form-control custom-control @error('email') is-invalid @enderror" placeholder="Email">
                    @if($errors->has('email'))
                      <span class="invalid-feedback error-text" role="alert">
                        {{ $errors->first('email') }}
                      </span>
                    @endif
                  </div>
                  <!-- <input type="email" id="email_address" name="email" class="form-control custom-control @error('email') is-invalid @enderror" placeholder="Email" aria-describedby="emailHelp"> -->
                </div>
                <div class="mb-3">

                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <div class="input-group">
                    <div class="input-group-text @error('password') fu-danger @enderror"><img src="traders-assets/img/lock.png" alt="">
                    </div>
                    <input type="password" id="exampleInputPassword1" name="password" class="form-control custom-control @error('password') is-invalid @enderror" placeholder="Password">
                    @if($errors->has('password'))
                      <span class="invalid-feedback error-text" role="alert">
                        {{ $errors->first('password') }}
                      </span>
                    @endif 
                  </div>
                  <!-- <input type="password" class="form-control custom-control @error('password') is-invalid @enderror" name="password" placeholder="Password" id="exampleInputPassword1">-->
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember')
                    ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="login-butn w-100">Login</button>
              </form>
            </div>
          <!-- </div> -->

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