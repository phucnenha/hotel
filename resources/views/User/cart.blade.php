@extends('layout.main')


@section('title', 'Giỏ hàng')


@section('content')


   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="infor-container-right">
    @if(session('error'))
    <div class="alert alert-danger"  style="padding: 30px; margin-top: 40px; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toastEl = document.getElementById("liveToast");
        var toast = new bootstrap.Toast(toastEl, {
            delay: 8000 // Hiển thị trong 8 giây
        });
        toast.show();
    });
</script>
@endif
<h2 class="mt-4 mb-3" style="padding: 30px; margin-top: 20px; margin-bottom: 20px; text-align: center;">
    GIỎ HÀNG CỦA BẠN
</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Loại phòng</th>
            <th>Ngày check-in</th>
            <th>Ngày check-out</th>
            <th>Số phòng</th> <!-- New column for number of rooms -->
            <th>Giá phòng/đêm</th>
            <th>Giảm giá</th>
            <th>Giá sau khi giảm</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    @foreach (session('bookedRooms', []) as $index => $room)
<tr>
    <td>{{ $room['room_type'] }}</td>
    <td>{{ $room['check_in'] }}</td>
    <td>{{ $room['check_out'] }}</td>


    <td>
    <form action="{{ route('cart.update', $index) }}" method="POST">
        @csrf
        <input type="number" name="rooms" value="{{ old('rooms', $room['rooms'] ?? 1) }}"
               min="1" max="5" class="form-control @error('rooms') is-invalid @enderror"
               onchange="this.form.submit()" />
        @if ($errors->has('rooms') && session('last_error_index') == $index)
            <small class="text-danger">{{ $errors->first('rooms') }}</small>
        @endif
    </form>
</td>
    <td>{{ number_format($room['price_per_night']) }} VND</td>
    <td>
        @if($room['discount_percent'] > 0)
            <span class="badge bg-success">{{ $room['discount_percent'] }}% OFF</span>
        @else
            <span class="badge bg-secondary">Không giảm giá</span>
        @endif
    </td>
    <td>
        @if($room['discount_percent'] > 0)
            <span class="text-muted text-decoration-line-through">
                {{ number_format($room['price_per_night']) }} VND
            </span>
            <br>
            <span class="fw-bold">{{ number_format($room['discounted_price']) }} VND/đêm</span>
        @else
            {{ number_format($room['price_per_night']) }} VND
        @endif
    </td>
    <td>
        <span class="fw-bold text-primary">{{ number_format($room['room_total']) }} VND</span>
    </td>


    <td>
    <a href="{{ route('cart.remove', $index) }}"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Bạn có chắc muốn xóa phòng này khỏi giỏ hàng?');">
        Xóa
    </a>


    </td>


</tr>
@endforeach


    </tbody>
</table>




<div class="mt-3">
    <h4>Tổng tiền: <span class="fw-bold text-danger">{{ number_format(array_sum(array_column(session('bookedRooms', []), 'room_total'))) }} VND</span></h4>
</div>


<div class="mt-3">
<a href="{{ route('home') }}" class="btn btn-outline-secondary">Quay lại</a>
    <a href="{{ route('showBooking') }}" class="btn btn-primary">Chuyển sang trang đặt phòng</a>
</div>
@endsection
