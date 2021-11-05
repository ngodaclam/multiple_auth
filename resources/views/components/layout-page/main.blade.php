<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/auston/multi-page/about4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 02:29:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Jiian.com.vn')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/animate.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/jquery-ui.min.css')}}">
    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('layout/pages/lib/custom-slider/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('layout/pages/lib/custom-slider/css/preview.css')}}" type="text/css" media="screen" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/meanmenu.min.css')}}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{asset('layout/pages/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/pages/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/font-awesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/flaticon.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('layout/pages/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('layout/pages/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('layout/pages/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">

    @yield('links')
</head>

<body class="home-2">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!--  Header Area Start Here -->
@include('components.layout-page.header')
<!--  Header Area End Here -->
<!-- Header Banner Area section Start Here -->
@yield('banner-area')
<!-- Header Banner Area section End Here -->
<!-- About Page4 Inner Section Start Here -->
@yield('content')
@include('components.layout-page.footer')
<!-- Footer End Here -->
<!-- all js here -->
<!-- jquery latest version -->
@include('components.layout-page.script')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
@yield('page-script')

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
</body>


<!-- Mirrored from www.radiustheme.com/demo/html/auston/multi-page/about4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 02:29:04 GMT -->
</html>
