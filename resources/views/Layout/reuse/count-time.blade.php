<style>
 
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

 .phandau {
   background: linear-gradient(135deg, #b88a44 0%, #8b6b2f 100%);
   padding: 40px 0;
   color: white;
   box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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

 .phandaua1 {
   display: flex;
   flex-direction: column;
   align-items: center;
   gap: 15px;
   position: relative;
   z-index: 1;
 }

 .phandaua1 span {
   display: flex;
   align-items: center;
   justify-content: center;
   width: 45px;
   height: 45px;
   border-radius: 50%;
   background-color: #b88a44; /* Màu nền mặc định cho số 1 và 3 */
   color: white; /* Màu chữ mặc định cho số 1 và 3 */
   font-weight: bold;
   font-size: 1.2rem;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
   transition: transform 0.3s ease;
 }

 .phandaua1:hover span {
   transform: scale(1.1);
 }

 .phandaua1.active span {
   background-color: #b88a44;
   color: white;
 }

 /* Chỉnh màu số 2 thành #b88a44 */
 .phandaua1:nth-child(1) span {
   background-color: white;
   color: #b88a44;
 }

 .phandaua1 p {
   font-size: 1.2rem;
   font-weight: 500;
   color: white;
   text-align: center;
 }

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
 .complete-payment {
text-align: center;
margin-top: 20px;
}

.btn-complete {
   background-color: #4CAF50; /* Màu xanh */
   color: white;
   padding: 10px 20px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 1.2rem;
   border-radius: 5px;
   transition: background-color 0.3s;
}

.btn-complete:hover {
   background-color: #45a049; /* Màu xanh đậm khi hover */
}
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

      .phandau {
        background: linear-gradient(135deg, #b88a44 0%, #8b6b2f 100%);
        padding: 40px 0;
        color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
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

      .phandaua1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        position: relative;
        z-index: 1;
      }

      .phandaua1 span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #b88a44; /* Màu nền mặc định cho số 1 và 3 */
        color: white; /* Màu chữ mặc định cho số 1 và 3 */
        font-weight: bold;
        font-size: 1.2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
      }

      .phandaua1:hover span {
        transform: scale(1.1);
      }

      .phandaua1.active span {
        background-color: #b88a44;
        color: white;
      }

      /* Chỉnh màu số 2 thành #b88a44 */
      .phandaua1:nth-child(2) span {
        background-color: white;
        color: #b88a44;
      }

      .phandaua1 p {
        font-size: 1.2rem;
        font-weight: 500;
        color: white;
        text-align: center;
      }

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

      .phanthanmot h4 {
        font-size: 1.4rem;
        color: #b88a44;
      }

      .phangiua {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin: 40px auto;
        max-width: 1200px;
        padding: 0 20px;
      }

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

      td:nth-child(2) {
        text-align: left;
        padding-left: 0;
        width: 10px;
      }

      td:nth-child(3) {
        text-align: left;
        padding-left: 250px;
      }

      .phancuoi {
        margin: 40px auto;
        border: 3px solid #b88a44;
        border-radius: 20px;
        padding: 40px;
        max-width: 1200px;
        background-color: white;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      }

      .tieude h5 {
        color: #b88a44;
        font-size: 1.8rem;
        margin-bottom: 30px;
        text-align: center;
      }

      .thanphancuoi {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 40px;
        align-items: center;
      }

      .benphai p {
        font-size: 20px;
        color: #333;
        margin: 15px 0;
        line-height: 1.6;
      }

      .bentrai {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
      }

      .bentrai img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .bentrai img:hover {
        transform: scale(1.05);
      }

      .thongtin-icon {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .icon-item {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .bx {
        font-size: 1.8rem;
        color: #b88a44;
      }

      .thanhtoan {
    text-align: center;
    height: 30px;
    margin-bottom: 59px;
    padding-left: 990px;
    
}

    .thanhtoan button {
        background:  #b88a44;
        color: white;
        border: none;
        padding: 18px 20px;
        font-size: 1.3rem;
        border-radius: 40px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(184, 138, 68, 0.3);
        
        text-align: center; /* Đảm bảo chữ nằm giữa */
    }

    .thanhtoan button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(184, 138, 68, 0.4);
    }
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

        .thanhtoancoc,
        .thanhtoantoanbo {
          padding: 20px;
        }

        .bentrai img {
          width: 200px;
          height: 200px;
        }
      }
 </style>
<div class="container">
    <!-- Đồng hồ đếm ngược -->
    <div class="phanthanmot">
        <p>Thời gian còn lại: <span id="countdown-timer"></span></p>
    </div>
</div>

<script>
    // Đồng hồ đếm ngược
    let timer = 5 * 60; // Đặt thời gian là 5 phút (5 * 60 giây)
    const countdownElement = document.getElementById("countdown-timer");

    function updateCountdown() {
        const minutes = Math.floor(timer / 60); // Chia số phút
        const seconds = timer % 60; // Lấy phần dư cho số giây
        countdownElement.textContent = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`; // Hiển thị dưới dạng mm:ss

        if (timer > 0) {
            timer--; // Giảm dần thời gian
        } else {
            clearInterval(countdownInterval); // Dừng bộ đếm
            alert("Thời gian đã hết, vui lòng thử lại!"); // Thông báo khi hết thời gian
        }
    }

    // Cập nhật đồng hồ mỗi giây
    const countdownInterval = setInterval(updateCountdown, 1000);
</script>
