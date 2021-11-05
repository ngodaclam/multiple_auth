@extends('layouts/contentLayoutMaster')

@section('title', 'Edit News Category')
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
    <form class="add-new-record modal-content pt-0" id="cate-edit-news" method="POST"
          action="{{route('newsCategory.update',['id'=>$CategoryNews->id])}}">
        @csrf
        <input type="hidden" value="1" name="type">
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit News Category</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <input
                    type="text"
                    class="form-control dt-full-name"
                    id="name"
                    name="name"
                    placeholder=""
                    value="{{old('name',$CategoryNews->name)}}"
                    aria-label="John Doe"
                />
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 btn-update">Update</button>
            <a href="{{route('list.cate.new')}}" class="btn btn-outline-secondary">Cancel</a>
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
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /**
             * Validate form add
             */

            $(document).ready(function () {
                $('#cate-edit-news').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Yêu cầu bắt buộc ",
                        },

                    },
                    submitHandler: function (form) {
                        $('.btn-update').attr('disabled', true).css('cursor', 'not-allowed');
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
