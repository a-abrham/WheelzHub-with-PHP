<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WheelzHub</title>

  <link rel="icon" type="image/x-icon" href="icons/favicon/favicon.png">
  <link rel="stylesheet" href="css/landing.css">
  <link rel="stylesheet" href="css/featured.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/forms.css">
</head>

<body>
  <header class="header" id="header">
    <nav>
      <a href="index.php" class="logo">WheelzHub</a>
      <img id="mobMenu" width='10' height='10' src="icons/mobmenu.svg">
      <img id="mobCar" width='10' height='10' src="icons/mobcart.svg" onclick="viewCart()">
      <div class="menu">
        <ul>
          <li><a href="#finance" onclick="disable()">Financing</a></li>
          <li><a href="#section feature">our solutions</a></li>
          <li><a href="#featured-car">featured cars</a></li>
          <li><a href="#about-us">about us</a></li>
        </ul>
        <a href="#" class="btnn" id="btnn" onclick="viewCart()">Check Out</a>
      </div>
    </nav>

    <!-- Cart-->
    <div class="cart-holder">
      <h2 class="cart-tit">
        Your cart
      </h2>
      <!-- Content-->
      <div class="card-content">

      </div>
      <!-- Total -->
      <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">0 ETB</div>
      </div>
      <a href="#checkout" onclick="checkout()"><button type="button" class="btn-buy">Check Out</button></a>
      <a class="close" href="#featured-car" id="close-cart">&times;</a>
    </div>
  </header>

  <section class="section service" style="background-image: url(./images/Main-bannerr.jpg);">
    <div class="container">

      <h2 class="h2 section-title">
        "From sales to rental, we've got you covered."
      </h2>

      <ul class="grid-list">
        <li>
          <div class="service-card">
            <div class="card-icon">
              <img src="icons/call.svg" aria-hidden="true" width='30' height='30'>
            </div>
            <h3 class="h4 card-title">24/7 Support</h3>
            <p class="card-text">
              Contact us anytime for fast support - we're here to answer questions, resolve issues, and provide
              assistance day or night, weekdays or weekends.
            </p>
          </div>
        </li>

        <li>
          <div class="service-card">
            <div class="card-icon">
              <img src="icons/secure.svg" aria-hidden="true" width='30' height='30'>
            </div>
            <h3 class="h4 card-title">Secure Payments</h3>
            <p class="card-text">
              Our top priority is protecting your financial data. With our secure payment system and advanced
              encryption, shop online with confidence and safety.
            </p>
          </div>
        </li>

        <li>
          <div class="service-card">
            <div class="card-icon">
              <img src="icons/daily.svg" aria-hidden="true" width='30' height='30'>
            </div>
            <h3 class="h4 card-title">Daily Updates</h3>
            <p class="card-text">
              Our inventory is regularly updated with the latest
              cars for sale or rental. Find the perfect vehicle for your needs with ease, and enjoy riding your vehicle
            </p>
          </div>
        </li>

        <li>
          <div class="service-card">
            <div class="card-icon">
              <img src="icons/market.svg" aria-hidden="true" width='30' height='30'>
            </div>
            <h3 class="h4 card-title">Market Research</h3>
            <p class="card-text">
              Get valuable insights on car buying or renting.
              Stay informed with our market research and make the best choice with our in-depth analysis.
            </p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="section feature" aria-labelledby="feature-label" id="section feature">
    <div class="container">

      <figure class="feature-banner">
        <img src="./images/last.png" width="508" height="450" alt="feature banner" class="w-1000">
      </figure>

      <div class="feature-content">
        <p class="section-subtitle" id="feautre-label">Our Solutions</p>
        <p class="section-text">
          We understand the challenges of buying or renting a car and have developed tailored solutions to make the
          process easier and more convenient.
        </p>
        <ul class="feature-list">
          <li>
            <div class="feature-card">
              <div class="card-icon">
                <img width='10' height='10' src="icons/check.svg" aria-hidden="true">
              </div>
              <span class="span">
                A wide selection of vehicles for sale and rent.
              </span>
            </div>
          </li>
          <li>
            <div class="feature-card">
              <div class="card-icon">
                <img width='10' height='10' src="icons/check.svg" aria-hidden="true">
              </div>
              <span class="span">
                Financing options for customers who need help purchasing a car.
              </span>
            </div>
          </li>
          <li>
            <div class="feature-card">
              <div class="card-icon">
                <img width='10' height='10' src="icons/check.svg" aria-hidden="true">
              </div>
              <span class="span">
                Affordable prices for both sales and rentals.
              </span>
            </div>
          </li>
          <li>
            <div class="feature-card">
              <div class="card-icon">
                <img width='10' height='10' src="icons/check.svg" aria-hidden="true">
              </div>
              <span class="span">
                Explore our wide range of cars for sale or rent.
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section featured-car" id="featured-car">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="h2 section-titl">Featured cars</h2>
      </div>
      <ul class="featured-car-list">
        <!-- Contents will be here-->
        <?php
        require 'php/database.php';
        $sql = "SELECT * FROM carInfo LIMIT 6";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
                <li>
                <div class='featured-car-card'>
  
                  <figure class='card-banner'>
                    <img src='" . $row['image1'] . "' width='440' height='300' class='w-100'>
                  </figure>
  
                  <div class='card-content'>
  
                    <div class='card-title-wrapper'>
                      <h3 class='h3 card-title'>
                        <a href='#viewer' onclick='viewcar(\"" . $row['carTitle'] . "\", \"" . $row['image1'] . "\", \"" . $row['image2'] . "\", \"" . $row['image3'] . "\")'> " . $row['carTitle'] . " </a>
                        
                      </h3>
  
                      <data class='year' value='2021'>" . $row['year'] . "</data>
                    </div>
  
                    <ul class='card-list'>
  
                      <li class='card-list-item'>
                      <img src='icons/pass.svg'  width='20' height='20'>
                        <span class='card-item-text'>" . $row['people'] . " People</span>
                      </li>
  
                      <li class='card-list-item'>
                      <img src='icons/fule.svg'  width='20' height='20'>
                        <span class='card-item-text'>" . $row['fuilType'] . "</span>
                      </li>
  
                      <li class='card-list-item'>
                      <img src='icons/speed.svg'  width='20' height='20'>
  
                        <span class='card-item-text'>" . $row['speed'] . "</span>
                      </li>
  
                      <li class='card-list-item'>
                      <img src='icons/tra.svg'  width='20' height='20'>
  
                        <span class='card-item-text'>" . $row['trs'] . "</span>
                      </li>
  
                    </ul>
  
                    <div class='card-price-wrapper'>
  
                      <p class='card-price'>
                        <strong>" . $row['rentPrice'] . "</strong> / day
                      </p>
                      
                      <p class='card-price'>
                        <strong>ETB  " . $row['salesPrice'] . "</strong>
                      </p>
  
                      <button class='btn fav-btn' onclick='addtoCart(\"" . $row['carTitle'] . "\", \"" . $row['rentPrice'] . "\", \"" . $row['image1'] . "\")'>
                      <img src='icons/hrt.svg'  width='20' height='15'>  </button>
  
                    </div>
  
                  </div>
  
                </div>
              </li>
  
                ";

          }
        }
        ?>
      </ul>

      <div class="title-wrapper">
        <h2 class="h2 section-title"></h2>

        <a href="#about-us" class="featured-car-link" id="loadFeaturedCars">
          <span>View more</span>
          <img src="icons/arrow.svg" aria-hidden="true" width='13' height='10'>
        </a>
      </div>

    </div>
  </section>

  <!-- car gallery viewer-->

  <div class="login-form-container" id="viewer">
    <div class="form">
      <h3>Car Details</h3><a class="close" href="#featured-car" id="close-featured">&times;</a>
    </div>
  </div>

  <!-- LOGIN-->

  <div class="login-form-container" id="login">

    <form action="php/login.php" method="POST">
      <h3>user login</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input name="email" type="email" placeholder="Email" class="box" required
        pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$">
      <input name="password" type="password" placeholder="Password" class="box" required>
      <input name="login" type="submit" value="login" class="btn-form">
    </form>
  </div>

  <div class="login-form-container" id="checkout">
    <form>
      <h3>Done</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>Your order has been recorded!</p>
    </form>
  </div>

  <div class="login-form-container" id="incorrect-pass">
    <form action="php/login.php" method="POST">
      <h3>Incorrect Password</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input name="email" type="email" placeholder="Email" class="box" required
        pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$">
      <input name="password" type="password" placeholder="Password" class="box" required>
      <input name="login" type="submit" value="login" class="btn-form">
    </form>
  </div>


  <div class="login-form-container" id="incorrect-acc">
    <form action="php/login.php" method="POST">
      <h3>Account Not Found</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input name="email" type="email" placeholder="Email" class="box" required
        pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$">
      <input name="password" type="password" placeholder="Password" class="box" required>
      <input name="login" type="submit" value="login" class="btn-form">
    </form>
  </div>

  <div class="login-form-container" id="finance">
    <form action="php/finance.php" method="POST">
      <h3>Let Us Know</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input name="cname" type="text" placeholder="Company Name" class="box" required pattern="^[A-Za-z ]+$">
      <input name="email" type="email" placeholder="Email" class="box" required
        pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$">
      <input name="pnum" type="tel" placeholder="Phone Number" class="box" required>
      <input name="address" type="text" placeholder="Address" class="box" required>
      <input name="city" type="text" placeholder="City" class="box" required pattern="^[A-Za-z ]+$">
      <input name="state" type="text" placeholder="State" class="box" required pattern="^[A-Za-z ]+$">
      <input type="hidden" name="date" value="getdate();">
      <textarea name="message" class="box" placeholder="Message"></textarea>

      <input name="finance" type="submit" value="Submit" class="btn-form">
      <p>What is this for ? <a href="#about-finance">Click here to know why</a> </p>
    </form>
  </div>

  <div class="login-form-container" id="done-submitting">
    <form>
      <h3>Thank you!</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>Your request has been received and is currently being processed. Please be
        patient while we review your information and respond to you as soon as possible.
      </p>
    </form>
  </div>

  <div class="login-form-container" id="about-finance">
    <form>
      <h3>Financing</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>Dear valued customer, we are thrilled to offer you the opportunity to receive a discount on your next purchase.
        By submitting your information through our form, you can receive up to 10% off on your orders, making your
        shopping experience more cost-effective.
        This is a limited-time offer, so don't miss your chance to save! In addition, you'll also be kept informed of
        exclusive offers, promotions, and updates from our company.
        Submit the form today to take advantage of these amazing benefits!</p>
      <p>Do you understand us? <a href="#finance">Fill the form now</a> </p>
    </form>
  </div>


  <footer class="footer">
    <div class="container">
      <div class="row" id="about-us">
        <div class="footer-col">
          <h4>About us</h4>
          <ul>
            <li style="color:darkgray">WheelzHub is a leading digital marketplace and solutions provider for the
              automotive industrythat connects car shoppers with sellers. Launched in 2023 and headquartered in Bahir
              Dar, Ethiopia.</li>
            <div class="footer-col">
              <div class="social-links">
                <a href="#"><img src="icons/insta.svg" aria-hidden="true" width='30' height='10'></a>
                <a href="#"><img src="icons/fb.svg" aria-hidden="true" width='30' height='10'></a>
                <a href="#"><img src="icons/tw.svg" aria-hidden="true" width='30' height='10'></a>
                <a href="#"><img src="icons/li.svg" aria-hidden="true" width='30' height='10'></a>
              </div>
            </div>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Quick links</h4>
          <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Terms and conditions</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Contact us</h4>
          <ul>
            <li><a href="https://www.google.com/maps/place/Bahir+Dar,+Amhara,+Ethiopia/" target="_blank">Bahir Dar,
                Amhara, Ethiopia</a></li>
            <li><a href="tel:+251918764531" target="_blank">+251918764531</a></li>
            <li><a href="mailto:sales@wheelzhub.com" target="_blank">sales@wheelzhub.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll to top button -->
  <button id="myBtn"><img src='icons/top.svg' class="cart-remove" width='15' height='25'>
  </button>

  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>