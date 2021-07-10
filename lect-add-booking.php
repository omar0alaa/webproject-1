<?php
session_start(); // Start up your PHP Session

//echo $_SESSION["Login"]; //for session tracking purpose, can delete
//echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
if ($_SESSION["LEVEL"] != "Lecturer") {
    header("Location: index.php"); 
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
    
    <!-- header containing profile pic and search bar  -->
    <div class="header">
        <input type="text" placeholder="Search">
        <img src="imgs/user.png" alt="">
    </div>

    <!-- side bar -->
    <div class="sidebar">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
    </div>

    <!-- main container for the content -->
    <div class="main-container">
        <h2> New Booking</h2>

        <!-- CONTENT GOES HERE  -->
        <div>
            <form action="insert_booking.php" method="POST">

                <label for="purpose">Purpose of booking: </label>
                <textarea name="purpose" id="purpose" cols="40" rows="10"></textarea>
                <label for="time-start">Time Start</label>
                <input type="time" name="time-start" id="time-start" min="">
                <label for="time-end">Time End</label>
                <input type="time" name="time-end" id="time-end" min="">
                <input type="hidden" name="lecturer-name" value="<?php echo $_SESSION["NAME"]?>">
                <!-- The following div is the grid of rooms, should only appear after time selection -->
                <hr>
                <div id="room-choice">
                    <label for="room">Choose Room</label>
                    <!-- grid of rooms, each room is represented by a checkbox: -->
                    <table>
                        <tr>
                            <td>
                                <input type="radio" name="room-choice" id="bk1" value ="bk1">
                                <label for="bk1">BK1</label>
                            </td>
                            <td>
                                <input type="radio" name="room-choice" id="bk2" value ="bk2">
                                <label for="bk2">BK2</label>
                            </td>
                            <td>
                                <input type="radio" name="room-choice" id="bk3" value ="bk3">
                                <label for="bk3">BK3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="room-choice" id="bk5" value ="bk4">
                                <label for="bk5">BK4</label>
                            </td>
                            <td>
                                <input type="radio" name="room-choice" id="bk6" value ="bk5">
                                <label for="bk6">BK5</label>
                            </td>
                            <td>
                                <input type="radio" name="room-choice" id="bk7" value ="bk6">
                                <label for="bk7">BK6</label>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr>
                <input type="submit" value="Apply">
                <input type="reset" value="Reset">
                
            </form>
        </div>
    </div>
    
</body>
</html>