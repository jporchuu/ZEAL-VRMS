<html>
<head>
    <title>Vehicle Rent Status</title>
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

    if(empty($_POST["vehicleType"]) || empty($_POST["vehicle"])){
        echo "<h2>Input Error</h2> <br>";

        if (empty($_POST["vehicleType"])) echo "- You did not choose a vehicle type to rent.<br><br>";
        if (empty($_POST["vehicle"])) echo "- You did not choose any vehicle to rent.<br><br>";

        echo "<br><br>
            <a href='RentVehicle.php' class='button'> B A C K </a>";

    }

    else{
        $vehicleName = $_POST["vehicle"];
        if ($_POST["vehicleType"] == 'car') $rent = "UPDATE CarDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

        else if ($_POST["vehicleType"] == 'vanSUV') $rent = "UPDATE vanSUVDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

        else if ($_POST["vehicleType"] == 'motorC') $rent = "UPDATE motorCDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

        mysqli_query($sqlConnect, $rent);

        echo "<h2>VEHICLE SUCCESSFULLY RENTED</h2> <br> <br>
    
            <a href='VehicleList.php' class='button'> View Database </a> <br> <br> <br> <br>
            <a href='Menu.php' class='button'> B A C K </a> ";

    }
    mysqli_close($sqlConnect);
    ?>
    </div>
</center>
</body>
</html>
