@extends("Layout.main")

@section("title","Trang tìm phòng")

@section("content")

<section class="book" style="margin-top: 10vh">
    <div class="container flex_space">
        <div class="text">
            <h1><span>Book</span> Your rooms</h1>
        </div>
        <div class="form">
            <form action="{{ route('searchroom.search') }}" class="grid" method="POST">
            @csrf  
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
                        <td><button type="submit" class="btn primary-btn">Tìm kiếm</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkinInput = document.querySelector("[name='check_in']");
        const checkoutInput = document.querySelector("[name='check_out']");
        const bookingForm = document.querySelector("form");

        bookingForm.addEventListener("submit", function(event) {
            const checkinDate = new Date(checkinInput.value);
            const checkoutDate = new Date(checkoutInput.value);

            if (checkinDate >= checkoutDate) {
                alert("❌ Ngày nhận phòng phải trước ngày trả phòng!");
                event.preventDefault(); // Ngăn form gửi đi
                return;
            }
        });
    });
</script>

@if(isset($data))
<section class="room-list">
    <div class="container">
        <div style="display: grid; grid-template-columns: auto auto; align-items: center; width: 100%;">
            <h2 class="section-title">Danh sách phòng trống</h2>
            <form id="sort-form" method="POST" action="{{ route('searchroom.search') }}" style="text-align: right;">
                @csrf
                <input type="hidden" name="check_in" value="{{ request('check_in') }}">
                <input type="hidden" name="check_out" value="{{ request('check_out') }}">
                <input type="hidden" name="adults" value="{{ request('adults') }}">
                <input type="hidden" name="children" value="{{ request('children') }}">

                <label for="sort_by">Sắp xếp theo giá:</label>
                <select name="sort_by" id="sort_by" onchange="this.form.submit()">
                    <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Tăng dần</option>
                    <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Giảm dần</option>
                </select>
            </form>
        </div>

        @if($available_rooms->isEmpty())
            <p class="no-rooms">Không có phòng trống phù hợp!</p>
        @else
            <div class="room-grid">
                @foreach($available_rooms as $room)
                <div class="room-card" style="width:1000px;height: 330px">
                <img src="{{ asset('room_img/'.$room->file_anh) }}" alt="{{ $room->room_type }}" style="width:60%">
                    <div class="room-details" style="width:40%">
                        <h4>{{ $room->room_type }}</h4>
                        <p><i class="fas fa-bed"></i> Loại giường: <strong>{{ $room->bed_type ?? 'Không xác định' }}</strong></p>
                        <p><i class="fas fa-ruler-combined"></i> Diện tích: <strong>{{ $room->area ?? 'Không xác định' }} m²</strong></p>
                        <p><i class="fas fa-umbrella-beach"></i> Hướng phòng: <strong>{{ $room->view ?? 'Không xác định' }}</strong></p>
                        <p class="discount"><i class="fas fa-percent"></i> Giảm giá: 
                            @if($room['discount_percent'] > 0)
                                <span class="badge bg-success">{{ $room['discount_percent'] }}%</span>
                            @else
                                <span class="badge bg-secondary">Không giảm giá</span>
                            @endif
                        </p>

                        <p class="d-flex align-items-center gap-2" style="gap:10px">
                            <i class="fas fa-tag"></i>
                            <span>Giá phòng/đêm:</span>
                            <b>
                            @if($room['discount_percent'] > 0)
                                <span class="text-muted" style="text-decoration: line-through;">
                                    {{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ
                                </span>
                                <span class="fw-bold text-danger">
                                    {{ number_format($room->price_per_night * (1 - $room['discount_percent'] / 100), 0, ',', '.') }} VNĐ
                                </span>
                            @else
                                <strong>{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</strong>
                            @endif
                            </b>
                        </p>

                        <p><i class="fas fa-door-open"></i>
                            <label for="rooms_{{ $room->id }}">Số phòng:</label>
                            <input type="number" id="roomsInput_{{ $room->id }}" name="rooms_{{ $room->id }}" value="1" min="1" max="5"  style="width: 40px;">
                        </p>

                        <div class="room-actions" >
                            <form method="GET" action="{{ route('thongtin') }}" >
                                @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="check_in" value="{{ $data['check_in'] }}">
                                    <input type="hidden" name="check_out" value="{{ $data['check_out'] }}">
                                    <input type="hidden" name="rooms" class="roomsField" value="1">
                                    <button type="submit" class="btn primary-btn" style="margin-top: -10px;">Đặt ngay</button>
                            </form>
                            <form method="POST" action="{{ route('cart.add') }}" id="formAdd_{{ $room->id }}">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="check_in" value="{{ $data['check_in'] }}">
                                <input type="hidden" name="check_out" value="{{ $data['check_out'] }}">
                                <input type="hidden" name="rooms" id="hiddenRooms_{{ $room->id }}" value="1">
                                <button type="submit" class="btn primary-btn" style="margin-top: -10px;">Thêm vào giỏ hàng</button>
                            </form>
                            
                            <div class="cart-message" style="color: green; display: none;">✅ Đã thêm vào giỏ hàng!</div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script type="text/javascript">
                                $(document).on('submit', '#formAdd_{{ $room->id }}', function(e) {
                                    e.preventDefault();  // Ngừng việc gửi form thông thường

                                    var form = $(this);
                                    var url = form.attr('action');
                                    var data = form.serialize();  // Lấy tất cả dữ liệu form

                                    $.ajax({
                                        url: url,
                                        method: 'POST',
                                        data: data,
                                        success: function(response) {
                                            // Hiển thị thông báo thành công bằng alert
                                            alert(response.success);
                                        },
                                        error: function(response) {
                                            // Hiển thị thông báo lỗi nếu có
                                            alert(response.responseJSON.error);
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endif
 
    <script>
        // --------------------đồng bộ giá trị số phòng----------------
        document.addEventListener("DOMContentLoaded", function() {
            // Lắng nghe sự thay đổi trong từng trường nhập liệu số lượng phòng
            document.querySelectorAll('.room-card').forEach(function(roomCard) {
                const roomsInput = roomCard.querySelector('input[name^="rooms_"]');  // Lấy input theo tên riêng biệt của từng phòng

                roomsInput.addEventListener('change', function() {
                    const roomId = roomCard.querySelector('input[name^="rooms_"]').name.split('_')[1];  // Lấy id của phòng
                    const roomsValue = this.value;
                    
                    // Cập nhật trường ẩn tương ứng với mỗi phòng
                    roomCard.querySelectorAll('.roomsField').forEach(function(input) {
                        input.value = roomsValue;
                    });
                });
            });
        //----------------Số lượng nút thêm giá--------------------
            // Khi form Đặt ngay hoặc Thêm vào giỏ hàng được submit
            document.querySelectorAll("form").forEach(function(form) {
                form.addEventListener("submit", function() {
                    // Cập nhật trường ẩn với số lượng phòng tương ứng
                    form.querySelectorAll('input[name^="rooms_"]').forEach(function(input) {
                        const roomId = input.name.split('_')[1]; // Lấy id của phòng
                        const roomsValue = input.value;
                        
                        form.querySelectorAll(`.roomsField_${roomId}`).forEach(function(field) {
                            field.value = roomsValue;
                        });
                    });
                });
            });
        });

        // -------------------Ngày nhận và ngày trả--------------------
        document.addEventListener("DOMContentLoaded", function() {
            const checkinInput = document.querySelector("[name='check_in']");
            const checkoutInput = document.querySelector("[name='check_out']");
            const bookingForm = document.querySelector("form");

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


@endsection