<html>
<head>
    <title>Vehicle Add Status</title>
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

        if(empty($_POST["vName"]) || empty($_POST["costPerDay"]) || empty($_POST["vehicle"] )){
            echo "<h2>Input Error</h2> <br>";

            if (empty($_POST["vName"])) echo "- 'Vehicle Name' Field Empty.<br><br>";

            if (empty($_POST["costPerDay"])) echo "- 'Cost Per Day' Field Empty.<br><br>";

            if (empty($_POST["vehicle"])) echo "- 'Vehicle Type' Field Empty.<br><br>";

            echo "<br><br>
            <a href='AddVehicle.html' class='button'> B A C K </a>";

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

            echo "<br><h2>REGISTERED NEW VEHICLE</h2> <br> <br>
    
            <a href='VehicleList.php' class='button'> View Database </a> <br> <br> <br>
            <a href='Menu.php' class='button'> Back to Menu </a>";

        }
        mysqli_close($sqlConnect);
    ?>
    </div>
</center>
</body>
</html>