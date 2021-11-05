@extends('layouts/contentLayoutMaster')

@section('title', 'Add News')
@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection

@section('content')
    <form class="add-new-record modal-content pt-0" id="add-news-form" method="POST"
          action="{{route('news.store')}}">
        @csrf
        <input type="hidden" value="1" name="type">
        <div class="row">
            <div class="col-md-12">
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Title</label>
                                <input
                                    type="text"
                                    class="form-control dt-full-name"
                                    id="title"
                                    name="title"
                                    placeholder="John Doe"
                                    value="{{old('title')}}"
                                    aria-label="John Doe"
                                />
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Image</label>
                                <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                       </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="select-country">CateName</label>
                                <select class="form-select select2" id="select-country" name="cate_id">
                                    @isset($categoryNews)
                                        @foreach($categoryNews as $c => $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="select-country">UserName</label>
                                <select class="form-select select2" id="select-country" name="user_id">
                                    @isset($user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Short</label>
                        <textarea name="short" class="form-control">
                            {!! old('short') !!}
                        </textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Content</label>
                        <textarea id="my-editor" name="content" class="form-control">
                            {!! old('content') !!}
                        </textarea>
                    </div>

                    <div class="mb-1 me-3">
                        <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                        <a href="{{route('list.news')}}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{asset('vendors/js/popper/popper.min.js')}}"></script>
    <!-- Custom JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

@endsection
@section('page-script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="{{asset('vendors/js/validate-partner/validate-partner.js')}}"></script>
    {{-- Page js files --}}
    <script>
        var dt_basic_table = $('.datatables-basic'),
            dt_date_table = $('.dt-date'),
            assetPath = '../../../app-assets/';
        //Flat Date picker
        if (dt_date_table.length) {
            dt_date_table.flatpickr({
                monthSelectorType: 'static',
                dateFormat: 'Y/m/d'
            });
        }
        /**
         * Button image
         */
        $('#lfm').filemanager('image');

    </script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

    <script>
        /**
         * scripts
         */

        /**
         * Validate form add
         */

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#add-news-form').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    image: {
                        required: true
                    },
                    short: {
                        required: true
                    },
                    cate_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    content: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "Yêu cầu bắt buộc ",
                    },
                    image: {
                        required: "Yêu cầu bắt buộc "
                    },
                    short: {
                        required: "Yêu cầu bắt buộc "
                    },
                    cate_id: {
                        required: "Yêu cầu bắt buộc "
                    },
                    user_id: {
                        required: "Yêu cầu bắt buộc "
                    },
                    content: {
                        required: "Yêu cầu bắt buộc "
                    }
                },
                submitHandler: function (form) {
                    $('.data-submit').attr('disabled', true).css('cursor', 'not-allowed');
                    form.submit();
                }
            });
        });
    </script>
@endsection
