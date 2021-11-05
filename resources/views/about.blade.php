@extends('components.layout-page.main')
@section('title','Giới thiệu')
@section('links')
    <style>
        .error{
            color: red;
            font-size: 11px;
        }
    </style>
@endsection
@section('banner-area')
    <div class="header-banner-area">
        <div class="container">
            <div class="row">
                <div class="header-banner">
                    <h1>Giới Thiệu</h1>
                    <ul>
                        <li><a href="{{url('/')}}">Trang chủ</a></li>
                        <li>/ Giới thiệu </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="about-us4-area">
        <div class="about-us3-first-part">
            <div class="container" style="padding: 0px 0px ">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="about-us-content">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="media-heading">Giới thiệu</h3>
                                    <p style="text-align: justify">
                                        Thế kỉ số với làn sóng công nghệ phát triển toàn diện trong mọi lĩnh vực. Làn sóng đó đã tạo ra những điều mới lạ đều nhằm mục đích bảo vệ và nâng cao chất lượng cuộc sống. Đồng hành với nó, nhiều doanh nghiệp, tổ chức, các cá nhân, các nhà nghiên cứu đã không ngừng nghiên cứu phát triển.
                                        Cùng với đó, các nền tảng bán hàng cũng được phát triển. Trong đó phải nói tới JIIAN là nền tảng do Công ty TNHH Beetsoft thành lập năm 10/2021. Triển khai các sản phẩm bảo hiểm trên nền tảng nhằm giới thiệu tới người dùng một cách nhanh chóng, tiện lợi và đảm bảo uy tín, an toàn.
                                        Với sự kết hợp giữa hai công ty với nhiều năm kinh nghiệm trong lĩnh vực bảo hiểm và công nghệ thông tin:
                                        Công ty TNHH Beetsoft thành lập 04/2014. Ngoài trụ sở chính tại Hà Nội, Công ty còn có văn phòng đại diện tại Tokyo, Nhật Bản. - “ Faster and better – nhanh hơn và tốt hơn” – Với đội ngũ nhân viên chất lượng cao (60% nhân viên có khả năng đáp ứng tiếng Nhật và kinh nghiệm làm việc với người Nhật phong phú) trẻ trung, năng động và tràn đầy nhiệt huyết, chúng tôi tin rằng Beetsoft luôn sẵn sàng vượt qua mọi thách thức để không ngừng vươn xa. Công ty ưu tiên đẩy mạnh công tác đào tạo, đưa nhân lực chất lượng cao làm việc trực tiếp tại Nhật. Các sản phẩm dịch vụ chính: - Phát triển app nghiệp vụ, app mobile, web... - Tư vấn IT - Triển khai các dịch vụ của bản thân: Video call nội bộ (call work), dịch vụ về robot, AI (như các dịch vụ đang triển khai với robot Pepper)
                                        Tổng công ty Cổ phần Bảo hiểm Bưu điện (PTI) được thành lập ngày 01/08/1998. Hiện nay 3 cổ đông chính là Công ty Bảo hiểm DB - Hàn Quốc (chiếm 37,32%), Tổng Công ty Bưu điện Việt Nam (chiếm 22,67%) và công ty cp Chứng khoán Vndirect (chiếm 16,44%)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="rc-carousel about-us-slider" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false">
                            <img src="{{asset('layout/pages/img/about/11.jpg')}}" alt="video">
                            <img src="{{asset('layout/pages/img/about/12.jpg')}}" alt="video">
                            <img src="{{asset('layout/pages/img/about/13.jpg')}}" alt="video">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us4-second-part-area">
            <div class="container" style="padding: 0px 0px">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-about-us4">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <h3>Our Vision</h3>
                            <p>Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy when an unknown printer took a galley of type and scrao make.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-about-us4">
                            <i class="fas fa-paper-plane"></i>
                            <h3>Our Mision</h3>
                            <p>Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy when an unknown printer took a galley of type and scrao make.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-about-us4">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            <h3>Awards</h3>
                            <p>Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy when an unknown printer took a galley of type and scrao make.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Page4 Inner Section End Here -->

@endsection
@section('page-script')

@endsection
