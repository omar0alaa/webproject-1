<?php
session_start(); // Start up your PHP Session

//echo $_SESSION["Login"]; //for session tracking purpose, can delete
//echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");

if ($_SESSION["LEVEL"] == "Admin") {   //only user with access level 1 and 2 can view

?>

	<html>
	<head><title>MANAGE USER PAGE</title><head>
	<meta charset="UTF-8">
	<meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="admin.css">


	<body>

	<!--SIDE START-->
	<div class="sidebar">

	  <div class="top-icon">
	    <a href="#"><span><i class="fas fa-user"></i></span></a>
	    <a href="#"><span><i class="fas fa-bars"></i></span></a>
	    <a href="#"><span><i class="fas fa-cog"></i></span></a>
	  </div>
	  <div class="navbar">
	    <ul>

	      <li>
	        <div class="nav-link" >
	          <a href="adminAddUser.php" style="color: black">ADD USER</a>
	        </div>
	      </li>
	      <li>
	        <div class="nav-link" style="background-color: rgb(171,239,210);;padding: 10px;">
		          <a href="manageViewUser.php"style="color: green" >MANAGE USER</a>
	        </div>
	      </li>
				<li>
						<div class="nav-link" >
								<a href="viewAllUsers.php" style="color: black">View User</a>
						</div>
				</li>
			<li>
        <div class="nav-link">
          <a href="view_booking.php" style="color: black">All Booking</a>
        </div>
      </li>
	      <li>
        <div class="nav-link">
          <a href="logout.php" style="color: black">Logout</a>
        </div>
      </li>
	    </ul>
	  </div>

	</div>
	<!--SIDE END-->
	<div class="content">

		<div class="heading">
				<h3>UTM Space Booking</h3>
				<form action="search_user.php" method="post">
				<input type="text" name="kyword" placeholder="Enter for search" class="txt-search">
				<button type="submit"  class="btn">Search</button>
			</form>
				<p></p><p></p>
		</div>
 <div class="manageuser-content">

		<?php

	     require ("config.php"); //connect database

	   $sql = "SELECT * FROM users";
		 $result = mysqli_query($conn, $sql);//$sql statement is executing




		 if (mysqli_num_rows($result) > 0) { 	?>

		<!-- Start table tag -->
		<table>

		<!-- Print table heading -->
		<tr style="background-color: #abefd2">
		<th align="center">Name</th>
		<th align="center">Staff Matric.No</th>
		<th align="center">Email</th>

		<th align="center">Telephone</th>
		<th align="center">Staff Type</th>
		<?php if ($_SESSION["LEVEL"] =="Admin") {?>
		<th align="center"><strong>Action</strong></th>

		<?php } ?>

		</tr>

		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {

		?>

	    <tr>
				<!-- get data from database -->
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['smatric']; ?></td>
			<td><?php echo $rows['email']; ?></td>
			<td><?php echo $rows['phone']; ?></td>
			<td><?php echo $rows['level']; ?></td>


		<?php if ($_SESSION["LEVEL"] == "Admin") {?>
			
			<td id="dialog"><a href="adminEditUser.php?id=<?php echo $rows['id'];?>"><input  type="submit" class="btn-main" value="EDIT"></a>&nbsp;&nbsp;&nbsp;
					<a href="delete_user.php?id=<?php echo $rows['id'];  ?>"  onclick="return confirmde()"><input  type="submit" class="btn-main" value="DELETE"></a></td>

		</tr>

		<?php }

			}
		} else {
			echo "<h3>There are no user records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>

	    </table>

</div>
</div>

 	<?php } // If the user is not correct level
	else if ($_SESSION["LEVEL"] != "Admin") {

	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='index.php'>Go back to login page</a></p>";
   }

  ?>
	<script>


	function confirmde(){
	  return confirm('Are you sure you delete the user record?');
	}


	</script>

	</body>
	</html>
