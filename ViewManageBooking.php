<?php
session_start(); // Start up your PHP Session

//echo $_SESSION["Login"]; //for session tracking purpose, can delete
//$_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
if ($_SESSION["LEVEL"] == "Space Manager"){
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
	function approve() {
		//popup then go to pending page
		alert("Booking Approved");
		
	}
	function deny() {
		//popup then go to pending page
		alert("Booking Denied");
	
	}
  </script>
</head>
<body>

<!--SIDE START-->
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

</div>
<!--SIDE END-->


<!--CONTENT START-->

<div class="content">

  <div class="heading">
    <h3>UTM Space Booking</h3>
		<br>
		<br>
		<br>
  </div>
<?php
	     require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
		 $bid = $_GET['name']; // to get the value of booking id from url
	     $sql = "SELECT * FROM booking WHERE booking_id = '$bid'";
		 $result = mysqli_query($conn, $sql);

	     if (!$result) die("SQL query error encountered :".mysqli_error() );
		 $rows = mysqli_fetch_assoc($result);
		
		  ?>
		  <input type="hidden" id="passV" name="passV" value="" />
  <div class="inner-content">
  
	<form method="post" action="approve.php">
	
		<table style="margin-left: auto; margin-right: auto; padding-bottom: 20px">
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td class="clmn"><h4>Booking ID</h4></td>
				<td><input type="text" name="bookingID" class="txt" value="<?php echo $rows['booking_id'];?>" readonly></td>
			</tr>
			<tr>
				<td class="clmn"><h4>Lecturer Name</h4></td>
				<td><input type="text" name="lecturerName" class="txt" value="<?php echo $rows['lecturer_name'];?>" readonly></td>
				<td class="clmn"><h4>Room Number:</h4></td>
				<td><input type="text" name="roomNo" class="txt" value="<?php echo $rows['roomnumber'];?>" readonly></td>
			</tr>
			<tr>
				<td class="clmn"><h4>Time Slot From:</h4></td>
				<td><input type="time" name="time-start" class="txt" value="<?php echo $rows['time_start'];?>" readonly></td>
				<td class="clmn"><h4>Time Slot To:</h4></td>
				<td><input type="time" name="time-end" class="txt" value="<?php echo $rows['time_end'];?>" readonly></td>

			</tr>
			<tr>
				<td class="clmn"><h4>Status:</h4></td>
			<td>
				<input type="text" name="status" class="txt" value="<?php echo $rows['status'];?>" readonly>
			</td>

			</tr>
			<tr>
				<td class="clmn"><h4>Purpose of booking:</h4></td>
				<td colspan="4">
				<textarea class="txt"name="purpose" id="purpose" cols="65" rows="3"readonly><?php echo $rows['purpose']?></textarea>
				</td>
			</tr>
			<tr>
				<td class="clmn"><h4>Comment*:</h4></td>
				<td colspan="4">
					<textarea name="Comment" cols="65" rows="3" class="txt"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: center">
					<br><br><br>
					
					
					<input class="btn-main" type="submit" id="approve" value="Approve" name="cmd" OnClick="approve()">
					<input class="btn-main" type="submit" id="deny" value="Deny" name="cmd" OnClick="deny()">	
					
				</td>

			</tr>
			<tr>
				<td><H6>Elements marked with * are optional.</H6></td>
			</tr>

		</table>
	</form>
<?php mysqli_close($conn);} 
else echo "Wrong User Level! You are not authorized to view this page" ?>
  </div>
</div>

<!--CONTENT END-->

</body>
</html>
