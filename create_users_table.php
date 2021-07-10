<?php

// RUN first, to create the table
require("config.php");
$sql ="CREATE TABLE users(
  id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  name VARCHAR(200) NOT NULL,
  password VARCHAR(50) NOT NULL,
  smatric VARCHAR(15) NOT NULL,
  email VARCHAR(60) NOT NULL,
  phone INT(13),
  level VARCHAR(20) NOT NULL

)";
if(mysqli_query($conn,$sql)){
  echo "<h3>Table users created successfully</h3>";
}else{
  echo "Error creating table" .mysqli_error($conn);
}
mysqli_close($conn);
 ?>