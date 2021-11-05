@extends('components.layout-page.main')
@section('title','Tin tức')
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
                    <h1>Tin tức</h1>
                    <ul>
                        <li><a href="{{url('/')}}">Trang chủ</a></li>
                        <li>/ Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-news-page-section-area" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="news-page-content-section-area">
                        @empty($news)
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz_BytV-zZbyvWlf3e6EWzpZ0uRXlLNxt80sbKXuWM98uumJxwHUoFSSXLuPiwt-0-Jjo&usqp=CAU"
                                style="width: 250px; height: 250px">
                        @endempty
                        @isset($news)
                            @foreach($news as $n => $item)
                                <div class="row single-news-area">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="new-featured-image">
                                            <a href="{{route('detail',['id'=>$item->id])}}">
                                                <img class="media-object" src="{{$item->image}}"
                                                     alt="{{$item->title}} image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                        <div class="media-body news-body">
                                            <h3 class="media-heading"><a
                                                    href="{{route('detail',['id'=>$item->id])}}">{{$item->title}}</a>
                                            </h3>
                                            <p class="mata">{{date('d-m-Y', strtotime($item->created_at))}} /
                                                By {{$item->getUser->name}} /</p>
                                            <p class="news-content">
                                                {{ $item->short }}
                                            </p>
                                            <div class="read-more">
                                                <a href="{{route('detail',['id'=>$item->id])}}">Đọc thêm
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                    <div class="pagination-area">
                        @isset($news)
                            {{ $news->render('vendor.pagination.custom-paginate') }}
                        @endisset
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-sidebar-area">
                        <div class="single-sidebar">
                            <h3>Tìm kiếm</h3>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <form action="{{route('search.keyword.subpage')}}" id="search-keyword-subpage">
                                        @csrf
                                        <input type="text" name="keyword" @isset($keyword) value="{{$keyword}}" @endisset class=" search-query form-control"
                                               placeholder="Tìm kiếm .."/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger search-submit" type="submit">
                                                <span class=" glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar padding-top1">
                            <h3>Danh mục</h3>
                            <ul>
                                @isset($cates)
                                    @foreach($cates as $c => $item)
                                        <li><a href="{{route('news.cate',['id'=>$item->id])}}">{{$item->name}}
                                                <span>({{count($item->getNews)}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Page End Here -->
@endsection
@section('page-script')
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
            $('#search-keyword-subpage').validate({
                rules: {
                    keyword: {
                        required: true
                    }
                },
                messages: {
                    keyword: {
                        required: "Yêu cầu bắt buộc "
                    }
                },
                submitHandler: function (form) {
                    $('.search-submit').attr('disabled', true).css('cursor', 'not-allowed');
                    $("body").addClass("loading");
                    form.submit();
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
@endsection
