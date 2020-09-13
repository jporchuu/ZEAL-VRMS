<html>
<head>
    <title>Vehicle Added!</title>
</head>
<body>
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

    if(empty($_POST["vName"]) || empty($_POST["costPerDay"]) || empty($_POST["vehicle"] )){
        echo "<center><h2>Input Error</h2> <br>";

        if (empty($_POST["vName"])) echo "<h3>- 'Vehicle Name' Field Empty.</h3>";

        if (empty($_POST["costPerDay"])) echo "<h3>- 'Cost Per Day' Field Empty.</h3>";

        if (empty($_POST["vehicle"])) echo "<h3>- 'Vehicle Type' Field Empty.</h3>";
    }

    else{
        if ($_POST["vehicle"] == 'Car'){
            $newData = "Insert into CarDetails(VehicleName, costPerDay, Availability)
            values('$_POST[vName]','$_POST[costPerDay]', 1)";
        }

        else if ($_POST["vehicle"] == 'VanSUV'){
            $newData = "Insert into vanSUVDetails(VehicleName, costPerDay, Availability)
            values('$_POST[vName]','$_POST[costPerDay]', 1)";
        }

        else if ($_POST["vehicle"] == 'Motorcycle'){
            $newData = "Insert into motorCDetails(VehicleName, costPerDay, Availability)
            values('$_POST[vName]','$_POST[costPerDay]', 1)";
        }
        mysqli_query($sqlConnect, $newData);

        echo "<center><br><h2>REGISTERED NEW USER</h2> <br> <br>

        <a href='VehicleList.php' class='button'> View Database </a> <br> <br>
        <a href='Menu.html' class='button'> B A C K </a> </center>";

    }
    echo "</center>";
    mysqli_close($sqlConnect);
?>
</body>
</html>