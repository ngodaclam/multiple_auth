@extends('components.layout.layout')
@section('content')

    <div class="wrapper row2" id="products">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h3 class="heading">Nơi tìm kiếm những trận đấu đỉnh cao</h3>
                <p class="btmspace-30">Địa điểm và trình độ phù hợp</p>
            </div>
            <ul class="nospace group center">
                <li class="one_third first">
                    <article>
{{--                        <img src="images/demo/vta.jpg" class="product-item">--}}
                        <h6 class="heading">Tìm địa điểm</h6>
                        <p class="btmspace-30">Tìm thấy những địa điểm gần nhất[&hellip;]</p>
{{--                        <footer><a class="btn" href="https://pti.jiian.com.vn/gift/vung-tam-an" target="_blank">MUA--}}
{{--                                NGAY</a></footer>--}}
                    </article>
                </li>
                <li class="one_third">
                    <article>
{{--                        <img src="images/demo/bhxm.jpg" class="product-item">--}}
                        <h6 class="heading">Xác định trình độ</h6>
                        <p class="btmspace-30">Chơi với những người bạn cùng trình độ [&hellip;]</p>
{{--                        <footer><a class="btn" href="https://pti.jiian.com.vn/bike-care/register-personal"--}}
{{--                                   target="_blank">MUA NGAY</a></footer>--}}
                    </article>
                </li>
                <li class="one_third">
                    <article>
{{--                        <img src="images/demo/oto.jpg" class="product-item">--}}
                        <h6 class="heading">Tham gia giải đấu</h6>
                        <p class="btmspace-30">Tạo những giải đấu cùng nhóm bạn [&hellip;]</p>
{{--                        <footer><a class="btn disable" href="#">COOMING SOON</a></footer>--}}
                    </article>
                </li>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>

    <div class="wrapper row3">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Đồng hành với nền tảng JIIAN luôn có đội ngũ vững mạnh</h6>
            </div>
            <ul id="stats" class="nospace group">
                <li><i class="fas fa-id-badge"></i>
                    <p><a href="#">10000+</a></p>
                    <p>Người chơi</p>
                </li>
                <li><i class="fas fa-umbrella"></i>
                    <p><a href="#">2000+</a></p>
                    <p>Giải đấu</p>
                </li>
                <li><i class="fas fa-people-carry"></i>
                    <p><a href="#">1000</a></p>
                    <p>Đội nhóm</p>
                </li>
                <li><i class="fas fa-users"></i>
                    <p><a href="#">5000000+</a></p>
                    <p>Lượt xem</p>
                </li>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>

    <div class="wrapper coloured">
        <section id="testimonials" class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Phản hồi từ khách hàng</h6>
            </div>
            <article class="one_half first"><img src="images/demo/c_voice1.png" alt="" width="">
                <blockquote>Hệ thống được xây dựng rất chuyên nghiệp, đúng với các quy định trong thi đấu. Ban quản trị nhiệt tình và thường có hỗ trợ cho những đơn vị sử dụng hệ thống trong việc tổ chức giải thi đấu một cách nhanh chóng
                </blockquote>
                <h6 class="heading">C. Thảo</h6>
                <em>Nhân viên ngân hàng tại Hà Nội</em></article>
            <article class="one_half"><img src="images/demo/c_voice2.png" alt="">
                <blockquote>Quá ổn cho một phần mềm tổ chức giải đấu. Tự hào hơn khi đây là trang web của người Việt. Chúc website và page càng thành công!!!
                </blockquote>
                <h6 class="heading">A. Thân</h6>
                <em>Lập trình viên tại Hà Nội</em></article>
            <!-- ################################################################################################ -->
        </section>
    </div>

    <div class="wrapper row3">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <p class="nospace font-xs">Tổng hợp các tin tức về giải đấu và địa diểm phù hợp</p>
                <h6 class="heading">TIN TỨC</h6>
            </div>
            <ul class="nospace group latest">
                <li class="one_half first">
                    <article>
                        <div class="excerpt">
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tag"></i> <a href="#">News</a></li>
                            </ul>
                            <h6 class="heading">Chia sẻ với bạn bè</h6>
                            <p>Hãy chia sẻ những giải đấu hấp dẫn qua các mạng xã hội trên internet để thảo luận với những người cùng quan tâm.</p>
                            <footer><a
                                    href="https://moit.gov.vn/tin-tuc/hoat-dong/chinh-phu-ban-hanh-nghi-quyet-ho-tro-nguoi-lao-dong-nguoi-su-dung-lao-dong-bi-anh-huong-boi-covid-19-tu-quy-bao-hiem-tha.html"
                                    target="_blank">Đọc Tiếp</a></footer>
                        </div>
                        <time datetime="2021-09-25T08:15+00:00"><strong>25</strong> <em>SEP</em></time>
                    </article>
                </li>
{{--                <li class="one_half">--}}
{{--                    <article>--}}
{{--                        <div class="excerpt">--}}
{{--                            <ul class="nospace meta">--}}
{{--                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>--}}
{{--                                <li><i class="fas fa-tag"></i> <a href="#">News</a></li>--}}
{{--                            </ul>--}}
{{--                            <h6 class="heading">Top 10 công ty bảo hiểm uy tín năm 2021</h6>--}}
{{--                            <p>Ngày 09/7/2021, Công ty cổ phần Báo cáo Đánh giá Việt Nam (Vietnam Report) chính thức--}}
{{--                                công bố danh sách Top 10 Công ty bảo hiểm uy tín năm 2021. [&hellip;]</p>--}}
{{--                            <footer><a--}}
{{--                                    href="https://vietnamnet.vn/vn/kinh-doanh/vef/top-10-cong-ty-bao-hiem-uy-tin-nam-2021-754358.html"--}}
{{--                                    target="_blank">Đọc Tiếp</a></footer>--}}
{{--                        </div>--}}
{{--                        <time datetime="2021-07-04T08:15+00:00"><strong>09</strong> <em>Jul</em></time>--}}
{{--                    </article>--}}
{{--                </li>--}}
            </ul>
        </section>
    </div>
@endsection
