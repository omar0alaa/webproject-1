<?php 

session_start();
if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
if ($_SESSION["LEVEL"] != "Lecturer")
header("Location: index.php");
			
require ("config.php");
$purpose = $_POST["purpose"];
$timeStart= $_POST["time-start"];
$timeEnd= $_POST["time-end"];
$lecturerName= $_POST["lecturer-name"];
$room= $_POST["room-choice"];
$status = "Pending";
$comments = NULL; 

require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

$sql = "INSERT INTO booking (lecturer_name, roomnumber,status,time_start,time_end,comment,purpose) 
VALUES ('$lecturerName', '$room', '$status', '$timeStart', '$timeEnd', '$comments','$purpose')" ;


if (mysqli_query($conn, $sql)) {

header("Location:lect-manage-bookings.php");

} else {
		mysqli_close($conn);
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}





?>

 
  
  