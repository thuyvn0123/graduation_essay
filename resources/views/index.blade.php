@extends('layouts.user')

@section('title','Home')

@section('load')
<div class="lds-ellipsis" id="overlay"><div></div><div></div><div></div><div></div></div>
        <style type="text/css">
        #overlay{
            width:100%;
            height:100%;
            position: fixed;
            top: 40%;
            left: 48%;
            z-index: -88;
            background: none;
            opacity:1;

        }
        .lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #303541;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

        </style>

<script type="text/javascript">

    $(document).ready(function(){

        $('#load-content').fadeIn(1000);
        $('#overlay').fadeOut();
    });

    </script>
@endsection


@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 h-50" src="./img/slider/1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-50" src="./img/slider/2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-50" src="./img/slider/3.png" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-50" src="./img/slider/4.png" alt="">
        </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="featured-projects">
        <h5>D??? ??N N???I B???T</h5>
        <div class="row">
            @foreach ($pr as $pr )

            <div class="col-md-4">
                <a href="">
                    <div class="featured-projects-items">
                        <img src="/storage/project/{{ $pr->pr_thumbnail }}" alt="" class="thumbnail">
                        <div class="featured-projects-title">
                            <p>{{$pr->pr_title}}</p>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach



        </div>
    </div>

    <div class="about-us">
        <div class="row">
            <div class="col-lg-6 about-us-content">
                <h1>GI???I THI???U</h1>
                <p>ZenDesign l?? m???t trong nh???ng c??ng ty h??ng ?????u v??? thi???t k??? v?? thi c??ng n???i th???t.
                    B???ng t??m huy???t, b???ng kinh nghi???m, s??? nhi???t t??nh v?? s??ng t???o, ?????i ng?? ZenDesign
                    t??? tin mang ?????n cho kh??ch h??ng nh???ng phong c??ch n???i th???t th???m m???, n??ng t???m gi??
                    tr??? cho c??n nh?? b???n. ?????n v???i ch??ng t??i, b???n ch???c ch???n s??? h??i l??ng v??? kh??ng gian s???ng c???a m??nh.
                </p>
                <a href="/about"><button class="btn btn-foreign"
                        style="width:9rem;margin-top:1rem;">T??m Hi???u Th??m</button></a>
            </div>
            <div class="col-lg-6 about-us-video">
                <iframe width="1000" height="300" src="https://www.youtube.com/embed/H7ArfNmN_DE?autoplay=1">
                </iframe>
            </div>
        </div>
    </div>


    <div class="featured-products">
        <h5>S???N PH???M N???I B???T</h5>
        <div class="d-flex owl-control justify-content-end">
            <div class="owl-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="owl-next"><i class="fas fa-chevron-right"></i></div>
        </div>
        <div class="featured-products-container">
            <div class="row owl-carousel owl-one">
                @foreach ($p as $p )

                <a href="{{URL::to('products/detail/'.$p->p_id) }}">
                    <div class="featured-products-items">
                        <img src="/storage/product/{{ $p->p_img }}" alt="" class="thumbnail">

                        <div class="featured-products-title">
                            <p>{{$p->p_name}}</p>
                        </div>
                        <div class="featured-products-title">
                           <b><p>{{ number_format($p->p_price,0,',','.') }}<span>??</span></p></b>
                        </div>
                    </div>
                </a>
                @endforeach


            </div>

        </div>
        <a href=""><button class="btn btn-primary mx-auto"
                style="width:12rem;margin-top:2rem;">Xem Th??m</button></a>
    </div>



    <div class="services">
        <h4>D???CH V???</h4>
        <div class="row">
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-store-alt"></i>
                    <h5 class="offer-title">Trang tr?? n???i th???t</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-pencil-ruler"></i>
                    <h5 class="offer-title">Thi???t k??? n???i th???t</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-tools"></i>
                    <h5 class="offer-title">L???p ?????t n???i th???t</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>



        </div>
        <a href=""><button class="btn btn-foreign mx-auto"
                style="width:12rem;margin-top:1rem;">Xem Chi Ti???t</button></a>

    </div>

    <div class="why-us">
        <div class="row">
            <div class="col-lg-6 why-us-content">
                <h1>L?? DO CH???N CH??NG T??I</h1>
                <p>ZenDesign t??? h??o l?? ????n v??? thi???t k??? v?? thi c??ng ki???n tr??c n???i th???t uy t??n h??ng ?????u t???i Vi???t Nam.
                    ZenDesign kh???i ngu???n t??? nh???ng ki???n tr??c s?? t??m huy???t, sau 5 n??m ??i v??o x??y d???ng v?? ph??t tri???n,
                    ZenDesign ???? tr??? th??nh m???t ????n v??? ????ng tin c???y trong vi???c t?? v???n ??? thi???t k??? ??? thi c??ng ki???n tr??c
                    n???i th???t t???i Vi???t Nam.
                    <br>


                </p>
            </div>
            <div class="col-lg-6 why-us-detail">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-building"></i>
                        <h5>Nh?? ph??n ph???i ?????c quy???n cho BLLA</h5>
                        <p>ch???t l?????ng v?? d???ch v??? ch??a t???ng c?? </p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-clipboard-check"></i>
                        <h5>Ch???t l?????ng d???ch v??? t???t</h5>
                        <p>Ch???t l?????ng d???ch v??? h??ng ?????u Vi???t Nam</p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-comment-dots"></i>
                        <h5>????A NHU C???U C???A B???N V??O TRUNG T??M HO???T ?????NG C???A CH??NG T??I </h5>
                        <p>trong vi???c t??y ch???nh c??c gi???i ph??p n???i th???t </p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-business-time"></i>
                        <h5>5 n??m kinh nghi???m</h5>
                        <p>trong l??nh v???c thi???t k??? n???i th???t</p>

                    </div>
                </div>

            </div>
        </div>
    </div>


