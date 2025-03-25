<head> <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    /></head>
<style>
/* Reset và định nghĩa chung */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    min-height: 100vh;
    max-width: 1440px;
    margin: 0 auto;
}

.container {
    padding: 0 40px;
}

/* Phần đầu */
.phandau {
    background: linear-gradient(135deg, #b88a44 0%, #8b6b2f 100%);
    padding: 100%;
    color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.phandau h1 {
    text-align: center;
    font-size: 3rem;
    margin-bottom: 30px;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.phandaua {
    display: flex;
    justify-content: center;
    gap: 100px;
    margin-top: 40px;
    position: relative;
}

.phandaua::before {
    content: "";
    position: absolute;
    top: 17px;
    left: 50%;
    transform: translateX(-50%);
    width: 60%;
    height: 2px;
    background-color: rgba(255, 255, 255, 0.3);
    z-index: 0;
}

/* Bước hiển thị (steps) */
.phandaua1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    position: relative;
    z-index: 1;
}

.phandaua1 span {
    background-color: white; /* Màu nền mặc định */
    color: #b88a44; /* Màu chữ mặc định */
    font-weight: bold;
    font-size: 1.2rem;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
}

.phandaua1:hover span {
    transform: scale(1.1); /* Phóng to nhẹ khi hover */
}

/* Active trạng thái */
.phandaua1.active span {
    background-color: #b88a44; /* Màu nền của bước active */
    color: white; /* Màu chữ của bước active */
}

/* Mặc định cho từng bước */
.phandaua1:nth-child(1) span,
.phandaua1:nth-child(2) span,
.phandaua1:nth-child(3) span {
    background-color: white; /* Nền trắng khi chưa active */
    color: #b88a44; /* Màu chữ vàng nâu mặc định */
}

.phandaua1 p {
    font-size: 1.2rem;
    font-weight: 500;
    color: white;
    text-align: center;
}

/* Nội dung động */
.phanthanmot {
    text-align: center;
    padding: 30px;
    background-color: white;
    margin: 30px auto;
    max-width: 900px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.phanthanmot p {
    font-size: 1.3rem;
    color: #e74c3c;
    margin-bottom: 20px;
    font-weight: 500;
}

/* Các nút hoàn tất */
.complete-payment,
.thanhtoan {
    text-align: center;
    margin-top: 20px;
}

.btn-complete,
.thanhtoan button {
    background: #4CAF50; /* Màu nền xanh */
    color: white;
    padding: 10px 20px;
    font-size: 1.2rem;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.btn-complete:hover,
.thanhtoan button:hover {
    background-color: #45a049; /* Màu xanh đậm khi hover */
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

/* Table hiển thị */
table {
    width: 100%;
    border-spacing: 0 15px;
}

th {
    font-size: 1.2rem;
    color: #333;
    font-weight: 600;
    text-align: left;
    padding-right: 10px;
}

td {
    font-size: 1.1rem;
    color: black;
}

/* Phần cuối */
.phancuoi {
    margin: 40px auto;
    border: 3px solid #b88a44;
    border-radius: 20px;
    padding: 40px;
    max-width: 1200px;
    background-color: white;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

/* Responsive cho thiết bị nhỏ */
@media (max-width: 1200px) {
    .container {
        padding: 0 20px;
    }

    .phangiua {
        grid-template-columns: 1fr;
        max-width: 600px;
    }

    .thanphancuoi {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

@media (max-width: 768px) {
    .phandau h1 {
        font-size: 2rem;
    }

    .phandaua {
        gap: 40px;
    }

    .bentrai img {
        width: 200px;
        height: 200px;
    }
}

 </style>
  <div class="phandau">
    <div class="container">
        <div class="phandaua">
            <!-- Bước 1 -->
            <div class="phandaua1 {{ $step == 1 ? 'active' : '' }}">
                <span>1</span>
                <p>Thông tin khách hàng</p>
            </div>
            <!-- Bước 2 -->
            <div class="phandaua1 {{ $step == 2 ? 'active' : '' }}">
                <span>2</span>
                <p>Chi tiết thanh toán</p>
            </div>
            <!-- Bước 3 -->
            <div class="phandaua1 {{ $step == 3 ? 'active' : '' }}">
                <span>3</span>
                <p>Xác nhận đặt phòng</p>
            </div>
        </div>
    </div>
</div>
