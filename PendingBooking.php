<?php
session_start(); // Start up your PHP Session

//echo $_SESSION["Login"]; //for session tracking purpose, can delete
//echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

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
		// OnClick, execute myFunction
		function myFunction(a) {
			url = '/project/ViewManageBooking.php?name=' + encodeURIComponent(a);
			document.location.href = url;
		}
</script>
</head>
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
				<div class="nav-link" style="background-color: rgb(171,239,210);padding: 10px 0px;">
					<a href="PendingBooking.php" style="color: black ">Pending Booking</a>
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
				require("config.php");
				$sql = "SELECT * FROM Booking WHERE status = 'Pending' ORDER BY roomnumber ";
				$result = mysqli_query($conn, $sql);

				if (!$result) die("SQL query error encountered :".mysqli_error($conn) );


				if (mysqli_num_rows($result) > 0) { ?>
    <div class="manageuser-content">
        <table>
			
            <tr style="background-color: #abefd2">
                <th>ID</th>
                <th>Room Name</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
			<?php			
						
				// output data of each row
				while($rows = mysqli_fetch_assoc($result)) {
				if ($rows['status']=="Pending"){
			?>
			<tr>
				<td><?php echo $rows['booking_id']; ?></td>
				<td><?php echo $rows['roomnumber']; ?></td>
				<td><?php echo $rows['lecturer_name']; ?></td>
				<td><?php echo $rows['status']; ?></td>
				<td><button class="btn-main" onClick="myFunction('<?php echo $rows['booking_id']; ?>')">VIEW</button></td>
			</tr>
           
			<?php }}
		
			}
		else {
			echo "<tr><h3>There are no Pending Applications</h3> </tr>";
			}
	   ?>
        </table>
		<?php mysqli_close($conn);} 
else echo "Wrong User Level! You are not authorized to view this page" ?>
    </div>
</div>

<!--CONTENT END-->

</body>
</html>