<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
</head>
<body>
<h3>Chúc mừng, Bạn đã xác thực tài khoản thành công !</h3>
<h4>Thông tin tài khoản</h4>
    <p>Email: <span style="color: #FF0000">{{$user['user']->email}}</span></p>
    <p>Mật khẩu: <span style="color: #FF0000">{{$user['password']}}</span></p>
    <p>Mã mua hàng: <span style="color: #ff0000">{{$user['user']->promo_code}}</span></p>
<a href="{{route('partner.login')}}">Đăng nhập</a>
</body>
</html>
