@extends('layouts/contentLayoutMaster')

@section('title', 'Jiian')
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
    <form class="add-new-record modal-content pt-0" id="partnerForm" method="POST" action="{{route('partners.update',$editUser->id)}}">
        @csrf
    {{ method_field("PUT") }}
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Partner</h5>
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
                    value="{{$editUser->name}}"
                    aria-label="John Doe"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Email</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    class="form-control dt-post"
                    placeholder=""
                    value="{{$editUser->email}}"
                    aria-label="Web Developer"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Mobile</label>
                <input
                    type="text"
                    id="mobile"
                    name="mobile"
                    class="form-control dt-post"
                    placeholder=""
                    value="{{$editUser->mobile}}"
                    aria-label="Web Developer"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-date">CMTND</label>
                <input
                    type="text"
                    id="cmtnd"
                    name="cmtnd"
                    class="form-control dt-salary"
                    placeholder="$12000"
                    value="{{$editUser->cmtnd}}"
                    aria-label="$12000"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-salary">Birthday</label>
                <input
                    type="text"
                    class="form-control dt-date"
                    id="birthday"
                    name="birthday"
                    placeholder="MM/DD/YYYY"
                    value="{{$editUser->birthday}}"
                    aria-label="MM/DD/YYYY"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-salary">Referral Code</label>
                <input
                    type="text"
                    id="referral_code"
                    name="referral_code"
                    class="form-control dt-salary"
                    placeholder=""
                    value="{{$editUser->referral_code}}"
                    readonly="readonly"
                    aria-label=""
                />
            </div>
            <div class="mb-4">
                <label class="form-label" for="basic-icon-default-salary">Promo Code</label>
                <input
                    type="text"
                    id="promo_code"
                    name="promo_code"
                    class="form-control dt-salary"
                    placeholder=""
                    value="{{$editUser->promo_code}}"
                    readonly="readonly"
                    aria-label=""
                />
            </div>
            <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
            <button href="/partners/list" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
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
    <script src="{{asset('js/scripts/validate-partner/validate-partner.js')}}"></script>
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
    </script>
@endsection
