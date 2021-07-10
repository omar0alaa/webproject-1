<?php
$host = "localhost";
$dbname ="root";
$dbpass="";

$conn = mysqli_connect($host,$dbname,$dbpass);
$mysql = "CREATE DATABASE test";
$result = mysqli_query($conn,$mysql);
if($result){

  echo "<h3>Created Successfully!</h3>";
}else{

  echo "Error!: " .mysqli_error($conn) ;
}
mysqli_close($conn);
 ?>
