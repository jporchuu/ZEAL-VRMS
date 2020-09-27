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
    <img src='assets/img/zeal2.png' width=8%>
    <a id='topNavBtnOUT' href='Login.html' class='button'>LOG-OUT</a>
    <a id='topNavBtn' href='EditVehicle.php' class='button'>Edit Vehicle</a>
    <a id='topNavBtn' href='DeleteVehicle.php' class='button'>Delete Vehicle</a>
    <a id='topNavBtn' href='AddVehicle.html' class='button'>Add Vehicle</a>
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

    if ($vehicleType == 'car'){
        $removeData = "DELETE FROM CarDetails WHERE VehicleName = '$deleteThis';";
        $resetID = "ALTER TABLE CarDetails DROP CarID;";
        $resetInc = "ALTER TABLE CarDetails AUTO_INCREMENT = 1;";
        $setInc = "ALTER TABLE CarDetails ADD CarID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
    }

    else if ($vehicleType  == 'vanSUV'){
        $removeData = "DELETE FROM vanSUVDetails WHERE VehicleName = '$deleteThis'";
        $resetID = "ALTER TABLE vanSUVDetails DROP vanSUVID;";
        $resetInc = "ALTER TABLE vanSUVDetails AUTO_INCREMENT = 1;";
        $setInc = "ALTER TABLE vanSUVDetails ADD vanSUVID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
    }

    else if ($vehicleType  == 'motorC'){
        $removeData = "DELETE FROM motorCDetails WHERE VehicleName = '$deleteThis';";
        $resetID = "ALTER TABLE motorCDetails DROP motorCID;";
        $resetInc = "ALTER TABLE motorCDetails DROP motorCID; ALTER TABLE motorCDetails AUTO_INCREMENT = 1;";
        $setInc = "ALTER TABLE motorCDetails ADD motorCID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
    }

    mysqli_query($sqlConnect, $removeData);
    mysqli_query($sqlConnect, $resetID);
    mysqli_query($sqlConnect, $resetInc);
    mysqli_query($sqlConnect, $setInc);

    ?>
    <h2>Vehicle Successfully Deleted</h2> <br>
    <a href='VehicleList.php' class='button'> View Database </a> <br> <br> <br> <br>
    <a href='Menu.php' class='button'><b>Back to Menu</b></a>
    </div>
</center>
</body>
</html>
