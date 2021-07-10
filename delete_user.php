<?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

echo $_SESSION['Login'];
echo $_SESSION['LEVEL'];

if ($_SESSION["LEVEL"] == "Admin") {




    $UserKey = $_GET['id'];

       require ("config.php");
	     $sql = "DELETE FROM users WHERE id ='$UserKey'" ;

	     $result = mysqli_query($conn, $sql);

	      if (mysqli_query($conn, $sql)) {


      	header("Location: manageViewUser.php");
      
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          mysqli_close($conn);




// If the user is not correct level
} else if ($_SESSION["LEVEL"] != "Admin") {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

	}

  ?>
