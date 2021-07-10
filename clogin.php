<?php
session_start(); // Start up your PHP Session


require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form
$myusername=$_POST["username"];
$mypassword=$_POST["password"];



$sql="SELECT username, password,name, level FROM users WHERE username='$myusername' && password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"]; // read the username colum in database
$user_id=$rows["password"]; // read the password column in database
$user_level=$rows["level"]; // read the level column in database
$user_realname=$rows["name"]; // read the level column in database

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Add user information to the session (global session variables)
$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] =$user_level;
$_SESSION["NAME"] =$user_realname;

echo "<h2>You are now logged in as ".$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h2>";
if ($_SESSION["LEVEL"] == "Admin"){header("Location: adminAddUser.php");}
if ($_SESSION["LEVEL"] == "Space Manager"){header("Location: PendingBooking.php");}
if ($_SESSION["LEVEL"] == "Lecturer"){header("Location: lect-add-booking.php");}// Add your file name here for landing page

//if wrong username and password
} else {

$_SESSION["Login"] = "NO";
header("Location: index.php");
}

mysqli_close($conn);

?>
