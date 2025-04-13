@extends('admin.layout.main')

@section('content')

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Danh sách đặt phòng</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách đặt phòng</li>
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
                            <h3 class="card-title">Danh sách đặt phòng</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <form method="GET" action="{{ route('admin.bookings.index') }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="statusFilter" class="form-label">Lọc theo trạng thái:</label>
                                            <select id="statusFilter" name="status" class="form-select"
                                                    style="width: 200px; display: inline-block;" onchange="this.form.submit()">
                                                <option value="">Tất cả</option>
                                                <option
                                                    value="đang xử lý" {{ request('status') == 'đang xử lý' ? 'selected' : '' }}>
                                                    Đang xử lý
                                                </option>
                                                <option
                                                    value="đã xác nhận" {{ request('status') == 'đã xác nhận' ? 'selected' : '' }}>
                                                    Đã xác nhận
                                                </option>
                                                <option value="hủy" {{ request('status') == 'hủy' ? 'selected' : '' }}>Hủy
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="check_in" class="form-label">Check in:</label>
                                            <input type="date" onchange="this.form.submit()" value="{{request('check_in')}}" style="width: 200px; display: inline-block;" class="form-control" name="check_in" id="check_in">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="check_out" class="form-label">Check out:</label>
                                            <input type="date" onchange="this.form.submit()" value="{{request('check_out')}}" style="width: 200px; display: inline-block;" class="form-control" name="check_out" id="check_out">
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{route('admin.bookings.index')}}" class="btn btn-secondary">Xóa</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table id="booking-table" class="table table-bordered"  style="text-align: center;">
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
                                @foreach($roomBookings as $key => $roomBooking)
                                    <tr class="align-middle">
                                        <td>{{$key + 1 + ($roomBookings->currentPage() - 1) * $roomBookings->perPage()}}</td>
                                        <td>{{$roomBooking->customer->full_name ?? 'Khách vãng lai'}}</td>
                                        <td>{{date('d/m/Y', strtotime($roomBooking->check_in))}}</td>
                                        <td>{{date('d/m/Y', strtotime($roomBooking->check_out))}}</td>
                                        <td>{{date('d/m/Y H:i:s', strtotime($roomBooking->booking_date))}}</td>
                                        <td>
                                            @if($roomBooking->status == 'đang xử lý')
                                                <span class="badge bg-warning">{{ $roomBooking->status }}</span>
                                            @elseif($roomBooking->status == 'đã xác nhận')
                                                <span class="badge bg-success">{{ $roomBooking->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $roomBooking->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.bookings.edit', $roomBooking->id)}}"
                                               class="btn btn-sm btn-warning" style="text-align:center;"><i class="fa-solid fa-pen-to-square"></i></a>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
