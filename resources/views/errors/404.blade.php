@extends('components.layout-page.main')
@section('title','404 Not Found')
@section('links')

@section('content')
    <!-- 404 Page Area Start Here -->
    <div class="error-page-area" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="error-page">
                        <h2>404</h2>
                        <p>Rất tiếc, nội dung bạn đang tìm kiếm hiện không khả dụng</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="error-page-message">
                        <p>Vui lòng kiểm tra lại đường dẫn hoặc về trang chủ.</p>
                        <div class="home-page">
                            <a href="{{url('/')}}">Về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 Page Area End Here -->

@endsection
@section('page-script')

@endsection
