<?php
 
require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE booking(
		booking_id NOT NULL AUTO_INCREMENT PRIMARY,
		lecturer_name varchar(100),
		roomnumber varchar(8), 
		status varchar(30),
		time_start time,
		time_end time,
		purpose varchar(600),
		comment varchar(600) )";
 

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table booking created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>