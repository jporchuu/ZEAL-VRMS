<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Vehicle</title>
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

    $result_out_Car = mysqli_query($sqlConnect,"select * from CarDetails");
    if(!$result_out_Car) {
        die();
    }
    $result_out_vanSUV = mysqli_query($sqlConnect,"select * from vanSUVDetails");
    if(!$result_out_vanSUV) {
        die();
    }
    $result_out_motorC = mysqli_query($sqlConnect,"select * from motorCDetails");
    if(!$result_out_motorC) {
        die();
    }

    $vehicleName = $_SESSION['prevName1'] = $_SESSION['prevName'];
    $vehicleType = $_SESSION['vType1'] = $_SESSION['vType'];

    $defaultPrice = 0;

    if ($vehicleType == 'car') {

        while ($row = mysqli_fetch_array($result_out_Car)) if ($vehicleName == $row['VehicleName']) $defaultPrice = $row['costPerDay'];

    }

    else if ($vehicleType == 'vanSUV'){
        while ($row = mysqli_fetch_array($result_out_vanSUV)) if ($vehicleName == $row['VehicleName']) $defaultPrice = $row['costPerDay'];
    }

    else if ($vehicleType == 'motorC'){
        while ($row = mysqli_fetch_array($result_out_motorC)) if ($vehicleName == $row['VehicleName']) $defaultPrice = $row['costPerDay'];
    }

    echo"
        <br><h2>Edit Vehicle Information</h2><br>
        <form action = 'EditVehicleReconfirm.php' method = 'post'>
    
            Vehicle Name:<br> <input type = 'text' name = 'vName' value='$vehicleName'> <br> <br>
    
            Rent Cost Per Day:<br> <input type = 'text' name = 'costPerDay' value='$defaultPrice'> <br> <br>
    
            <input type = 'submit' value = 'Edit Vehicle'>  <br> <br>
    
        </form>
    
        <a href='EditVehicle.php' class='button'><b>B A C K</b></a>";

    mysqli_close($sqlConnect);
    ?>
</center></body>
</html>