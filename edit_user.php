<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

if ($_SESSION["LEVEL"] == "Admin") { 	//only user level 1 can access
// $UserKey=$_GET['rn'];

 require ("config.php");// connect with the database

  $User = $_POST["username"];
  $Pass= $_POST["password"];
  $Matr= $_POST['matric'];
   $Ema= $_POST["mail"];
  $Pho = $_POST["one"];
  $staffLevel = $_POST["Level"];
  $UserKey = $_POST["id"];

	     $sql = "UPDATE users SET username = '$User', password = '$Pass', smatric = '$Matr', email='$Ema', phone='$Pho',level='$staffLevel' WHERE id ='$UserKey'" ;

	     if (mysqli_query($conn, $sql)) { // if the statement could be run
			echo "<h3>Record updated successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          mysqli_close($conn);
    echo "<p><a href='manageViewUser.php'>Click here to Manage User</a></p>";


// If the user is not correct level
} else if ($_SESSION["LEVEL"] != "Admin") {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }

  ?>
