
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
