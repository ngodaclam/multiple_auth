<!DOCTYPE html>
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <title>@yield('title','JIIAN')</title>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    @yield('links')

</head>
<body id="top">
<!-- Top Background Image Wrapper -->
@include('components.layout.header')
<!-- End Top Background Image Wrapper -->
@if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
@yield('content')

<div class="bgded overlay row4">
    <footer id="footer" class="hoc clear">
        <div class="center btmspace-50">
            <h6 class="heading">KẾT NỐI</h6>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
            <p class="nospace">Đồng hành cùng VN Badminton trên mạng xã hội</p>
        </div>
        <hr class="btmspace-50">
        <div class="one_quarter first">
            <h6 class="heading">ĐĂNG KÝ TƯ VẤN TẠI ĐÂY</h6>
            <p class="nospace btmspace-15">Đăng ký email để nhận được tư vấn miễn phí về các sản phẩm mới của chúng tôi.</p>
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
                        <p class="nospace btmspace-10">Cầu Giấy, Hà Nội, Việt
                            Nam</p>
                    </article>
                </li>
                <li>
                    <article>
                        <p class="nospace btmspace-10">Hotline : 0123456789</p>
                        <p>Email : vn@badminton.com.vn</p>
                    </article>
                </li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">BADMINTON VIỆT NAM</h6>
            <ul class="nospace linklist">
                <li><a href="{{route('about')}}">Về chúng tôi</a></li>
{{--                <li><a href="#">Sản phẩm bảo hiểm</a></li>--}}
{{--                <li><a href="{{route('knowledge')}}">Kiến thức bảo hiểm</a></li>--}}
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

</div>
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

<div class="wrapper row5">
    @include('components.layout.footer2')
</div>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPT -->
<script src="{{asset('layout/scripts/jquery.min.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.mobilemenu.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('vendors/js/popper/popper.min.js')}}"></script>
<script src="{{asset('vendors/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Custom JS Script -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<!-- Validate -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**
         * Validate
         */
        $('#register_subscriber').validate({
            rules: {
                tel: {
                    require_from_group: [1, ".subscriber"],
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                email: {
                    require_from_group: [1, ".subscriber"],
                    email: true,
                    regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                }
            },
            messages: {
                email: {
                    require_from_group: "Yêu cầu số điện thoại hoặc email",
                    email: "Vui Lòng Nhập Đúng Định Dạng Email",
                    regex: "Vui Lòng Nhập Đúng Định Dạng Email"
                },
                tel: {
                    require_from_group: "Yêu cầu số điện thoại hoặc email ",
                    number: "Yêu Cầu Nhập Số Điện Thoại",
                    minlength: "Số Điện Thoại Phải Đủ 10 Số ",
                    maxlength: "Số Điện Thoại Phải Đủ 10 Số",
                }
            },
            submitHandler: function (form) {
                $('.saveBtn').attr('disabled', true).css('cursor', 'not-allowed');
                $.ajax({
                    type: "POST",
                    url: "register-subscriber",
                    data: {
                        tel: 'tel',
                        email: 'email',
                    },
                    success: function (response) {
                        if (response.status) {
                            $('#success').modal('show');
                        }
                    }
                });
            }
        });
        $.validator.addMethod(
            "regex",
            /* The function that tests a given string against a given regEx. */
            function (value, element, regexp) {
                /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/

                if (regexp && regexp.constructor !== RegExp) {
                    /* Create a new regular expression using the regex argument. */
                    regexp = new RegExp(regexp);
                }

                /* Check whether the argument is global and, if so set its last index to 0. */
                else if (regexp.global) regexp.lastIndex = 0;

                /* Return whether the element is optional or the result of the validation. */
                return this.optional(element) || regexp.test(value);
            });

        jQuery.validator.addMethod("require_from_group", function (value, element, options) {
            const numberRequired = options[0];
            const selector = options[1];
            const fields = $(selector, element.form);
            const filled_fields = fields.filter(function () {
                return $(this).val() != "";
            });
            const empty_fields = fields.not(filled_fields);
            if (filled_fields.length < numberRequired && empty_fields[0] == element) {
                return false;
            }
            return true;

        });

    })
</script>
@yield('scripts')
</body>
</html>
