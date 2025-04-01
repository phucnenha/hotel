@extends('layout.main')

@section('title', 'Cart')

@section('content')
<div class="cart-container">
    <div class="cart-header">
        <p class="cart-title">GIỎ HÀNG CỦA BẠN</p>
    </div>

    @if(session('noti'))
        <p class="cart-noti">{{ session('noti') }}</p>
    @endif

    @if(!empty($shoppingCart) && count($shoppingCart) > 0)
        <div class="cart-items">
            @foreach ($shoppingCart as $cartItem)
                <div class="cart-room-info">
                    <div class="cart-room-details">
                        <img src="{{ $cartItem['image_url'] }}" alt="Room Image">
                        <div class="room-text">
                            <h3>Loại Phòng: {{ $cartItem['room_type'] }}</h3>
                            <p><strong>ID:</strong> {{ $cartItem['room_id'] }}</p>
                            <p><strong>Giá Mỗi Đêm:</strong> {{ number_format($cartItem['price_per_night'], 0, ',', '.') }} VNĐ</p>
                            <p><strong>Ngày Nhận Phòng:</strong> {{ $cartItem['check_in'] }}</p>
                            <p><strong>Ngày Trả Phòng:</strong> {{ $cartItem['check_out'] }}</p>
                        </div>
                        <div class="action-buttons">
                        <form action="{{ route('cart.remove', $cartItem['room_id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">Xóa</button>
                        </form>
                            <a href="{{ route('cart.checkout', $cartItem['room_id']) }}" class="btn">Đặt ngay</a>
                    </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    @else
        <p class="empty-cart">🛒 Giỏ hàng rỗng!</p>
    @endif
    
    <a href="{{ url('/') }}" class="primary-btn">Quay lại trang chủ</a>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll(".delete-room");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                const roomId = this.dataset.roomId;
                
                fetch(`/cart/remove/${roomId}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`cart-item-${roomId}`).remove();
                    }
                })
                .catch(error => console.error("Lỗi:", error));
            });
        });
    });
</script>

@endsection
