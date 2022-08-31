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
          <div class="h-100 row">
            <div class="h-100 p-0 login-banner-image">
              <img src="{{ asset('traders-assets/img/loginbanner.png') }}" class="img-fluid h-100" alt="loginbanner">
            </div>
          </div>
         
        </div>
        <div class="col-md-7 col-xl-5">
          <div class="row">
            <div class="d-flex justify-content-sm-center align-items-center flex-column min-h-screen px-4 px-sm-5 pt-4 pt-sm-0 overflow-hidden">
              <form class="login-form">
                <div class="login-detail">
                  <h2>Welcome to FU Academy! 👋🏻</h2>
                  <p>Please sign-in to your account and start the trading adventure</p>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" class="form-control custom-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <!-- <div class="d-flex justify-content-between align-items-center"> -->
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <!-- <a class="forgot-pass">Forgot Password?</a> -->
                  <!-- </div> -->

                  <input type="password" class="form-control custom-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
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
  <!-- <script src="traders-assets/bootstrap/jquery/jquery.min.js') }}"></script> -->
  <!-- Bootstrap Js -->
  <script src="{{ asset('traders-assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>