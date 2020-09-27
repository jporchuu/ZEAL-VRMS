<?php session_start(); ?>

<html>
<head>
    <title>Vehicle Return Status</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <?php
    $access = $_SESSION['access'];
    echo "
    <div class='topnav'>
        <img src='assets/img/zeal2.png' width=8%>
        <a id='topNavBtnOUT' href='Login.html' class='button'>LOG-OUT</a>";
    if ($access == 'Admin'){
        echo "
        <a id='topNavBtn' href='EditVehicle.php' class='button'>Edit Vehicle</a>
        <a id='topNavBtn' href='DeleteVehicle.php' class='button'>Delete Vehicle</a>
        <a id='topNavBtn' href='AddVehicle.html' class='button'>Add Vehicle</a>";
    }
    echo "
        <a id='topNavBtn' href='ReturnVehicle.php' class='button'>Return a Vehicle</a>
        <a id='topNavBtn' href='RentVehicle.php' class='button'>Rent a Vehicle</a>
        <a id='topNavBtn' href='VehicleList.php' class='button'>Vehicle Database</a>
        <a id='topNavBtn' href='Menu.php' class='button'>Menu</a>
        </div> <center> <div id='check'>";

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

    if(empty($_POST["vehicleType"]) || empty($_POST["vehicle"])){
        echo "<h2>Input Error</h2> <br>";

        if (empty($_POST["vehicleType"])) echo "- You did not choose a vehicle type to return.<br><br>";
        if (empty($_POST["vehicle"])) echo "- You did not choose any vehicle to return.<br><br>";

        echo "<br><br><a href='ReturnVehicle.php' class='button'> B A C K </a> </center>";

    }

    else{
        $vehicleName = $_POST["vehicle"];
        if ($_POST["vehicleType"] == 'car') $return = "UPDATE CarDetails SET Availability=1 WHERE VehicleName='$vehicleName'";

        else if ($_POST["vehicleType"] == 'vanSUV') $return = "UPDATE vanSUVDetails SET Availability=1 WHERE VehicleName='$vehicleName'";

        else if ($_POST["vehicleType"] == 'motorC') $return = "UPDATE motorCDetails SET Availability=1 WHERE VehicleName='$vehicleName'";

        mysqli_query($sqlConnect, $return);

        echo "<center><br><h2>VEHICLE SUCCESSFULLY RETURNED</h2> <br> <br>
    
            <a href='VehicleList.php' class='button'> View Database </a> <br> <br>
            <a href='Menu.php' class='button'> B A C K </a> ";

    }
    echo "</center>";
    mysqli_close($sqlConnect);
    ?>
    </div>
</center>
</body>
</html>
