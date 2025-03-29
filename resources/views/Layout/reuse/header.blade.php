
<style>
 @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Roboto', sans-serif;

}

h1, h2 {
  font-family: 'Roboto', sans-serif;

  font-weight: 400;
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}

.flex {
  display: flex;
}

.flex_space {
  display: flex;
  justify-content: space-between;
}

button {
  border: none;
  background: none;
  outline: none;
  transition: 0.5s;
  cursor: pointer;
}

.primary-btn {
  padding: 0px 20px;
  background: #B88A44;
  font-weight: bold;
  color: white;
}
.primary-btn:hover{
  background-color: #965b02;
    color: #fff;
}

.secondary-btn {
  padding: 15px 40px;
  background: none;
  border: 2px solid white;
  font-weight: bold;
  color: white;
}
.secondary-btn:hover{
  background-color: #a09688;
    color: #fff;
}
.container {
  max-width: 85%;
  margin: auto;
}

/*--------header---------*/
header {
  height: 10vh;
  line-height: 10vh;
  padding: 0 20px;
 
}

header img {
  margin: 20px 0;
}

header ul {
  display: inline-block;
}

header ul li {
  display: inline-block;
  text-transform: uppercase;
}

header ul li a {
  color: #000;
  margin: 0 10px;
  transition: 0.5s;
}

header ul li a:hover {
  color: #B88A44;
}

header i {
  margin: 0 20px;
}

header button {
  padding: 13px 40px;
}

header .navlinks span {
  display: none;
}

@media only screen and (max-width:768px) {
  header ul {
    position: absolute;
    top: 100px;
    left: 0;
    width: 100%;
    height: 100vh;
    background: #B88A44;
    overflow: hidden;
    transition: max-height 0.5s;
    text-align: center;
    z-index: 9;
  }

  header ul li {
    display: block;
  }

  header ul li a {
    color: rgb(24, 22, 22);
  }

  header i {
    color: black;
  }

  header .navlinks span {
    color: bac;
    display: block;
    cursor: pointer;
    line-height: 10vh;
    font-size: 25px;
  }
}

/*--------header---------*/

/*--------book---------*/
.grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 20px;
}

input {
  outline: none;
  border: none;
  width: 100%;
  
}

.book {
  padding: 40px 0;
  background: #3a3434;
  color: #fff;
}

h1 {
  font-family: 'Roboto', sans-serif;
}

.book h1 {
  font-size: 28px;
}

.book h1 span {
  color:#B88A44;
}

.book input {
  padding: 20px;
  text-align: center;
  color: #1d1b1b
}

.book input:nth-last-child(1) {
  background: #fff;
  color: #292727;
}

.form button {
  margin-top: 0px;
}
.table-book {
  width: 100%; 
  border-collapse: collapse;
  margin-left: 90px;
}

.table-book th, 
.table-book td {
  font-family: 'Roboto', sans-serif;
  text-align: center;
  padding: 15px;
 
}
.table-book td select {
  width: 150px; 
  padding: 10px; 
  font-family: 'Roboto', sans-serif;
}
.table-book td input[type="number"] {
 width: 150px;
}

.grid button:hover {
  background-color: #965b02;
  color: #fff;
}
.table-book td .errormessage {
  margin-top: 0px;
  color: red;
  font-size: 140px;
  font-family: 'Roboto', sans-serif;
  display: none; /* Ẩn mặc định */
  background-color: #fc0303;
}

.table-book .error-message.active {
  color: red;
  font-weight: bold;
  display: block; /* Đảm bảo hiển thị */
  margin-top: 10px;
  z-index: 9999; /* Increased z-index for better visibility */
  background-color: #fff; /* If hidden behind other elements, a background helps */
  padding: 5px;
}
</style>
<header><div class="content flex_space">
      <div class="logo">
        <span>GOLDEN TREE APARTMENT</span>
      </div>
      <div class="navlinks">
        <ul id="menulist">
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#rooms">Rooms</a></li>
          <li>
            <a href="#" title="Giỏ hàng">
              <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </li>
          <li>
            <a  href="#" ><button class="primary-btn">Login</button></a>
          </li>
        </ul>
      </div>
    </div></header>


