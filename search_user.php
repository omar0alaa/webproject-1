
<?php
//start tracking

session_start();
echo $_SESSION["Login"];
echo $_SESSION["LEVEL"]; // globle varibles to trace

if($_SESSION["Login"]!="YES")
header("Location:index.php");
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    if ($_SESSION["LEVEL"] == "Admin") {
    // connect to database
    require("config.php");
    // get input box value
    $keyword = $_POST['kyword'];

    //sql statement
    $sql = "SELECT * FROM users WHERE username LIKE '%$keyword%' OR level LIKE '%$keyword%'";

    // run the sql
    $result = mysqli_query($conn, $sql); // array
   // rows

    if(mysqli_num_rows($result)>0){ // rows

     ?>

     <h3>Search Result</h3>
     <table style="padding-bottom: 20px">


     <!-- Print table heading -->
     <tr style="background-color: #abefd2">
       <th align="center">Name</th>
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
   <td><?php echo $rows['smatric']; ?></td>
   <td><?php echo $rows['email']; ?></td>
   <td><?php echo $rows['phone']; ?></td>
   <td><?php echo $rows['level']; ?></td>
 </tr>

 <?php  }?>

</tables>
<?php
}else{
  echo "<h3>No User Found</h3>";
  mysqli_close($conn);
}
 ?>

 <?php
}else if ($_SESSION["LEVEL"] != "Admin") {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }


  ?>
  </body>
</html>
