@extends("Layout.main")

@section("title","Trang tìm phòng")

@section("content")
<!-- Home Section -->
<section class="home">
    <div class="content">
        <div class="owl-carousel owl-theme">
            @foreach ($slides as $slide)
                <div class="item">
                    <img src="{{ asset($slide->S_file) }}" alt="Slide Image">
                    <div class="text">
                        <h1>{{ $slide->caption1 }}</h1>
                        <p>{{ $slide->caption2 }}</p>
                        <div class="flex">
                            <button class="primary-btn">READ MORE</button>
                            <button class="secondary-btn">CONTACT US</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: { items: 1 },
            768: { items: 1 },
            1000: { items: 1 }
        }
    });
</script>

<section class="book">
    <div class="container flex_space">
        <div class="text">
            <h1><span>Book</span> Your rooms</h1>
        </div>
        <div class="form">
            <form action="{{ route('searchroom.search') }}" class="grid" method="POST">
            @csrf  
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Lỗi:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table-book">
                    <tr>
                        <td style="color: white;">Ngày nhận phòng</td>
                        <td style="color: white;">Ngày trả phòng</td>
                        <td style="color: white;">Người lớn</td>
                        <td style="color: white;">Trẻ em</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="check_in" value="{{ request('check_in', old('check_in')) }}" required></td>
                        <td><input type="date" name="check_out" value="{{ request('check_out', old('check_out')) }}" required></td>
                        <td><input type="number" name="adults" min="1" max="10" value="{{ request('adults', old('adults', 1)) }}" required></td>
                        <td><input type="number" name="children" min="0" max="10" value="{{ request('children', old('children', 0)) }}" required></td>
                        <td><button type="submit" class="primary-btn">Tìm kiếm</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>

@if(isset($data))
<section class="room-list">
    <div class="container">
        <h2 class="section-title">Danh sách phòng trống</h2>
        
        @if($available_rooms->isEmpty())
            <p class="no-rooms">Không có phòng trống phù hợp!</p>
        @else
            <div class="room-grid">
                @foreach($available_rooms as $room)
                <div class="room-card" style="width:600px">
                    <img src="{{ asset($room->image_url ?? 'images/default-room.jpg') }}" alt="{{ $room->room_name }}" style="width: 300px">
                    <div class="room-details">
                        <h3 class="room-name">{{ $room->room_name }}</h3>
                        <p><i class="fas fa-bed"></i> Loại giường: <strong>{{ $room->bed_type ?? 'Không xác định' }}</strong></p>
                        <p><i class="fas fa-ruler-combined"></i> Diện tích: <strong>{{ $room->area ?? 'Không xác định' }} m²</strong></p>
                        <p><i class="fas fa-umbrella-beach"></i> Hướng phòng: <strong>{{ $room->view ?? 'Không xác định' }}</strong></p>
                        <p><i class="fas fa-tag"></i> Giá phòng/đêm: <strong>{{ number_format($room->price, 0, ',', '.') }} VNĐ</strong></p>
                        <p class="discount"><i class="fas fa-percent"></i> Giảm giá: <strong>{{ $room->discount_percent ?? 0 }}%</strong></p>
                        <p><i class="fas fa-door-open"></i> Số phòng còn lại: <strong>{{ $room->remaining_rooms ?? 'Không xác định' }}</strong></p>
                        <p><i class="fas fa-user-friends"></i> Sức chứa: <strong>{{ optional($room->capacity)->max_capacity ?? 'Không xác định' }} người</strong></p>
                        
                        <div class="room-actions">
                            <form method="GET" action="{{ route('thongtin') }}">
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="check_in" value="{{ $data['check_in'] }}">
                                <input type="hidden" name="check_out" value="{{ $data['check_out'] }}">
                                <input type="hidden" name="adults" value="{{ $data['adults'] }}">
                                <input type="hidden" name="children" value="{{ $data['children'] }}">
                                <button type="submit" class="btn primary-btn">Đặt ngay</button>
                            </form>

                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="check_in" value="{{ $data['check_in'] }}">
                                <input type="hidden" name="check_out" value="{{ $data['check_out'] }}">
                                <button type="submit" class="btn primary-btn">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endif



@endsection