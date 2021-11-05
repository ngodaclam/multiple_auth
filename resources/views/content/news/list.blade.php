@extends('layouts/contentLayoutMaster')

@section('title', 'News')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <style>
        .error {
            color: red;
            font-size: 11px;
        }
    </style>
@endsection


@section('content')
    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">News</h4>
                    </div>
                    <!--Search Form -->
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row g-1 mb-md-1">
                                <div class="col-md-4">
                                    <label class="form-label">Title:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input dt-full-name"
                                        data-column="1"
                                        placeholder="Enter your news title"
                                        data-column-index="0"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">UserName:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input dt-full-name"
                                        data-column="3"
                                        placeholder="Enter your news user name"
                                        data-column-index="2"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">CateName:</label>
                                    <input
                                        type="text"
                                        class="form-control dt-input dt-full-name"
                                        data-column="4"
                                        placeholder="Enter your news cate name"
                                        data-column-index="3"
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
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>User name</th>
                                <th>Cate name</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@endsection

@section('page-script')

    {{-- Page js files --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**
         * Validate form add
         */

        $(document).ready(function () {
            $('#category-add-new').validate({
                rules: {
                    name: {
                        required: true,
                        remote: {
                            url: "{{route('check.CategoryNews')}}",
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            }
                        },
                    },
                },
                messages: {
                    name: {
                        required: "Yêu cầu bắt buộc ",
                        remote: "Danh mục đã tồn tại",
                    },

                },
                submitHandler: function (form) {
                    $('.btn-block').attr('disabled', true).css('cursor', 'not-allowed');
                    form.submit();
                }
            });
        });
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

            // Advanced Filter table
            if (dt_adv_filter_table.length) {
                const oTable = dt_adv_filter_table.DataTable({
                    dom: '<"card-header border-bottom p-1"<"head-label">' +
                        '<"dt-action-buttons text-end"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"' +
                        '<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't<"d-flex justify-content-between mx-0 row"' +
                        '<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    buttons: [
                        {
                            text: feather.icons['plus'].toSvg({class: 'me-50 font-small-4'}) + 'Add News',
                            className: 'create-new btn btn-success',
                            action: function (e, dt, button, config) {
                                window.location = '{{route('news.create')}}';
                            }
                        }
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{route('get.list')}}",
                        type: "GET",
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'title'},
                        {
                            data: 'image', render: function (data, type, row, meta) {
                                return '<img src="' + data + '" height="50" width="50"/>';
                            }
                        },
                        {data: 'user_name'},
                        {data: 'cate_name'},
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
@endsection
