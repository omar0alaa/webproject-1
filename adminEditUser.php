

<?php
session_start();
//echo $_SESSION["Login"]; // global variables, for tracking
//echo $_SESSION["LEVEL"];
if($_SESSION["Login"]!="YES")
header("Location: ManageUsers.html"); // if not login
if($_SESSION["LEVEL"]=="Admin"){
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css">
    <script src="inputvalidate.js"></script>
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
                <div class="nav-link" style="background-color: rgb(171,239,210);;padding: 10px;">
                    <a href="adminAddUser.php" style="color: green">EDIT USER</a>
                </div>
            </li>
            <li>
                <div class="nav-link">
                    <a href="manageViewUser.php" style="color: black">Manage User</a>
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


<!--CONTENT START-->

<div class="content">




    <div class="inner-content">
      <?php

      $UserKey = $_GET['id'];

      require("config.php");


      $sql="SELECT * FROM users WHERE id ='$UserKey'";
      $result =mysqli_query($conn, $sql);
      $rows = mysqli_fetch_assoc($result); // rows is array which stores the each record in the users table

       ?>

      <form name="myform" action="edit_user.php" method="post" onsubmit="return(inputVali());">
        <table style="margin-left: auto; margin-right: auto; padding-bottom: 20px">



          <tr>
            <td align="center"><input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>"></td>
          </tr>

         <tr>
              <!-- in order find the specific user to eidt and delete -->


                <td class="clmn"><h4>Username:</h4></td>
                <td><input type="text" class="txt" name="username" value="<?php echo  $rows['username'];?>"></td>
                <td class="clmn"><h4>Password:</h4></td>
                <td><input type="password" class="txt" name="password" value="<?php echo $rows['password'];?>"></td>
            </tr>

            <tr>

              <td class="clmn"><h4>Staff Matric No:</h4></td>
              <td><input type="text" class="txt" name ="matric" value="<?php echo $rows['smatric']; ?>"></td>

                <td class="clmn"><h4>Email:</h4></td>
                <td><input type="email" class="txt" name="mail" value="<?php echo $rows['email'];?>"></td>
            </tr>
            <tr>
                <td class="clmn"><h4>Phone:</h4></td>
                <td><input type="text" class="txt" name ="one" value="<?php echo $rows['phone']; ?>"></td>
                <td class="clmn"><h4>User Level:</h4></td>
                <td><select name="Level" class="txt">
                    <option selected value="<?php echo $rows['level']; ?>">System Admin</option>
                    <option value="<?php echo $rows['level']; ?>">Space Manager</option>
                    <option value="<?php echo $rows['level']; ?>">Lecturer</option>



                </select></td>
            </tr>


            <tr>

                <td colspan="4" style="text-align: center">
                    <br><br><br>
                    <input type="submit" class="btn-main" value="EDIT" name="EDIT"></button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn-main" value="RESET">RESET</button>
                </td>
            </tr>
        </table>
      </form>
    </div>
</div>

<!--CONTENT END-->

</body>
</html>

<?php
}else if($_SESSION["LEVEL"]!="Admin"){
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='index.php'>Go back login</a></p>";

}

 ?>
