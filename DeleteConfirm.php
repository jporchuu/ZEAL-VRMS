<?php
session_start();
?>
<html>
<head>
    <title>Vehicle Successfully Removed</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
<div class="topnav">
    <img src='assets/img/zeal2.png' width=10%>
    <a id='topNavBtn' href='Login.html' class='button'>LOG-OUT</a>
    <a id='topNavBtn' href='ReturnVehicle.php' class='button'>Return a Vehicle</a>
    <a id='topNavBtn' href='RentVehicle.php' class='button'>Rent a Vehicle</a>
    <a id='topNavBtn' href='VehicleList.php' class='button'>Vehicle Database</a>
    <a id='topNavBtn' href='Menu.php' class='button'>Menu</a>
</div>
<center>
    <div id="check">
    <?php
    // Verify mySQL
    $sqlConnect = mysqli_connect("localhost","root","");
    if(!$sqlConnect) {
        die();
    }

    // Verify Database
    $selectDB = mysqli_select_db($sqlConnect,'VehicleDatabase');
    if(!$selectDB) {
        die("Can't find the database!".mysqli_error());
    }

    $deleteThis = $_SESSION['deleteThis'];
    $vehicleType = $_SESSION['vType'];

    if ($vehicleType == 'car') $removeData = "DELETE FROM CarDetails WHERE VehicleName = '$deleteThis'";
    else if ($vehicleType  == 'vanSUV') $removeData = "DELETE FROM vanSUVDetails WHERE VehicleName = '$deleteThis'";
    else if ($vehicleType  == 'motorC') $removeData = "DELETE FROM motorCDetails WHERE VehicleName = '$deleteThis'";

    mysqli_query($sqlConnect, $removeData);

    ?>
    <h2>Vehicle Successfully Deleted</h2> <br>
    <a href='VehicleList.php' class='button'> View Database </a> <br> <br> <br> <br>
    <a href='Menu.php' class='button'><b>Back to Menu</b></a>
    </div>
</center>
</body>
</html>
