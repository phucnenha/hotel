@extends('layout.main')

@section('title', 'Thông Tin Khách Hàng')

@section('content')
    @include('layout.reuse.steps', ['step' => 1]) <!-- Hiển thị các bước -->
    @include('layout.reuse.count-time') <!-- Nhúng đồng hồ đếm ngược -->
    <!-- Form điền thông tin khách hàng -->
    <div class="container">
    <div class="infor-container row">
        <!-- Thông tin khách hàng -->
        <div class="infor-container-left">
            <h2>Điền thông tin đặt phòng</h2>
            <form action="process_booking.php" method="POST">
                
                
            </form>
        </div>

        <!-- Hiển thị thông tin đặt phòng -->
        <div class="infor-container-right">
            <h2>Thông tin đặt phòng</h2>
            <table class="infor_order">
                
            </table>
        </div>
    </div>
</div>
        </section>

@endsection
