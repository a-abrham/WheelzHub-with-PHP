<?php
session_start();
// Redirect user to login page if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: index.php#login');
  exit;
}
?>
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
  <header class="header" id="header" style="background-color:#21262d">
    <nav>
      <a href="adminpanel.php" class="logo">WheelzHub</a>
      <img id="mobCar" width='10' height='10' src="icons/formmen.svg" onclick="submittedforms()">
      <img id="mobMenu" width='10' height='10' src="icons/logout.svg" onclick="logout()">

      <div class="menu">
        <ul>
          <li><a href="#addcar">Add Car</a></li>
          <li><a href="#create_account">Add Admin</a></li>
          <li><a href="#" onclick="submittedforms()">Submitted forms</a></li>
          <li><a href="index.php#login" onclick="logout()">Log Out</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="login-form-container" id="addcar">
    <form action="php/addcar.php" method="POST" enctype="multipart/form-data">
      <h3>ADD car</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input type="text" name="carTitle" id="" placeholder="Car Title" class="box" required pattern="^[A-Za-z ]+$">
      <input type="file" name="image1" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="file" name="image2" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="file" name="image3" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="number" name="people" id="" placeholder="People" class="box" required>
      <input type="text" name="fuilType" id="" placeholder="Fule Type" class="box" required pattern="^[A-Za-z ]+$">
      <input type="text" name="trs" id="" placeholder="Transmission" class="box" required pattern="^[A-Za-z ]+$">
      <input type="number" name="speed" id="" placeholder="Horse Power" class="box" required>
      <input type="number" name="rentPrice" id="" placeholder='Rental Price' class="box" required>
      <input type="number" name="salesPrice" id="" placeholder="Sales Price" class="box" required>
      <input type="number" name="year" id="" placeholder="Year" class="box" required>
      <input type="submit" value="Upload" name="uplaod" class="btn-form">
    </form>
  </div>

  <div class="login-form-container" id="Edit">
    <form action="php/editcar.php" method="POST" enctype="multipart/form-data">
      <h3>Edit car Detail</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input type="text" name="carTitle" id="" placeholder="Car Title" class="box" required pattern="^[A-Za-z ]+$">
      <input type="file" name="image1" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="file" name="image2" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="file" name="image3" id="" class="box" required accept=".jpg,.png" pattern=".*\.(jpg|png)">
      <input type="number" name="people" id="" placeholder="People" class="box" required>
      <input type="text" name="fuilType" id="" placeholder="Fule Type" class="box" required pattern="^[A-Za-z ]+$">
      <input type="text" name="trs" id="" placeholder="Transmission" class="box" required pattern="^[A-Za-z ]+$">
      <input type="number" name="speed" id="" placeholder="Horse Power" class="box" required>
      <input type="number" name="rentPrice" id="" placeholder='Rental Price' class="box" required>
      <input type="number" name="salesPrice" id="" placeholder="Sales Price" class="box" required>
      <input type="number" name="year" id="" placeholder="Year" class="box" required>
      <input type="submit" value="Upload" name="uplaod" class="btn-form">
    </form>
  </div>


  <div class="login-form-container" id="updated">
    <form>
      <h3>Done</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>Updated successfuly!</p>
    </form>
  </div>

  <div class="login-form-container" id="done-creating-acc">
    <form>
      <h3>Done</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>Admin Account created successfuly!</p>
      <p>Share the password and username only for your admin</p>
    </form>
  </div>

  <div class="login-form-container" id="done-adding">
    <form>
      <h3>Done</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <p>The car has been successfully added!</p>
    </form>
  </div>

  <section class="section featured-car" id="featured-car" style="background-color: #21262d; height: 100%;">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="h2 section-titl" style="color: snow;" id="content">EDIT CARS</h2>
      </div>
      <ul class="featured-car-list">
        <!-- Contents will be here-->
        <?php
        require 'php/database.php';
        $sql = "SELECT * FROM carInfo ";
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
                      <a>" . $row['carTitle'] . " </a>
                        
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
  
                      <a href='#Edit'><button class='btn fav-btn' onclick='editcar(\"" . $row['ID'] . "\")'>
                      Edit</button></a>
                        
                      <button class='btn fav-btn' onclick='deleteCar(\"" . $row['ID'] . "\")'>
                      Delete</button>
                    </div>
  
                  </div>
  
                </div>
              </li>
  
                ";
          }
        }
        $conn->close();
        ?>
      </ul>
    </div>
  </section>

  <div class="login-form-container" id="create_account">
    <form action="php/login.php" method="POST">
      <h3>ADD ADMIN</h3><a class="close" href="#" onclick="closelogin()">&times;</a>
      <input type="text" placeholder="First name" class="box" name="fname" required pattern="^[A-Za-z]+$">
      <input type="text" placeholder="Last name" class="box" name="lname" required pattern="^[A-Za-z]+$">
      <input type="email" placeholder="Email" class="box" name="email" required
        pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$">
      <input type="password" placeholder="Password" class="box" name="password" required>
      <input type="submit" value="Sign up" name="create" class="btn-form">
    </form>
  </div>

  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>