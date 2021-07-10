<?php
session_start(); // Start up your PHP Session

//echo $_SESSION["Login"]; //for session tracking purpose, can delete
//$_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="admin.css">
  <title>Document</title>
  <script>
		function allowEdit(){
			document.getElementById('mail').disabled = false;
			document.getElementById('phone').disabled = false;
			document.getElementById('name').disabled = false;
			document.getElementById('edit').type = 'hidden';
			document.getElementById('submit').type = 'submit';
		};
		
  </script>
</head>
<body>

<!--SIDE START-->
<?php if ($_SESSION["LEVEL"] == "Admin")
echo '<div class="sidebar">

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
			<div class="nav-link" ">
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

  	</div>'; 
	else if ($_SESSION["LEVEL"] == "Space Manager") echo '
<div class="sidebar">

    <div class="top-icon">
        <a href="My Profile.php"><span><i class="fas fa-user"></i></span></a>
        <a href="#"><span><i class="fas fa-bars"></i></span></a>
        <a href="#"><span><i class="fas fa-cog"></i></span></a>
    </div>
    <div class="navbar">
        <ul>
			  <li>
				<div class="nav-link">
				  <a href="PendingBooking.php"style="color: black">Pending Booking</a>
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

	</div>';
	//add else if for Lecturer
	?>
<!--SIDE END-->


<!--CONTENT START-->

<div class="content">

  <div class="heading">
    <h3>UTM Space Booking</h3>
		<br>
		<br>
		<br>
  </div>
    <div class="inner-content">
      <?php

		$UserKey = $_SESSION["USER"];

      require("config.php");


      $sql="SELECT * FROM Users WHERE username ='$UserKey'";
      $result =mysqli_query($conn, $sql);
      $rows = mysqli_fetch_assoc($result); // rows is array which stores the each record in the users table

       ?>

      <form name="myform" action="edit_profile.php" method="post" onsubmit="return(inputVali());">
        <table style="margin-left: auto; margin-right: auto; padding-bottom: 20px">



          <tr>
				<td class="clmn"><h4>ID:</h4></td>
                <td><input class="txt" name="id" type="text" id="id" value="<?php echo $rows['id']; ?>" style="background: #dddddd;" readonly></td>
         
				<td class="clmn"><h4>Name:</h4></td>
                <td><input type="text" class="txt" name="name" id="name" value="<?php echo  $rows['name'];?>" disabled></td>
			</tr>
         <tr>
              <!-- in order find the specific user to eidt and delete -->


                <td class="clmn"><h4>Username:</h4></td>
                <td><input type="text" class="txt" name="username" value="<?php echo  $rows['username'];?>" style="background: #dddddd;" readonly></td>
                <td class="clmn"><h4>Password:</h4></td>
                <td><input type="password" class="txt" name="password" value="<?php echo $rows['password'];?>" style="background: #dddddd;" readonly></td>
            </tr>

            <tr>

              <td class="clmn"><h4>Staff Matric No:</h4></td>
              <td><input type="text" class="txt" name ="matric" value="<?php echo $rows['smatric']; ?>" style="background: #dddddd;" readonly></td>

                <td class="clmn"><h4>Email:</h4></td>
                <td><input type="email" class="txt" name="mail" id="mail" value="<?php echo $rows['email'];?>" disabled></td>
            </tr>
            <tr>
                <td class="clmn"><h4>Phone:</h4></td>
                <td><input type="text" class="txt" name ="one" id="phone" value="<?php echo $rows['phone']; ?>" disabled></td>
                <td class="clmn"><h4>User Level:</h4></td>
                <td><input type="text" name="Level" class="txt"  value="<?php echo $rows['level']; ?>" style="background: #dddddd;"  readonly>



                </select></td>
            </tr>


            <tr>

                <td colspan="4" style="text-align: center">
                    <br><br><br>
					
                    <input type="button" class="btn-main" value="EDIT" name="edit" id="edit" OnClick="allowEdit()"></input>
                    <input type="hidden" class="btn-main" value="Submit" id ="submit" name="Submit"></input>&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>
      </form>
    </div>
</div>


<!--CONTENT END-->

</body>
</html>