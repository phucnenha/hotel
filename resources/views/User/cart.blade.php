@extends('layout.main')

@section('title', 'Cart')

@section('content')
<div class="cart-container">
    <p class="cart-title">GIỎ HÀNG CỦA BẠN</p>
    @if(session('noti'))
        <p style='color: green;'>{{ session('noti') }}</p>
    @endif
    
    @if(!empty($shoppingCart))
        @foreach ($shoppingCart as $cartItem)
            <div class="room-info">
                <div class="room-details">
                    <h3>Thông Tin Phòng: {{ $cartItem['room_type'] }}</h3>
                    <img src="{{ $cartItem['image_url'] }}" width="400px">
                    <p><strong>ID:</strong> {{ $cartItem['room_id'] }}</p>
                    <p><strong>Loại Phòng:</strong> {{ $cartItem['room_type'] }}</p>
                    <p><strong>Giá Mỗi Đêm:</strong> {{ number_format($cartItem['price_per_night'], 0, ',', '.') }} VNĐ</p>
                    <p><strong>Ngày Nhận Phòng:</strong> {{ $cartItem['check_in'] }}</p>
                    <p><strong>Ngày Trả Phòng:</strong> {{ $cartItem['check_out'] }}</p>
                </div>
                <div class="action-buttons">
                    <a href="{{ route('cart.remove', $cartItem['room_id']) }}" class="btn">Xóa</a>
                    <a href="{{ route('cart.checkout', $cartItem['room_id']) }}" class="btn">Đặt ngay</a>
                </div>
            </div>
            <hr>
        @endforeach
    @else
        <p style="color: gray; font-weight: bold; font-size: 25px; ">🛒 Giỏ hàng rỗng!</p>
    @endif
    
    <a href="{{ url('/') }}" class="primary-btn">Quay lại trang chính</a>
</div>
@endsection

