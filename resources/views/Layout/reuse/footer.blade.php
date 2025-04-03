<style>/*--------footer---------*/
footer {
  background: #282834;
  color: #b6b7b9;
  padding: 10% 0 5% 0;
}

footer .grid {
  grid-template-columns: 6fr 3fr 3fr;
}

footer p {
  color: #b6b7b9;
  font-size: 15px;
  line-height: 25px;
}

footer .icon i {
  margin: 20px 20px 20px 0;
  color: #b6b7b9;
}

footer h2 {
  color: #fff;
  margin-bottom: 10px;
}

footer li {
  margin-bottom: 20px;
}

footer i {
  color: #B88A44;
  margin: 20px 0;
  margin-right: 20px;
}

footer label {
  margin: 20px 0;
}

.legal {
  padding: 15px 0;
  background: #282834;
  color: #b6b7b9;
  border-top: 1px solid rgba(255, 255, 255, 0.2);
}

/*--------footer---------*/
@media only screen and (max-width:768px) {
  .home {
    color: #fff;
    height: 50vh;
  }

  .home img {
    width: 100%;
    height: 50vh;
  }

  .left, .right {
    width: 100%;
  }

  .book h1 {
    margin-bottom: 20px;
  }

  .container.flex,
  .book .flex_space {
    flex-direction: column;
  }

  .book .grid {
    grid-template-columns: repeat(3, 1fr);
  }

  .counter .grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .owl-carousel .owl-nav .owl-prev {
    left: 80%;
  }

  .gallery .owl-nav .owl-prev {
    left: 75%;
  }
  .services .flex_space {
    flex-direction: column;
  }

  .Customer {
    height: 60vh;
  }

  .Customer .container {
    max-width: 80%;
  }

  .owl-carousel2 .owl-dots {
    bottom: 0;
    left: 44.5%;
  }

  .news .content.flex {
    flex-direction: column;
  }

  .news .left {
    padding: 30px 0;
    width: 100%;
  }

  .news .right {
    width: 100%;
  }

  .newsletter {
    position: relative;
    background: #6699FF;
  }

  .newsletter .container {
    top: 0;
    left: 0;
    width: 100%;
    padding: 40px 30px;
    position: relative;
  }

  .newsletter .flex_space {
    flex-direction: column;
  }

  .newsletter input:nth-last-child(2) {
    margin: 20px 0;
    width: 100%;
  }

  .newsletter input:nth-last-child(1) {
    margin: 0;
  }

  footer .grid {
    grid-template-columns: repeat(1, 1fr);
  }
}
/*---------------------------------ĐIỀN THÔNG TIN ĐẶT PHÒNG---------------------------------------------------*/
.thongtin{
  padding:50px 0px;

}
.cart-top-wrap{
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 0px 50px;

}
.cart-top
{
  height: 2px;
  width: 70%;
  background-color: #dddd;
  display:flex;
  justify-content: space-between;
  align-items: center;
  margin: 50px;
}
.cart-top-item{
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #fff;
}
.cart-top-item i {
  color:#dddd;
}
.cart-top-fil i{
  color:#B88A44
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.infor-container {
  display: flex;
  justify-content: space-between;
  gap: 20px;
}

.infor-container-left {
  width: 50%;
  padding-right: 12px;
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.infor-container-left h2 {
  margin-bottom: 20px;
}

.infor-container-left p {
  font-size: 16px;
  margin: 15px 0;
}

.infor-container-left-input {
  margin-bottom: 15px;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
}

.infor-container-left-input label {
  margin-bottom: 5px;
}

input {
  border: 1px solid #a7a2a2;
  height: 35px;
  width: 100%;
  padding-left: 6px;
}

.required {
  color: red;
}

.infor-container-button {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;
}

.infor-container-button p {
  display: inline-block;
  font-size: 12px;
}

.infor-container-button span {
  margin-right: 12px;
}

.infor-container-button button {
  height: 35px;
  border: 1px solid black;
  padding: 6px 12px;
  cursor: pointer;
  margin-left: auto; /* Đẩy nút sang phía bên phải */
}

.infor-container-button button:hover {
  background-color: #965b02;
  color: #fff;
}

.infor-container-right {
  flex: 1;
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.infor-container-right h2 {
  margin-bottom: 20px;
}

.infor-container-right table {
  width: 100%;
  border-collapse: collapse;
  text-align: left;
}

.infor-container-right th,
.infor-container-right td {
  padding: 10px;
}

.infor-container-right tfoot td {
  font-weight: bold;
}
.infor_order {
  width: 100%; /* Để bảng chiếm toàn bộ chiều rộng có sẵn */
  border-collapse: collapse;
  margin-left: 0px;
}

.infor_order th,
.infor_order td {
  font-family: 'Roboto', sans-serif;
  padding: 10px;
  text-align: left;
}

.infor_order th {
  white-space: nowrap; /* Đảm bảo tiêu đề không bị gãy dòng */
}

.infor_order td {
  width: auto; /* Tự động điều chỉnh chiều rộng để vừa với nội dung */
}
/*---------CSS SEARCH RESULT-----------------------------*/
body {
  font-family: Roboto, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f9fa;

}

.room-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  padding: 20px;

}

.room-card {
  display: flex;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #fff;
  width: 500px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);


}

.room-card img {
  width: 250px;
  height: auto;
  object-fit: cover;
}

.room-info {
  padding: 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.room-info h3 {
  font-size: 20px;
  margin-bottom: 10px;
  font-weight: bold;

}

.room-info p {
  margin: 5px 0;
  font-size: 14px;
}

.room-info strong {
  font-size: 16px;
}
.room-info .discount {
  color: #e63946; /* Màu chữ đỏ nổi bật */
  font-weight: bold;
  margin-top: 5px;
}

.room-info .availability {
  color: #457b9d; /* Màu chữ xanh nhẹ */
  font-style: italic;
  margin-top: 5px;
}
.room-info i {
  margin-right: 8px; /* Tạo khoảng cách giữa icon và chữ */
  color: #555; /* Màu xám cho icon */
  font-size: 14px;
  vertical-align: middle; /* Căn chỉnh icon với văn bản */
}

button {
  padding: 10px;
  border: none;
  border-radius: 4px;
  font-size: 14px;
  cursor: pointer;
  margin-top: 10px;
}

.book-now {
  background-color: #B88A44;
  color: white;
  width: 220px;
}


.add-cart {
  background-color: #ddd;
  color: black;
}

button:hover {
  opacity: 0.9;
}</style>
<footer>
            <div class="container grid">
              <div class="box">
                <img src="images/logo-2.png" alt="">
                <p>Golden Tree Apartment chào đón bạn với không gian sang trọng, dịch vụ chuyên nghiệp và tiện nghi hiện đại. Chúng tôi cam kết mang đến cho bạn một kỳ nghỉ thoải mái và đáng nhớ với đội ngũ nhân viên tận tâm,
                    sẵn sàng phục vụ mọi nhu cầu của bạn. </p>
        
                <div class="icon">
                  <i class="fa-brands fa-facebook"></i>
                  <i class="fa-brands fa-instagram"></i>
                  <i class="fa-brands fa-twitter"></i>
                  <i class="fa-brands fa-tiktok"></i>
                </div>
              </div>
        
              <div class="box">
                <h2>Links</h2>
                <ul>
                  <li>Company History</li>
                  <li>About Us</li>
                  <li>Contact Us</li>
                  <li>Services</li>
                  <li>Privacy Policy</li>
                </ul>
              </div>
        
              <div class="box">
                <h2>Contact Us</h2>
                <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn. Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi qua các kênh dưới đây.
                    Đội ngũ của Golden Tree Apartmentsẽ phản hồi bạn trong thời gian sớm nhất.   
                </p>
                <i class="fa fa-location-dot"></i>
                <label>120 Hà Huy Tập, Tân Phong, Thành phố Hồ Chí Minh  </label> <br>
                <i class="fa fa-phone"></i>
                <label>01234585997</label> <br>
                <i class="fa fa-envelope"></i>
                <label>golden@gmail.com</label> <br>
              </div>
            </div>
          </footer>
        
          <div class="legal">
            <p class="container">Copyright (c) 2022 Copyright Holder All Rights Reserved.</p>
          </div>
        
        
        
          <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>