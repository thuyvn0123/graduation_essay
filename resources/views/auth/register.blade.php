<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Zen - Register</title>
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


  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('./img/register.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-1">
                <h3 class="text-uppercase">Đăng ký <a href="/"><strong>ZenDesign</strong></a></h3>
              </div>
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
              </div>
                @endif
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group first">
                    <label for="name" value="{{ __('Name') }}">Họ tên</label>
                    <input type="text" id="name" class="form-control"  name="name" :value="old('name')" required autofocus autocomplete="name">
                  </div>
                <div class="form-group first">
                  <label for="email" value="{{ __('Email') }}">Email</label>
                  <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                </div>
                <div class="form-group last">
                  <label for="password"  value="{{ __('Password') }}">Mật khẩu</label>
                  <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group last mb-4">
                    <label for="password_confirmation" value="{{ __('Confirm Password') }}" >Xác nhận mật khẩu</label>
                    <input id="password_confirmation" class="form-control" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>




                <input type="submit" value="Đăng ký" class="btn btn-block py-2 btn-primary mb-3">
                <div class="d-sm-flex mb-0 align-items-center">
                    <div class="block mt-1">

                    </div>
                    <a class=" text-gray-600 hover:text-gray-900 forgot-pass ml-auto" href="/login">
                        {{ __('You already have an account?') }}
                    </a>
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

