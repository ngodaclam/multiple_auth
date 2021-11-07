@extends('components.layout.layout')
@section('title','Đăng ký dành cho cộng tác viên')

@section('links')
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/css/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('vendors/css/skins/default.css')}}">
    <style>
        /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('http://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading .modal {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .modal {
            display: block;
        }
    </style>
@endsection

@section('content')
    <!-- End Google Tag Manager (noscript) -->
    <div class="page_loader"></div>

    <!-- Login 12 start -->
    <div class="login-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="login-inner-form">
                        <div class="details">
                            @if(session('user'))
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="javascript:;">XÁC MINH CỘNG TÁC VIÊN</a>
                                    </li>
                                </ul>
                                <div class="alert alert-success" role="alert">
                                    Vui lòng kiểm tra email để nhập mã xác thực tài khoản!
                                </div>
                                <form action="{{route('confirm.register')}}" method="POST"
                                      id="partner-register-confirm">
                                    @csrf
                                    <div class="form-group form-box">
                                        <input type="hidden" name="type" value="2" class="input-text type">
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="hidden" name="password" value="{{session('password')}}"
                                               class="input-text type">
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="text" name="name" value="{{old('name',session('user')->name)}}"
                                               class="input-text name"
                                               placeholder="HỌ TÊN">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="email" name="email" readonly style="cursor: not-allowed"
                                               class="input-text confirm-email"
                                               value="{{old('email',session('user')->email)}}"
                                               placeholder="EMAIL (BẮT BUỘC)">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="form-group form-box input-otp">
                                        <input type="text" name="otp" value="" class="input-text otp"
                                               placeholder="MÃ XÁC THỰC (BẮT BUỘC)">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn-md btn-theme btn-block">XÁC MINH</button>
                                    </div>
                                </form>
                            @else
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="javascript:;">ĐĂNG KÝ</a>
                                    </li>
                                </ul>
                                <p class="text-left label-detail">Bạn muốn trận đấu cầu lông phù hợp với bản thân và bạn bè</p>
                                <form action="{{route('register')}}" method="POST" id="partner-register">
                                    @csrf
                                    <div class="form-group form-box">
                                        <input type="hidden" name="type" value="2" class="input-text type">
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="text" name="name" value="{{old('name')}}" class="input-text name"
                                               placeholder="HỌ TÊN">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="email" name="email" class="input-text email"
                                               value="{{old('email')}}"
                                               placeholder="EMAIL (BẮT BUỘC)">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    @error("email")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn-md btn-theme btn-block">ĐĂNG KÝ</button>
                                    </div>
                                    <div class="modal"><!-- Place at bottom of page --></div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login 12 end -->

    <!--feedback-->
    <div class="wrapper coloured">
        <section id="testimonials" class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Cộng đồng cộng tác viên</h6>
            </div>
            <article class="one_half first"><img src="images/demo/c_voice1.png" alt="" width="">
                <blockquote>Sống ở tâm dịch TP.HCM vừa rồi tôi rất lo lắng. Được sự giới thiệu của người thân tôi đã mua
                    gói BH Vững Tâm An cho cả gia đình. Đúng như tên gọi, gia đình tôi đã có một chỗ dựa để "An Tâm,
                    Vững Bước" trong suốt quá thời gian dịch bệnh vừa qua.
                </blockquote>
                <h6 class="heading">C. Bích</h6>
                <em>Nhân viên ngân hàng tại TP.HCM</em></article>
            <article class="one_half"><img src="images/demo/c_voice2.png" alt="">
                <blockquote>Xuất thân là một lập trình viên nên tôi biết tất cả mọi mặt trong cuộc sống đều đang số hoá.
                    Sau khi mua bảo hiểm TNDS xe máy & ô tô trên nền tảng Jiian, khi ra ngoài đã không bao giờ sợ quên
                    các giấy tờ vì giờ đây đã có giấy chứng nhận Online rồi.
                </blockquote>
                <h6 class="heading">A. Trí</h6>
                <em>Lập trình viên tại Hà Nội</em></article>
            <!-- ################################################################################################ -->
        </section>
    </div>
@endsection

@section('scripts')
    <!-- External JS libraries -->
    {{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script src="{{asset('vendors/js/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendors/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Custom JS Script -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>

        $(document).ready(function () {
            const email = sessionStorage.getItem('email');
            const name = sessionStorage.getItem('name');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /**
             * Validate
             */
            $('#partner-register').validate({
                rules: {
                    email: {
                        required: true,
                        remote: {
                            url: "{{route('check.emailCtv')}}",
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            }
                        },
                        email: true,
                        regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i,
                    },
                },
                messages: {
                    email: {
                        required: "Yêu cầu bắt buộc ",
                        email: "Vui lòng nhập đúng định dạng email",
                        regex: "Vui lòng nhập đúng định dạng email",
                        remote: "Email đã tồn tại",
                    },

                },
                submitHandler: function (form) {
                    $('.btn-block').attr('disabled', true).css('cursor', 'not-allowed');
                    $("body").addClass("loading");
                    form.submit();
                }
            });

            //otp

            $('#partner-register-confirm').validate({
                rules: {
                    otp: {
                        required: true,
                        number: true,
                        remote: {
                            url: "{{route('check.otp')}}",
                            type: "post",
                            data: {
                                email: function () {
                                    return $(".confirm-email").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    otp: {
                        required: "Yêu cầu bắt buộc ",
                        number: "Yêu cầu nhập số",
                        remote: "Mã xác thực không đúng",
                    }
                },
                submitHandler: function (form) {
                    $('.btn-block').attr('disabled', true).css('cursor', 'not-allowed');
                    $("body").addClass("loading");
                    form.submit();
                }
            });
            // add method regex to validate email
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

        });
    </script>

@endsection
