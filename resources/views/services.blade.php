@extends('layouts.user')

@section('title','Services')

@section('content')




<div class="banner"
    style="background-image:url('./img/service.jpg');background-size:100%;padding:7rem 0;">
    <h3>Dịch vụ</h3>

</div>

<div class="service-menu ">
    <div class="row">
        <div class="service-item col-md-4 d-flex align-items-center justify-content-center " id="sroll1">
            <i class="fas fa-pencil-ruler"></i>
            <p>SẢN XUẤT & THIẾT KẾ</p>
        </div>
        <div class="service-item col-md-4 d-flex align-items-center justify-content-center" id="sroll2">
            <i class="fas fa-tools"></i>
            <p>LẮP ĐẶT</p>
        </div>
        <div class="service-item col-md-4 d-flex align-items-center justify-content-center" id="sroll3">
            <i class="fas fa-tasks"></i>
            <p>QUẢN LÝ DỰ ÁN</p>
        </div>
    </div>
</div>

<div id="srollTo1" class="py-5">
    <div class="manufacturing" >
        <h5>SẢN XUẤT & THIẾT KẾ</h5>
        <iframe width="1000" height="500" src="https://www.youtube.com/embed/H7ArfNmN_DE?autoplay=1">
        </iframe>
    </div>
</div>
<div id="srollTo2" class="py-5">

    <div class="installation">
        <div class="installation-carousel">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/i1.jpg" >
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/i2.jpg" >
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/i3.jpg" >
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/i4.jpg" >
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/i5.jpg" >
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
            <h5>LẮP ĐẶT</h5>
            <p>Cung cấp dịch vụ lắp đặt tận nơi cho tất cả các sản phẩm nội thất do chúng
                tôi cung cấp, Zen có đội ngũ chuyên gia nội thất tận tâm, đảm bảo chất lượng và dịch
                vụ chăm sóc tối đa - từ giao hàng đến lắp đặt đến chăm sóc sau lắp đặt.
            </p>

        </div>

    </div>
</div>
<div id="srollTo3" class="py-5">

    <div class="project-management">
        <h4>QUẢN LÝ DỰ ÁN</h4>
        <div class="project-management-content">
            <div class="row">
                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m5.jpg" style="height: 12rem" >

                            <span class="overlay-box">
                                <span class="main-title">Phòng khách</span>
                                <span class="description">
                                    Chúng tôi đảm bảo tất cả các sản phẩm đáp ứng thông số kỹ thuật và được lắp đặt đúng thời gian và chất lượng cao nhất có thể </span>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m2.png"  style="height: 12rem">

                            <span class="overlay-box">
                                <span class="main-title">Khu vực công cộng</span>
                                <span class="description">
                                    Cho dù không gian của bạn lớn hay nhỏ, chúng tôi đều có khả năng sản xuất riêng từng sản phẩm nội thất theo yêu cầu.
                                </span>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m3.jpg" style="height: 12rem" >

                            <span class="overlay-box">
                                <span class="main-title">Nhà hàng & Bar</span>
                                <span class="description">
                                    Khả năng của chúng tôi bao gồm chỗ ngồi rời, bàn tiệc cố định, bàn và công trình kiến trúc.                              </span>
                                </span>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m4.jpg" style="height: 12rem" >

                            <span class="overlay-box">
                                <span class="main-title">Căn hộ cao cấp</span>
                                <span class="description">
                                    Chúng tôi trang bị các tiện nghi cao cấp tốt nhất trong nước, có nhiều kinh nghiệm trong việc cung cấp nội thất tùy chỉnh để đáp ứng bất kỳ thông số kỹ thuật nào.
                                </span>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m1.jpg" style="height: 12rem">

                            <span class="overlay-box">
                                <span class="main-title">Câu lạc bộ</span>
                                <span class="description">
                                    Mục tiêu của chúng tôi là cung cấp đồ nội thất cao cấp đáp ứng nhu cầu và độ bền cho những khách hàng thân thiết nhất của chúng tôi.
                                </span>
                            </span>
                        </a>
                    </div>

                </div>

                <div class="col-md-4 our-team-item">

                    <div class="thumb-box">
                        <a style="cursor: pointer">
                            <img class="" src="./img/m6.png" style="height: 12rem">

                            <span class="overlay-box">
                                <span class="main-title">Mock Ups</span>
                                <span class="description">
                                    Chúng tôi chuyên tạo ra các phòng giả lập cho mọi dự án quy mô.
                                </span>
                            </span>
                        </a>
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>
<script>
    $("#sroll1").click(function() {
        $('html, body').animate({
            scrollTop: parseInt($("#srollTo1").offset().top)
        }, 200);
    });
    $("#sroll2").click(function() {
        $('html, body').animate({
            scrollTop: parseInt($("#srollTo2").offset().top)
        }, 200);
    });
    $("#sroll3").click(function() {
        $('html, body').animate({
            scrollTop: parseInt($("#srollTo3").offset().top)
        }, 200);
    });
</script>


@endsection
