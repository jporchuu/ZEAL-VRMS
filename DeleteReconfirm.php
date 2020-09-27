<?php
session_start();
?>
<html>
<head>
    <title>Confirm Vehicle Removal</title>
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

    if(empty($_POST["vehicleType"]) || empty($_POST["vehicle"])){
        echo "<h2>Input Error</h2> <br>";

        if (empty($_POST['vehicleType'])) echo '- You did not choose a vehicle type to delete.<br><br>';
        if (empty($_POST['vehicle'])) echo '- You did not choose a vehicle to delete.<br><br>';

        echo "<br><br><a href='DeleteVehicle.php' class='button'> B A C K </a>";
    }

    else{
        $_SESSION['deleteThis'] = $_POST["vehicle"];
        $_SESSION['vType'] = $_POST["vehicleType"];

        if ($_POST["vehicleType"] == 'car') $vType = "Car";
        else if ($_POST["vehicleType"] == 'vanSUV') $vType = "SUV / Van";
        else if ($_POST["vehicleType"] == 'motorC') $vType = "Motorcycle";

        echo "<h3>Are you sure you want to delete this vehicle ?</label></h3><br/>"
            .$vType ."<br>" .$_POST["vehicle"]
            ."<br><br><br> <a href='DeleteConfirm.php' class='button'><b>Proceed</b></a><br/><br/><br/><a href='DeleteVehicle.php' class='button'><b>Cancel</b></a>";
    }
    ?>
    </div>
</center>
</body>
</html>
