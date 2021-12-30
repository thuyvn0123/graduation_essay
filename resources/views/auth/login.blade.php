
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Zen - Login</title>
    <link rel="shortcut icon" href="./img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style -->
    <link href="./css/login.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">


  </head>
  <body>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('./img/login.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-9">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Đăng nhập <a href="/"><strong>ZenDesign</strong></a></h3>
              </div>
              @if (count($errors) > 0)

              <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
              </div>

              @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                  <label for="username" value="{{ __('Email') }}">Email</label>
                  <input type="text" class="form-control" type="email" name="email" :value="old('email')" required autofocus id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password" value="{{ __('Password') }}">Password</label>
                  <input type="password" class="form-control"  id="password" type="password" name="password" required autocomplete="current-password">
                </div>

                <div class="d-sm-flex mb-2 align-items-center">
                    <div class="block mt-1">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class=" text-gray-600 hover:text-gray-900 forgot-pass ml-auto" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <input type="submit" value="Đăng nhập" class="btn btn-block py-2 btn-primary">

                <span class="text-center my-3 d-block">hoặc</span>


                <div class="">
                <a href="{{ URL::to('auth/facebook') }}" class="btn btn-block py-2 btn-facebook">
                  <span class="icon-facebook mr-3"></span> Đăng nhập với Facebook
                </a>

                <a href="{{ URL::to('google/login') }}" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Đăng nhập với Google</a>
                <a href="/register" class="btn btn-block py-2 btn-foreign" style="font-weight:400">Đăng ký</a>

                </div>



              </form>
            </div>
          </div>

        </div>

      </div>
    </div>


  </div>




  </body>
</html>
