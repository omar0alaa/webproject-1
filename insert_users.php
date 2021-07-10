<?php

session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

if ($_SESSION["LEVEL"]  == "Admin") {


    require ("config.php");
      $User = $_POST["username"];
      $Pass= $_POST["password"];
      $Name= $_POST['name'];
      $Matr= $_POST['matric'];
       $Ema= $_POST["mail"];
	     $Pho = $_POST["one"];
      $staffLevel = $_POST["Level"];
      $Matr = strtoupper($Matr);
	     // $matricNo = strtoupper($matricNo);  // convert matric to uppercase


	     $sql = "INSERT INTO users(username, password,smatric,name,email,phone,level)
        VALUES ('$User','$Pass','$Matr','$Name','$Ema','$Pho','$staffLevel')" ;

		 if (mysqli_query($conn, $sql)) {
			echo "<h3>New record created successfully</h3>";

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
