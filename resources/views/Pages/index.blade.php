@extends('layout.main')

@section('title', 'Golden Tree Apartment')

@section('content')

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
            <form action="{{ route('search_results') }}" class="grid" method="POST">
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
                        <td><input type="date" name="check_in" required></td>
                        <td><input type="date" name="check_out" required></td>
                        <td><input type="number" name="adults" min="1" value="1" required></td>
                        <td><input type="number" name="children" min="0" value="0" required></td>
                        <td><button type="submit" class="primary-btn">Tìm kiếm</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<script>
        function validateBooking(event) {
            event.preventDefault();
            const errorMessage = document.getElementById('errorMessage');
            const checkinDate = document.getElementById('checkin').value;
            const checkoutDate = document.getElementById('checkout').value;
            const adults = document.getElementById('adults').value;
            
            errorMessage.innerHTML = '';
            errorMessage.classList.remove('active');

            if (!checkinDate || !checkoutDate) {
                errorMessage.innerHTML = "Vui lòng chọn cả ngày nhận phòng và ngày trả phòng!";
                errorMessage.classList.add('active');
                return false;
            }

            if (new Date(checkinDate) >= new Date(checkoutDate)) {
                errorMessage.innerHTML = "Ngày nhận phòng phải nhỏ hơn ngày trả phòng!";
                errorMessage.classList.add('active');
                return false;
            }

            if (adults <= 0) {
                errorMessage.innerHTML = "Số lượng người lớn phải lớn hơn 0!";
                errorMessage.classList.add('active');
                return false;
            }

            event.target.submit();
        }
    </script>

<!-- About Section -->
<section class="about top">
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
            <div class="item">
                <img src="{{ $room->image_url }}" alt="{{ $room->room_type }}" width=400px>
                <div class="infor_room">
                    <h3>{{ $room->room_type }}</h3>
                    <p><i class="fas fa-bed"></i> <strong>Loại giường:</strong> {{ $room->bed_type }}</p>
                    <p><i class="fas fa-ruler-combined"></i> <strong>Diện tích:</strong> {{ $room->area }}m²</p>
                    <p><i class="fas fa-umbrella-beach"></i> <strong>Hướng phòng:</strong> {{ $room->view }}</p>
                    <p><i class="fas fa-tag"></i> <strong>Giá phòng/đêm:</strong> {{ number_format($room->price_per_night, 0, ',', '.') }}đ</p>
                    <p class="discount"><i class="fas fa-percent"></i> Giảm giá: {{ $room->discount_percent }}%</p>
                    <p><i class="fas fa-door-open"></i> <strong>Số phòng còn lại:</strong> {{ $room->remaining_rooms }}</p>
                    
                    <form method="GET" action="{{ route('fill_info') }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <button type="submit" class="book-now">Đặt ngay</button>
                    </form>
                    
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="check_in" value="{{ today()->toDateString() }}">
                        <input type="hidden" name="check_out" value="{{ today()->addDay()->toDateString() }}">
                        <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
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
            <h1>Our Services</h1>
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
                <img src="{{ asset('img/slide3.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection
