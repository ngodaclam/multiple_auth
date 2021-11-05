<footer class="footer-area">
    <footer id="footer" class="hoc clear">
        <div class="center btmspace-50">
            <h6 class="heading">KẾT NỐI</h6>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
            <p class="nospace">Đồng hành cùng JIIAN trên mạng xã hội</p>
        </div>
        <hr class="btmspace-50">
        <div class="one_quarter first">
            <h6 class="heading">ĐĂNG KÝ TƯ VẤN TẠI ĐÂY</h6>
            <p class="nospace btmspace-15">Đăng ký email để nhận được tư vấn miễn phí về bảo hiểm và nhận thông tin
                khuyến mãi về các sản phẩm mới của chúng tôi.</p>
            <form id="register_subscriber" name="register_subscriber">
                @csrf
                <fieldset>
                    <input class="btmspace-15 subscriber" id="tel" name="tel" type="text" placeholder="SĐT">
                    <input class="btmspace-15 subscriber" id="email" name="email" type="text" placeholder="Email">
                    <button type="submit" id="saveBtn">ĐĂNG KÝ</button>
                </fieldset>
            </form>
        </div>
        <div class="one_quarter">
            <h6 class="heading">THÔNG TIN LIÊN HỆ</h6>
            <ul class="nospace linklist">
                <li>
                    <article>
                        <p class="nospace btmspace-10">Tầng 6 MITEC TOWER, Lot E2 – Yên Hoà, Cầu Giấy, Hà Nội, Việt
                            Nam</p>
                    </article>
                </li>
                <li>
                    <article>
                        <p class="nospace btmspace-10">Hotline : 0973622017</p>
                        <p>Email : Jiian@beetsoft.com.vn</p>
                    </article>
                </li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">JIIAN VIỆT NAM</h6>
            <ul class="nospace linklist">
                <li><a href="{{route('about')}}">Về chúng tôi</a></li>
                <li><a href="#">Sản phẩm bảo hiểm</a></li>
                <li><a href="{{route('knowledge')}}">Kiến thức bảo hiểm</a></li>
                <li><a href="{{route('news')}}">Tin tức</a></li>
                <li><a href="#">Hoạt động cộng đồng</a></li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">THƯ VIỆN ẢNH</h6>
            <ul class="nospace clear latestimg">
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
                <li><a class="imgover" href="#"><img src="{{asset('images/demo/100x100.png')}}" alt=""></a></li>
            </ul>
        </div>
    </footer>
    <div id="copyright" class="hoc clear">
        <div id="copyright" class="hoc clear">

            <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">Jiian.com.vn</a></p>

        </div>
    </div>

</footer>
<div class="modal fade" id="success" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="Heading">Thông báo</h4>
            </div>
            <div class="modal-body">
                <form id="roleForm" name="roleForm" class="form-horizontal">
                    <h4>Cảm ơn bạn đã đăng kí nhận tư vấn!</h4>
                </form>

            </div>
        </div>
    </div>
</div>
