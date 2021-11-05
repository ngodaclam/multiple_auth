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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection

@section('content')
    <form class="add-new-record modal-content pt-0" id="orderForm" action="{{route('orders.update',$editOrder->id)}}"
          method="POST">
        @csrf
        {{ method_field("PUT") }}
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Mã người dùng</label>
                <input
                    type="number"
                    class="form-control dt-full-name"
                    id="user_id"
                    name="user_id"
                    value="{{$editOrder->user_id}}"
                    placeholder="Mã người dùng"
                    aria-label="John Doe"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Mã CTV</label>
                <input
                    type="number"
                    class="form-control dt-full-name"
                    id="partner_id"
                    name="partner_id"
                    value="{{$editOrder->partner_id}}"
                    placeholder="Mã CTV"
                    aria-label="John Doe"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Mã sản phẩm</label>
                <input
                    type="number"
                    class="form-control dt-full-name"
                    id="item_id"
                    name="item_id"
                    value="{{$editOrder->item_id}}"
                    placeholder="Mã sản phẩm"
                    aria-label="John Doe"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Số lượng</label>
                <input
                    type="number"
                    id="amount"
                    name="amount"
                    class="form-control dt-post"
                    value="{{$editOrder->amount}}"
                    placeholder="Số lượng"
                    aria-label="Web Developer"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Mã giao dịch</label>
                <input
                    type="text"
                    id="invoice_no"
                    name="invoice_no"
                    class="form-control dt-post"
                    value="{{$editOrder->invoice_no}}"
                    placeholder="Mã giao dịch"
                    aria-label="Web Developer"
                />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Status</label>
                <select class="js-example-basic-single" name="status" id="status">
                    @foreach($arrStatus as $key=>$Stt)
                        @if($Stt['value']==$editOrder->status)
                            <option value="{{$Stt['value']}}" selected="true">{{$Stt['name']}}</option>
                        @else
                            <option value="{{$Stt['value']}}">{{$Stt['name']}}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-post">Pti Status</label>
                <select class="js-example-basic-single" name="pti_status" id="pti_status">
                    @foreach($arrPtiStatus as $key=>$pti)
                        @if($pti['value']==$editOrder->pti_status)
                            <option value="{{$pti['value']}}" selected="true">{{$pti['name']}}</option>
                        @else
                            <option value="{{$pti['value']}}">{{$pti['name']}}</option>
                        @endif
                    @endforeach

                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-date">Mã coupon</label>
                <input
                    type="text"
                    id="coupon_code"
                    name="coupon_code"
                    class="form-control dt-salary"
                    value="{{$editOrder->coupon_code}}"
                    placeholder="Vui lòng nhập CMTND/CCCD"
                    aria-label="$12000"
                />
            </div>
            <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
@section('page-script')
    <script src="{{asset('vendors/js/orders/validate.js')}}"></script>
@endsection
