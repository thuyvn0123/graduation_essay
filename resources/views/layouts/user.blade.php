<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen - @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('./img/logo.png')}}" />
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <link href="{{asset('./css/header.css')}}" rel="stylesheet">
    <link href="{{asset('./css/footer.css')}}" rel="stylesheet">
    <link href="{{asset('./css/search.css')}}" rel="stylesheet">
    <link href="{{asset('./css/index.css')}}" rel="stylesheet">
    <link href="{{asset('./css/main.css')}}" rel="stylesheet">
    <link href="{{asset('./css/about.css')}}" rel="stylesheet">
    <link href="{{asset('./css/products.css')}}" rel="stylesheet">
    <link href="{{asset('./css/news.css')}}" rel="stylesheet">
    <link href="{{asset('./css/services.css')}}" rel="stylesheet">
    <link href="{{asset('./css/projects.css')}}" rel="stylesheet">
    <link href="{{asset('./css/contact.css')}}" rel="stylesheet">




</head>

<body>
<div id="load-content" style="{{ Request::is('/') ? 'display:none;' : '' }}">
    <nav class="navbar navbar-expand-xl navbar-light bg-white">
        <a class="navbar-brand" href="/"><img
            src="{{asset('./img/logo.png')}}" alt=""></a>

        <form role="search" action="/search" id="search-form" method="post">
            @csrf
            <div class="search-bar">
                <div class="search-box">
                    <input type="text" value="" name="search" id="s"/>
                    <span></span>
                    <input type="hidden" value=""  />
                </div>
            </div>

        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="text-align: center">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }} " data-toggle="page" aria-current="page"
                        href="/">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                        href="/about"  >GIỚI THIỆU</a>
                </li>
                <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
                    <a class="nav-link "
                        href="/products">SẢN PHẨM</a>
                </li>
                <li class="nav-item {{ Request::is('projects*') ? 'active' : '' }}">
                    <a class="nav-link "
                        href="/projects">DỰ ÁN</a>
                </li>
                <li class="nav-item {{ Request::is('services*') ? 'active' : '' }}">
                    <a class="nav-link "
                        href="/services">DỊCH VỤ</a>
                </li>
                <li class="nav-item {{ Request::is('news*') ? 'active' : '' }}">
                    <a class="nav-link "
                        href="/news">TIN TỨC</a>
                </li>
                <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}">
                    <a class="nav-link "
                        href="/contact">LIÊN HỆ</a>
                </li>
                <li class="nav-item" style="width: 3rem">

                </li>
                <li class="nav-item d-flex justify-content-center">
                    <div style="width:3rem">
                        <a  @if (Auth::check())
                        href="user/profile"
                    @else
                        href="/login"
                    @endif class="user">
                        <i class="far fa-user"></i>
                    </a>
                    </div>
                    @php
                    if (Auth::check()) {
                        $c = App\Models\Cart::where('id',Auth::user()->id)->get();
                        $count = $c->count();
                    }else{
                        $count =0;
                    }


                    @endphp
                    <div class="cart" style="width:3rem">
                        <a href="/cart" style="color:black;width:2rem; "><ion-icon name="cart-outline" style="font-size: 2.45rem"></ion-icon></a>
                        <span class='badge badge-warning' id='lblCartCount'> {{$count}} </span>
                    </div>
                </li>

            </ul>





        </div>

        <div class="live-search" >
            <div class="live-search-content row">


            </div>

        </div>


        <script type="text/javascript">
            $('#s').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('live-search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('.live-search-content').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $('#s').on('focus',function(){
                $('.live-search').fadeIn();
            });
            $('#s').on('focusout',function(){
                $('.live-search').fadeOut();
            });


        </script>

    </nav>




    <div id="back-to-top" > <i class="far fa-arrow-alt-circle-up"></i></div>





    @yield('content')

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
    <script>
        var botmanWidget = {
            aboutText: 'ZenDesign',
            introMessage: "✋ Chào bạn!!",
            title:'ZenDesign',
            mainColor: '#303541',
            bubbleBackground: '#303541',
            aboutLink: 'http://zendesign.herokuapp.com/'
        };

    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


    <footer>

        <div class="footer-main">
            <div class="row">
                <div class="col-lg-4 footer-col-1">
                    <a class="foot-brand" href=""><img src="{{asset('./img/logo.png')}}" alt=""></a>
                    <p> <b>ZenDesigns</b>  - Nâng tầm phong cách ngôi nhà của bạn.</p>
                    <hr>
                    <div class="d-flex align-items-center foot-contact" >
                        <i class="fas fa-phone-square"></i>
                        <p>0363323255</p>
                    </div>
                    <div class="d-flex align-items-center foot-contact" >
                        <i class="fas fa-envelope-square"></i>
                        <p>lzenit0123@gmail.com</p>
                    </div>
                    <div class="d-flex align-items-start foot-contact" >
                        <i class="fas fa-square"></i>
                        <p>2 Ba Tháng Hai, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam.</p>
                    </div>
                </div>

                <div class="col-lg-4 footer-col-2">
                    <h4>LIÊN KẾT</h4>
                    <a href="">Q&A</a>
                    <br>
                    <a href="">Điều khoản dịch vụ</a>
                    <br>
                    <br>
                    <p>Hãy để lại email của bạn để nhận được những ý tưởng trang trí mới và những thông tin, ưu đãi từ ZenDesigns</p>
                    <form action="">
                        <input type="text" class="form-control" placeholder="Email...">
                    </form>
                    <br>
                    <div class="foot-social d-flex align-items-center">
                        <p>Theo dõi</p>
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-youtube"></i>
                        <i class="fab fa-instagram-square"></i>
                    </div>

                </div>

                <div class="col-lg-4 footer-col-3">
                    <div class="foot-info d-flex align-items-start">
                        <img src="" alt="">
                        <div>
                            <p style="font-weight:600;">@zendesigns_info</p>
                            <p style="font-size:.6rem;">$ bài viết   $ người theo dõi</p>
                            <p><span style="font-weight:600;">Zen Designs</span> - Thiết kế hiện đại cho bạn.</p>
                        </div>

                    </div>
                    <div class="d-flex">
                        <img class="foot-img" src="" alt="">
                        <img class="foot-img" src="" alt="">
                    </div>

                </div>
            </div>
        </div>

        <div class="copy-right d-flex justify-content-around">
            <p>Copyright © 2021 Zen Design.</p>
            <p>Điều khoản dịch vụ | Q&A</p>
        </div>
    </footer>


</div>

@yield('load')







    <script>
    var btn = $('#back-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '100');
    });
    </script>




    @include('sweetalert::alert')


</body>

</html>