<div class="testimonials">
    <h5>????NH GI?? T??? KH??CH H??NG</h5>

    <div class="testimonials-container  d-flex align-items-center justify-content-center">

        <div class="owl-two-prev "><i class="far fa-caret-square-left"
            style="font-size:2rem;color:rgba(43, 47, 49, 0.3);cursor:pointer"></i>
        </div>

        <div class="row owl-carousel owl-two ">
            @foreach ($tt as $tt )
            <div class="testimonials-items">
                <i class="fas fa-quote-left quote-icon"></i>
                <div class="circle">
                    <img src="/storage/testimonial/{{ $tt->tt_avt }}" class="avt" alt="">

                </div>
                <div class="comment">
                    <p>{{$tt->tt_comment}}</p>
                </div>

                <div class="tt_name">
                    <h5>{{$tt->tt_name}}</h5>

                </div>
            </div>
            @endforeach




        </div>



            <div class="owl-two-next "><i class="far fa-caret-square-right"
                style="font-size:2rem;color:rgba(43, 47, 49, 0.3);cursor:pointer"></i>
            </div>




    </div>
</div>

<div class="get-quote">
    <h4>LI??N H??? CH??NG T??I ????? NH???N ???????C T?? V???N H??? TR???</h4>
    <p> M???t qu?? tr??nh d??i c???a s??? t??m t??i v?? ?????y c???m h???ng, ZenDesign ???? thi???t k??? v?? s???n xu???t
         ra nh???ng s???n ph???m n???i th???t h???p th???i v?? ?????c ????o, k???t h???p v???i qu?? tr??nh ch???n l???c k??? l?????ng
          nh???ng m??n ????? trang tr?? ????? t???o n??n kh??ng gian s???ng h??i h??a, Tinh T??? v?? sang tr???ng.
           N???i th???t ZenDesign ch??nh l?? s??? l???a ch???n c???a nh???ng ng?????i Tinh T???.
    </p>
    <a href=""><button class="btn btn-primary mx-auto">Li??n H???</button></a>
</div>




    <script>
        $(document).ready(function() {
            $(".owl-one").owlCarousel({
                loop: false,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: false,
                dots: false,
                responsive:{
                    0:{
                        items:1,
                    },
                    680:{
                        items:1,
                    },
                    840:{
                        items:2,
                    },
                    1000:{
                        items:3,
                    },
                    1300:{
                        items:4,
                    }
                }
            });
            $('.owl-prev').click(function() {
                $('.owl-one').trigger('prev.owl.carousel');
            })
            $('.owl-next').click(function() {
                $('.owl-one').trigger('next.owl.carousel');
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".owl-two").owlCarousel({
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayTimeout: 6000,
                nav: false,
                dots: false,
                responsive:{
                    0:{
                        items:1,
                    },
                    680:{
                        items:1,
                    },
                    1000:{
                        items:2,
                    },
                    1300:{
                        items:3,
                    }
                }
            });
            $('.owl-two-prev').click(function() {
                $('.owl-two').trigger('prev.owl.carousel');
            })
            $('.owl-two-next').click(function() {
                $('.owl-two').trigger('next.owl.carousel');
            })

        });
    </script>


@endsection
