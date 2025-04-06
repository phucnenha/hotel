@extends('layout.main')

@section('title', 'Golden Tree Apartment')

@section('content')
    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11; color: green;">
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
    <!-- Hiển thị thông báo lỗi -->
    @if(session('error'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11; color: red;">
        <div id="liveToastError" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toastEl = document.getElementById("liveToastError");
            var toast = new bootstrap.Toast(toastEl, {
                delay: 8000 // Hiển thị trong 8 giây
            });
            toast.show();
        });
    </script>
    @endif
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

<!-- Booking Section -->
<section class="book">
    <div class="container flex_space">
        <div class="text">
            <h1><span>Book</span> Your Rooms</h1>
        </div>
        <div class="form">
            <form action="{{ route('searchroom.search') }}" class="grid" method="POST">
                @csrf
                <table class="table-book">
                    <tr>
                        <td>Ngày nhận phòng</td>
                        <td>Ngày trả phòng</td>
                        <td>Người lớn</td>
                        <td>Trẻ em</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="date" id="checkin" name="check_in" required></td>
                        <td><input type="date" id="checkout" name="check_out" required></td>
                        <td><input type="number" name="adults" min="1" value="1" required></td>
                        <td><input type="number" name="children" min="0" value="0" required></td>
                        <td><button type="submit" class="btn primary-btn" style="border-color: while;">Tìm kiếm</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<script>
        // -------------------Ngày nhận và ngày trả--------------------
        document.addEventListener("DOMContentLoaded", function() {
        const checkinInput = document.querySelector("[name='check_in']");
        const checkoutInput = document.querySelector("[name='check_out']");
        const bookingForm = document.querySelector("form");

        // Lấy ngày hiện tại và ngày mai
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1); // Ngày mai

        // Định dạng ngày thành YYYY-MM-DD
        const formatDate = (date) => date.toISOString().split("T")[0];

        // Thiết lập giá trị mặc định & min cho input ngày
        checkinInput.value = formatDate(today);
        checkinInput.setAttribute("min", formatDate(today));

        checkoutInput.value = formatDate(tomorrow);
        checkoutInput.setAttribute("min", formatDate(today));

        //  Kiểm tra trước khi gửi form
        bookingForm.addEventListener("submit", function(event) {
            const checkinDate = new Date(checkinInput.value);
            const checkoutDate = new Date(checkoutInput.value);

            if (checkinDate >= checkoutDate) {
                alert("❌ Ngày nhận phòng phải trước ngày trả phòng!");
                event.preventDefault(); // Ngăn form gửi đi
            }
        });
    });
    </script>

<!-- About Section -->
<section class="about top" id="about">
        <div class="container flex">
            <div class="left">
                <div class="heading">
                    <h1>WELCOME</h1>
                    <h2> Golden Tree Hotel</h2>
                </div>
                <p>Golden Tree Hotel là điểm đến lý tưởng cho những ai tìm kiếm sự thoải mái và đẳng cấp. Với không gian sang trọng, dịch vụ chuyên nghiệp và tiện ích hiện đại, chúng tôi luôn sẵn sàng mang đến cho bạn những trải nghiệm tuyệt vời. Hãy tận hưởng kỳ nghỉ trọn vẹn cùng Golden Tree!</p>
                <button class="primary-btn">ABOUT US</button>
            </div>
            <div class="right">
                <img src="{{ asset('slideshow/about.png') }}" alt="">
            </div>
        </div>
    </section>


<!-- Rooms Section -->
<section class="room" id="rooms">
    <div class="container top">
        <div class="heading">
            <h1 style="font-family: serif; font-size: 45px;">Our Rooms</h1><br>
            <p>Phòng nghỉ tại Golden Tree được thiết kế hiện đại, đầy đủ tiện nghi, mang đến không gian thoải mái và thư giãn.
                Chúng tôi luôn sẵn sàng phục vụ để bạn có trải nghiệm lưu trú hoàn hảo nhất!
            </p>
        </div>
    </div>

    <div class="grid-container">
    @foreach ($rooms as $room)
        @if ($loop->index < 6)
        <div class="item">
            <img src="{{ asset('room_img/'.$room->file_anh) }}" alt="{{ $room->room_type }}" width="400px">
            <div class="infor_room">
                <h4>{{ $room->room_type }}</h4>
                <p><i class="fas fa-bed"></i> <strong>Loại giường:</strong> {{ $room->bed_type }}</p>
                <p><i class="fas fa-ruler-combined"></i> <strong>Diện tích:</strong> {{ $room->area }}m²</p>
                <p><i class="fas fa-umbrella-beach"></i> <strong>Hướng phòng:</strong> {{ $room->view }}</p>
                <p><i class="fas fa-tag"></i> <strong>Giá phòng/đêm:</strong> {{ number_format($room->price_per_night, 0, ',', '.') }}đ</p>

                <!-- Hiển thị giảm giá nếu có -->
                @if (!empty($room->discount_percent))
                    <p class="discount"><i class="fas fa-percent"></i> Giảm giá: {{ $room->discount_percent }}%</p>
                @else
                    <p class="discount"><i class="fas fa-percent"></i> Không có giảm giá</p>
                @endif
                <p><i class="fas fa-door-open"></i> <strong>Số phòng còn lại:</strong> {{ $room->remaining_rooms }}</p>
                <div class="room-actions">
                    <form method="GET" action="{{ route('thongtin') }}">
                    @csrf
<<<<<<< .mine
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="check_in" value="{{ today()->toDateString() }}">
                    <input type="hidden" name="check_out" value="{{ today()->addDay()->toDateString() }}">
                    <button type="submit" class="add-cart btn primary-btn">Thêm vào giỏ hàng</button>
                </form>












=======
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="check_in" value="{{ now()->toDateString() }}">
                        <input type="hidden" name="check_out" value="{{ now()->addDays(1)->toDateString() }}">
                        <input type="hidden" name="adults" value="1">
                        <input type="hidden" name="children" value="0">
                        <button type="submit" class="book-now" style="width:150px">Đặt ngay</button>
                    </form>

                    
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="check_in" value="{{ today()->toDateString() }}">
                        <input type="hidden" name="check_out" value="{{ today()->addDay()->toDateString() }}">
                        <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
>>>>>>> .theirs
            </div>
        </div>
        @endif
    @endforeach
    </div>
</section>

@php
    $services = [
        ['icon' => 'fa-solid fa-champagne-glasses', 'name' => 'Delious Food'],
        ['icon' => 'fa-solid fa-person-biking', 'name' => 'Fitness'],
        ['icon' => 'fa-solid fa-utensils', 'name' => 'Inhouse Restaurant'],
        ['icon' => 'fa-solid fa-spa', 'name' => 'Beauty Spa'],
    ];
@endphp

<section class="services top">
    <div class="container">
        <div class="heading">
            <h1 style="font-family: serif; font-size: 45px;">Our Services</h1>
            <p>Nơi bạn tận hưởng không gian lý tưởng và dịch vụ hoàn hảo cho mọi chuyến đi!</p>
        </div>
        <div class="content flex_space">
            <div class="left grid2">
                @foreach($services as $service)
                    <div class="box">
                        <div class="text">
                            <i class="{{ $service['icon'] }}"></i>
                            <h3>{{ $service['name'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="right">
                <img src="{{ asset('room_img/service.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection