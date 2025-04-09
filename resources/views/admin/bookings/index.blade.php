@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Simple Tables</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                         
                        <div class="card-body">
                        <div class="mb-3">
                            <label for="statusFilter">Lọc theo trạng thái:</label>
                            <select id="statusFilter" class="form-select" style="width: 200px; display: inline-block;">
                                <option value="">Tất cả</option>
                                <option value="Đang xử lý">Đang xử lý</option>
                                <option value="Đã xác nhận">Đã xác nhận</option>
                                <option value="Hủy">Hủy</option>
                            </select>
                        </div>

                        <table id="booking-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Customer</th>
                                <th>Check in</th>
                                <th>Check out</th>
                                <th>Booking date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roomBookings as $roomBooking)
                                <tr class="align-middle">
                                    <td>{{$roomBooking->id}}.</td>
                                    <td>{{$roomBooking->customer->full_name}}</td>
                                    <td>{{date('d/m/Y', strtotime($roomBooking->check_in))}}</td>
                                    <td>{{date('d/m/Y', strtotime($roomBooking->check_out))}}</td>
                                    <td>{{date('d/m/Y H:i:s', strtotime($roomBooking->booking_date))}}</td>
                                    <td>{{$roomBooking->status}}</td>
                                    <td>
                                        <button class="btn btn-info"><i class="fa-solid fa-eye"></i></button>
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <script>
                                $(document).ready(function(){
                                    const table = new DataTable('#booking-table', {
                                        paging: false,
                                        ordering: false,
                                        info: false,
                                        responsive: false,
                                        searching: true
                                    });
                                    $('#statusFilter').on('change', function () {
                                        const selectedStatus = $(this).val();
                                        table.column(5).search(selectedStatus).draw();
                                    });
                                });
                                </script>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                {{$roomBookings->links()}}
                                {{--                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
                                {{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                {{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                {{--                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
