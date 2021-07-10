
<?php
//start tracking

session_start();
//echo $_SESSION["Login"];
//echo $_SESSION["LEVEL"]; // globle varibles to trace

if($_SESSION["Login"]!="YES")
header("Location:index.php");
if ($_SESSION["LEVEL"] == "Admin") {
 ?>

<html lang="en" dir="ltr">
  <head>
	<meta charset="UTF-8">
	<meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="admin.css">

  </head>
  <body>
    <div class="sidebar">

  	  <div class="top-icon">
  	    <a href="My Profile.php"><span><i class="fas fa-user"></i></span></a>
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
  	        <div class="nav-link" >
  		          <a href="manageViewUser.php"style="color: black" >MANAGE USER</a>
  	        </div>
  	      </li>
		  <li>
			<div class="nav-link" style="background-color: rgb(171,239,210);;padding: 10px;">
					<a href="viewAllUsers.php" style="color: green">View User</a>
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
	<div class="content">
	<div class="heading">
				<h3>UTM Space Booking</h3>
				<form action="search_user.php" method="post">
				<input type="text" name="kyword" placeholder="Enter for search" class="txt-search">
				<button type="submit"  class="btn">Search</button>
			</form>
				<p></p><p></p>
		</div>
    <?php
    
    // connect to database
    require("config.php");
    // get input box value

    //sql statement
    $sql = "SELECT * FROM users";

    // run the sql
    $result = mysqli_query($conn, $sql); // array
   // rows

    if(mysqli_num_rows($result)>0){ // rows

     ?>

     

   		 <div class="manageuser-content">
     <table style="padding-bottom: 20px">


     <!-- Print table heading -->
     <tr style="background-color: #abefd2">
       <th align="center">Name</th>
       <th align="center">Password</th>
       <th align="center">Staff Matric.No</th>
       <th align="center">Email</th>
       <th align="center">Telephone</th>
       <th align="center">Staff Type</th>
    </tr>

    <?php
    // start looping to print out the retrived records
    while($rows = mysqli_fetch_assoc($result)){
   ?>
   <tr>
     <!-- get data from database -->
   <td><?php echo $rows['username']; ?></td>
    <td><?php echo $rows['password']; ?></td>
   <td><?php echo $rows['smatric']; ?></td>
   <td><?php echo $rows['email']; ?></td>
   <td><?php echo $rows['phone']; ?></td>
   <td><?php echo $rows['level']; ?></td>
 </tr>

 <?php  }?>

</tables>
</div>
</div>

 <?php
}}else{

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='manageViewUser.php'>Go back to Manage User page</a></p>";

   }


  ?>
  </body>
</html>
