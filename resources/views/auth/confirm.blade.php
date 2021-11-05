<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!--Modal: modalPush-->
<div class="modal fade show d-flex align-items-center" style="display: block" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <h4 class="heading text-success">Chúc mừng bạn đã đăng ký thành công</h4>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>
                <div class="alert alert-success" role="alert">
                    Thông tin tài khoản đã được gửi tới email
                </div>
                <h5>Thông tin tài khoản</h5>
                @if(session('user'))
                    <p>Email: <span style="color: #0c5460">{{session('user')->email}}</span></p>
                    <p>Mật khẩu: <span style="color: #0c5460">{{session('password')}}</span></p>
                    <p>Mã mua hàng: <span style="color: #0c5460">{{session('user')->promo_code}}</span></p>
                @endif
                <a href="{{route('partner.login')}}">Đăng nhập</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalPush-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
