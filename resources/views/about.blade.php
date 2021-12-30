@extends('layouts.user')

@section('title','Giới Thiệu')

@section('content')

<div class="banner"
    style="background-image:url('./img/about.jpg');background-size:100%;padding:7rem 0;">
    <h3>Giới Thiệu</h3>

</div>

<div class="about-us">
    <div class="row">
        <div class="col-lg-6 about-us-content">
            <h1>ZENDESIGN</h1>
            <p>
                Ra đời từ ý tưởng tạo nên sự khác biệt, ZenDesgin đã giữ vững
                và phát triển trở thành vị trí hàng đầu trong thị trường nội
                thất Việt Nam. Đến nay, ZenDesign đã có nhiều cửa hàng quy mô
                và chuyên nghiệp.
                <br>
                <br>Với mong muốn phát triển thương hiệu Việt bằng nội lực,
                ZenDesign đã chú trọng vào thiết kế và sản xuất nội thất trong nước.
                Danh mục sản phẩm của ZenDesign thường xuyên được đổi mới và cập nhật,
                liên tục cung cấp cho khách hàng các dòng sản phẩm theo xu hướng mới nhất.

                <br>

            </p>

        </div>
        <div class="col-lg-6 about-us-video">
            <iframe width="1000" height="300" src="https://www.youtube.com/embed/H7ArfNmN_DE?autoplay=1">
            </iframe>
        </div>
    </div>
</div>


<div class="our-team">
    <h4>OUR TEAM</h4>
    <div class="row">

        <div class="col-md-4 our-team-item">
            @foreach ($t as $t )

            <div class="thumb-box">
                <a style="cursor: pointer">
                    <img src="/storage/team/{{ $t->t_avt }}" class="avt" alt="">

                    <span class="overlay-box">
                        <span class="main-title">{{$t->t_name}}</span>
                        <span class="description">{{$t->t_info}}</span>
                    </span>
                </a>
            </div>
            @endforeach

        </div>


    </div>
</div>



<div class="why-us" style="background:#f2f2f2;">
    <div class="row">
        <div class="col-lg-6 why-us-content">
            <h1>CHẤT LƯỢNG DỊCH VỤ</h1>
            <p>Chất lượng của nguyên vật liệu, phụ kiện và quy trình sản xuất
                 đều được kiểm định và giám sát chặt chẽ bởi hệ thống quản lý
                  chất lượng ISO 9001. Sản phẩm của ZenDesign được thiết kế theo
                   định hướng công năng sử dụng, thẩm mỹ và chất lượng.

                <br>
                <br>
                Trong những năm gần đây, thương hiệu luôn hướng đến xu hướng thiết
                 kế xanh nhằm đóng góp không chỉ một không gian sống tiện nghi mà
                  còn là một môi trường sống trong lành cho người sử dụng và cộng
                   đồng. Với nhiều cống hiến như vậy, Nhà Xinh vinh dự nhiều năm
                   liền được trao tặng các danh hiệu “Hàng Việt Nam chất lượng cao”,
                   “Trusted brand” và “Top 100 nhà cung cấp hàng đầu”.
                <br>
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



<div class="get-quote">
    <h4>LIÊN HỆ CHÚNG TÔI ĐỂ NHẬN ĐƯỢC TƯ VẤN HỖ TRỢ</h4>
    <p> Một quá trình dài của sự tìm tòi và đầy cảm hứng, ZenDesign đã thiết kế và sản xuất
         ra những sản phẩm nội thất hợp thời và độc đáo, kết hợp với quá trình chọn lọc kỹ lưỡng
          những món đồ trang trí để tạo nên không gian sống hài hòa, Tinh Tế và sang trọng.
           Nội thất ZenDesign chính là sự lựa chọn của những người Tinh Tế.
    </p>
    <a href=""><button class="btn btn-primary">Liên Hệ</button></a>
</div>

@endsection
