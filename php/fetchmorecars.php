<?php
require 'database.php';
$offset = 18;
$sql = "SELECT * FROM carInfo LIMIT 0, $offset";
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
$conn->close();
?>