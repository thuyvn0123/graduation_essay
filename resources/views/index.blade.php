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
        <h5>DỰ ÁN NỔI BẬT</h5>
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
                <h1>GIỚI THIỆU</h1>
                <p>ZenDesign là một trong những công ty hàng đầu về thiết kế và thi công nội thất.
                    Bằng tâm huyết, bằng kinh nghiệm, sự nhiệt tình và sáng tạo, đội ngũ ZenDesign
                    tự tin mang đến cho khách hàng những phong cách nội thất thẩm mỹ, nâng tầm giá
                    trị cho căn nhà bạn. Đến với chúng tôi, bạn chắc chắn sẽ hài lòng về không gian sống của mình.
                </p>
                <a href="/about"><button class="btn btn-foreign"
                        style="width:9rem;margin-top:1rem;">Tìm Hiểu Thêm</button></a>
            </div>
            <div class="col-lg-6 about-us-video">
                <iframe width="1000" height="300" src="https://www.youtube.com/embed/H7ArfNmN_DE?autoplay=1">
                </iframe>
            </div>
        </div>
    </div>


    <div class="featured-products">
        <h5>SẢN PHẨM NỔI BẬT</h5>
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
                           <b><p>{{ number_format($p->p_price,0,',','.') }}<span>đ</span></p></b>
                        </div>
                    </div>
                </a>
                @endforeach


            </div>

        </div>
        <a href=""><button class="btn btn-primary mx-auto"
                style="width:12rem;margin-top:2rem;">Xem Thêm</button></a>
    </div>



    <div class="services">
        <h4>DỊCH VỤ</h4>
        <div class="row">
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-store-alt"></i>
                    <h5 class="offer-title">Trang trí nội thất</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-pencil-ruler"></i>
                    <h5 class="offer-title">Thiết kế nội thất</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-item">
                    <i class="fas fa-tools"></i>
                    <h5 class="offer-title">Lắp đặt nội thất</h5>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                        duis enim velit mollit.
                    </p>
                </div>
            </div>



        </div>
        <a href=""><button class="btn btn-foreign mx-auto"
                style="width:12rem;margin-top:1rem;">Xem Chi Tiết</button></a>

    </div>

    <div class="why-us">
        <div class="row">
            <div class="col-lg-6 why-us-content">
                <h1>LÝ DO CHỌN CHÚNG TÔI</h1>
                <p>ZenDesign tự hào là đơn vị thiết kế và thi công kiến trúc nội thất uy tín hàng đầu tại Việt Nam.
                    ZenDesign khởi nguồn từ những kiến trúc sư tâm huyết, sau 5 năm đi vào xây dựng và phát triển,
                    ZenDesign đã trở thành một đơn vị đáng tin cậy trong việc tư vấn – thiết kế – thi công kiến trúc
                    nội thất tại Việt Nam.
                    <br>


                </p>
            </div>
            <div class="col-lg-6 why-us-detail">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-building"></i>
                        <h5>Nhà phân phối độc quyền cho BLLA</h5>
                        <p>chất lượng và dịch vụ chưa từng có </p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-clipboard-check"></i>
                        <h5>Chất lượng dịch vụ tốt</h5>
                        <p>Chất lượng dịch vụ hàng đầu Việt Nam</p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-comment-dots"></i>
                        <h5>ĐƯA NHU CẦU CỦA BẠN VÀO TRUNG TÂM HOẠT ĐỘNG CỦA CHÚNG TÔI </h5>
                        <p>trong việc tùy chỉnh các giải pháp nội thất </p>

                    </div>
                    <div class="col-md-6">
                        <i class="fas fa-business-time"></i>
                        <h5>5 năm kinh nghiệm</h5>
                        <p>trong lĩnh vực thiết kế nội thất</p>

                    </div>
                </div>

            </div>
        </div>
    </div>


<div class="testimonials">
    <h5>ĐÁNH GIÁ TỪ KHÁCH HÀNG</h5>

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
    <h4>LIÊN HỆ CHÚNG TÔI ĐỂ NHẬN ĐƯỢC TƯ VẤN HỖ TRỢ</h4>
    <p> Một quá trình dài của sự tìm tòi và đầy cảm hứng, ZenDesign đã thiết kế và sản xuất
         ra những sản phẩm nội thất hợp thời và độc đáo, kết hợp với quá trình chọn lọc kỹ lưỡng
          những món đồ trang trí để tạo nên không gian sống hài hòa, Tinh Tế và sang trọng.
           Nội thất ZenDesign chính là sự lựa chọn của những người Tinh Tế.
    </p>
    <a href=""><button class="btn btn-primary mx-auto">Liên Hệ</button></a>
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
