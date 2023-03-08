<?php
require 'finance.php';
$sql = "SELECT * FROM submittedforms";
$result = $conn->query($sql);
if ($result->num_rows > 1) {
    while ($row = $result->fetch_assoc()) {
        echo "

        <li>
        <div class='featured-car-card'>
    
          <div class='card-content'>
    
            <div class='card-title-wrapper'>
              <h3 class='h3 card-title'>" . $row['cname'] . " </h3>
            </div>
    
            <ul class='card-list' style='display: block'>
    
              <li class='card-list-item' style='display: block'>
                <span class='card-item-text'>Email : " . $row['email'] . " People</span>
              </li>
    
              <li class='card-list-item'>
                <span class='card-item-text'>Phone Number : " . $row['pnum'] . "</span>
              </li>
    
              <li class='card-list-item'>
    
                <span class='card-item-text'>Address : " . $row['address'] . "</span>
              </li>
    
              <li class='card-list-item'>
    
                <span class='card-item-text'>City : " . $row['city'] . "</span>
              </li>
        
              <li class='card-list-item'>
    
                <span class='card-item-text'>State : " . $row['state'] . "</span>
              </li>

              <li class='card-list-item'>
    
                <span class='card-item-text'>Message : " . $row['mssg'] . "</span>
              </li>
    
            </ul>
    
            <div class='card-price-wrapper'>
                
              <button class='btn fav-btn' onclick='deleteform(\"" . $row['ID'] . "\")'>
              Delete  </button>
            </div>
    
          </div>
    
        </div>
      </li>
    ";

    }
}
$conn->close();
?>