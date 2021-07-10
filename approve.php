<?php
	session_start();
	require ("config.php");
	$a = 'Approved';
	$b = 'Denied';
	$cmd=$_POST["cmd"];
	$bid = $_POST['bookingID'];
	$c = $_POST['Comment'];
	if($cmd == "Approve"){
		$sql = "UPDATE booking SET status ='$a', comment='$c' WHERE booking_id = '$bid'";
		mysqli_query($conn, $sql);
		echo "Booking Approved";
	}
	if($cmd == "Deny"){
		$sql = "UPDATE booking SET status ='$b', comment='$c' WHERE booking_id = '$bid'";
		mysqli_query($conn, $sql);
		echo "Booking Denied";
	}
	header("Location: PendingBooking.php");
?>