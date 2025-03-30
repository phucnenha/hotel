@extends('layout.main')

@section('title', 'Thông Tin Khách Hàng')

@section('content')
    @include('layout.reuse.steps', ['step' => 1]) <!-- Hiển thị các bước -->
    @include('layout.reuse.count-time') <!-- Nhúng đồng hồ đếm ngược -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <div class="row infor-container">
            <!-- Hiển thị thông tin đặt phòng -->
            <div class="col-md-6 infor-container-right">
                <h2>Thông tin đặt phòng</h2>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Loại phòng</th>
                            <th>Ngày check-in</th>
                            <th>Ngày check-out</th>
                            <th>Số người</th>
                            <th>Giá phòng/đêm</th>
                            <th>Giảm giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $room->room_type }}</td>
                            <td>{{ $data['check_in'] }}</td>
                            <td>{{ $data['check_out'] }}</td>
                            <td>{{ ($data['adults'] ?? 0) + ($data['children'] ?? 1) }}</td>
                            <td>
                                @if(isset($room->discount_percent) && $room->discount_percent > 0)
                                    <span class="text-muted text-decoration-line-through">
                                        {{ number_format($room->price_per_night) }} VND
                                    </span>
                                @else
                                    {{ number_format($room->price_per_night) }} VND
                                @endif
                            </td>
                            <td>
                                @if(isset($room->discount_percent) && $room->discount_percent > 0)
                                    <span class="badge bg-success">{{ $room->discount_percent }}% OFF</span>
                                @else
                                    <span class="badge bg-secondary">Không giảm giá</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-primary">
                                    {{ number_format($room->price_per_night - ($room->price_per_night * ($room->discount_percent / 100))) }} VND
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Thông tin khách hàng -->
            <div class="col-md-6 infor-container-left">
                <h2>Điền thông tin đặt phòng</h2>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="nationality" class="form-label">Quốc tịch <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nationality" placeholder="Nhập quốc tịch" required>
                    </div>

                    
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary"><span>&#171;</span> Quay lại</a>
                        <button type="submit" class="btn btn-primary">Thanh toán</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
