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
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')
    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">List Partner</h4>
                    </div>
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="partnerForm" action="{{route('partners.store')}}" method="POST">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new Partner</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                                        <input
                                            type="text"
                                            class="form-control dt-full-name"
                                            id="name"
                                            name="name"
                                            placeholder="John Doe"
                                            aria-label="John Doe"
                                        />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Password</label>
                                        <input
                                            type="password"
                                            class="form-control dt-full-name"
                                            id="password"
                                            name="password"
                                            placeholder="*******"
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
                                            placeholder="Nhập email"
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
                                            placeholder="Nhập số điện thoại "
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
                                            placeholder="Vui lòng nhập CMTND/CCCD"
                                            aria-label="$12000"
                                        />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-salary">Birthday</label>
                                        <input
                                            type="text"
                                            class="form-control dt-date-1"
                                            id="birthday"
                                            name="birthday"
                                            placeholder="MM/DD/YYYY"
                                            aria-label="MM/DD/YYYY"
                                        />
                                    </div>
                                    <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Search Form -->
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row g-1 mb-md-1">
                                <div class="col-md-4">
                                    <label class="form-label">Name:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input dt-full-name"
                                        data-column="1"
                                        placeholder="Enter your partner name"
                                        data-column-index="0"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input"
                                        data-column="2"
                                        placeholder="Enter your email"
                                        data-column-index="1"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mobile:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input"
                                        data-column="3"
                                        placeholder="Enter your mobile"
                                        data-column-index="2"
                                    />
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-md-3">
                                    <label class="form-label">CMTND:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input"
                                        data-column="4"
                                        placeholder="Enter your CMTND"
                                        data-column-index="3"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Birthday:</label>
                                    <div class="mb-0">
                                        <input
                                            type="text"
                                            class="form-control dt-date flatpickr-range dt-input"
                                            data-column="5"
                                            placeholder="StartDate to EndDate"
                                            data-column-index="4"
                                            name="dt_date"
                                        />
                                        <input
                                            type="hidden"
                                            class="form-control dt-date start_date dt-input"
                                            data-column="5"
                                            data-column-index="4"
                                            name="value_from_start_date"
                                        />
                                        <input
                                            type="hidden"
                                            class="form-control dt-date end_date dt-input"
                                            name="value_from_end_date"
                                            data-column="5"
                                            data-column-index="4"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Referral Code:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input"
                                        data-column="6"
                                        placeholder="Enter your referal code"
                                        data-column-index="5"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Promo Code:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input"
                                        data-column="7"
                                        placeholder="Enter your promo code"
                                        data-column-index="6"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0"/>
                    <div class="card-datatable">
                        <table class="dt-advanced-search table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Cmtnd</th>
                                <th>Birthday</th>
                                <th>Referral Code</th>
                                <th>Promo Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--/ Advanced Search -->

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
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        /**
         * DataTables Advanced
         */

        'use strict';

        // Advanced Search Functions Starts
        // --------------------------------------------------------------------

        // Filter column wise function
        function filterColumn(i, val) {
            if (i == 5) {
                var startDate = $('.start_date').val(),
                    endDate = $('.end_date').val();
                if (startDate !== '' && endDate !== '') {
                    filterByDate(i, startDate, endDate); // We call our filter function
                }

                $('.dt-advanced-search').dataTable().fnDraw();
            } else {
                $('.dt-advanced-search').DataTable().column(i).search(val, false, true).draw();
            }
        }

        // Datepicker for advanced filter
        var separator = ' - ',
            rangePickr = $('.flatpickr-range'),
            dateFormat = 'MM/DD/YYYY';
        var options = {
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: dateFormat,
                separator: separator
            },
            opens: $('html').attr('data-textdirection') === 'rtl' ? 'left' : 'right'
        };

        //
        if (rangePickr.length) {
            rangePickr.flatpickr({
                mode: 'range',
                dateFormat: 'Y/m/d',
                onClose: function (selectedDates, dateStr, instance) {
                    var startDate = '',
                        endDate = new Date();
                    if (selectedDates[0] !== undefined) {
                        startDate =
                            selectedDates[0].getMonth() + 1 + '/' + selectedDates[0].getDate() + '/' + selectedDates[0].getFullYear();
                        $('.start_date').val(startDate);
                    }
                    if (selectedDates[1] !== undefined) {
                        endDate =
                            selectedDates[1].getMonth() + 1 + '/' + selectedDates[1].getDate() + '/' + selectedDates[1].getFullYear();
                        $('.end_date').val(endDate);
                    }
                    $(rangePickr).trigger('change').trigger('keyup');
                }
            });
        }
        var dt_basic_table_1 = $('.datatables-basic'),
            dt_date_table_1 = $('.dt-date-1'),
            assetPath = '../../../app-assets/';
        //Flat Date picker
        if (dt_date_table_1.length) {
            dt_date_table_1.flatpickr({
                monthSelectorType: 'static',
                dateFormat: 'Y/m/d'
            });
        }
        // Advance filter function

        // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
        const normalizeDate = function (dateString) {
            const date = new Date(dateString);
            return date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
        };
        // We pass the column location, the start date, and the end date
        var filterByDate = function (column, startDate, endDate) {
            // Custom filter syntax requires pushing the new filter to the global filter array
            $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
                var rowDate = normalizeDate(aData[column]),
                    start = normalizeDate(startDate),
                    end = normalizeDate(endDate);

                // If our date from the row is between the start and end
                if (start <= rowDate && rowDate <= end) {
                    return true;
                } else if (rowDate >= start && end === '' && start !== '') {
                    return true;
                } else if (rowDate <= end && start === '' && end !== '') {
                    return true;
                } else {
                    return false;
                }
            });
        };
        // Advanced Search Functions Ends

        $(function () {
            const isRtl = $('html').attr('data-textdirection') === 'rtl';

            let dt_adv_filter_table = $('.dt-advanced-search'),
                assetPath = '../../../app-assets/';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }


            // Advanced Search
            // --------------------------------------------------------------------

            // Advanced Filter table
            if (dt_adv_filter_table.length) {
                const oTable = dt_adv_filter_table.DataTable({
                    dom: '<"card-header border-bottom p-1"<"head-label">' +
                        '<"dt-action-buttons text-end"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"' +
                        '<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't<"d-flex justify-content-between mx-0 row"' +
                        '<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    order: [[0, 'asc']],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    buttons: [
                        {
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle me-2',
                            text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                                    className: 'dropdown-item',
                                    exportOptions: { columns: [1,2,3, 4, 5, 6, 7] }
                                },
                                {
                                    extend: 'csv',
                                    text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                                    className: 'dropdown-item',
                                    exportOptions: { columns: [1,2,3, 4, 5, 6, 7] }
                                },
                                {
                                    extend: 'excel',
                                    text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                                    className: 'dropdown-item',
                                    exportOptions: { columns: [1,2,3, 4, 5, 6, 7] }
                                },
                                {
                                    extend: 'pdf',
                                    text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: { columns: [1,2,3, 4, 5, 6, 7] }
                                },
                                {
                                    extend: 'copy',
                                    text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                                    className: 'dropdown-item',
                                    exportOptions: { columns: [1,2,3, 4, 5, 6, 7] }
                                }
                            ],
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                                $(node).parent().removeClass('btn-group');
                                setTimeout(function () {
                                    $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                                }, 50);
                            }
                        },
                        {
                            text: feather.icons['plus'].toSvg({class: 'me-50 font-small-4'}) + 'Add New Partner',
                            className: 'create-new btn btn-success',
                            attr: {
                                'data-bs-toggle': 'modal',
                                'data-bs-target': '#modals-slide-in'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{route('partner.list')}}",
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'mobile'},
                        {data: 'cmtnd'},
                        {data: 'birthday'},
                        {data: 'referral_code'},
                        {data: 'promo_code'},
                        {data: 'action'}
                    ],
                });
            }

            // on key up from input field
            $('input.dt-input').on('keyup', function () {
                filterColumn($(this).attr('data-column'), $(this).val());
            });

        });

    </script>
    <script src="{{asset('vendors/js/popper/popper.min.js')}}"></script>
    <!-- Custom JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <!-- Validate -->
    <script src="{{asset('js/scripts/validate-partner/validate-partner.js')}}"></script>
@endsection
