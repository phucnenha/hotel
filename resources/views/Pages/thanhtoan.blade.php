@extends('layout.main')
@section('title', 'Chi Tiết Thanh Toán')

@section('content')
    @include('layout.reuse.steps', ['step' => 2]) <!-- Hiển thị các bước -->
    @include('layout.reuse.count-time') <!-- Nhúng đồng hồ đếm ngược -->
    <!-- Hiển thị thông tin thanh toán -->
    <p>Thông tin thanh toán sẽ hiển thị tại đây...</p>
@endsection
