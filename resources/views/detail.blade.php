@extends('components.layout-page.main')

@section('title','Detail')

@section('links')
    <style>
        .error{
            color: red;
            font-size: 11px;
        }
    </style>
@endsection

@section('banner-area')

@endsection
@section('content')
    <!-- Main News Page start Here -->
    <div class="main-news-page-section-area" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="news-page-content-section-area">
                        <div class="single-news-area">
                            <a href="#"><img class="media-object" src="{{$news->image}}"
                                             style="width: 100%; height: 400px; object-fit: cover"
                                             alt="Generic placeholder image"></a>
                            <div class="news-body">
                                <h3 class="news-title"><a href="javascript:;">{{$news->title}}</a></h3>
                                <p class="mata">{{date('d-m-Y', strtotime($news->created_at))}} /
                                    By {{$news->getUser->name}} /</p>
                                <p class="news-content">
                                    {!! $news->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
                                                <span>({{count($item->getNews)}})</span></a></li>
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

