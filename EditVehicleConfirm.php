<?php
session_start();
?>

<html>
<head>
    <title>Vehicle Information has been successfully Edited</title>
</head>
<body>
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

    $modName = $_SESSION['vName'];
    $modCost = $_SESSION['costPerDay'];
    $prevName = $_SESSION['prevName2'];
    $vehicleType = $_SESSION['vType'];

    if ($vehicleType == 'car'){
        $editData = "UPDATE CarDetails SET costPerDay='$modCost' WHERE VehicleName='$prevName'";
        $editData2 = "UPDATE CarDetails SET VehicleName='$modName' WHERE VehicleName='$prevName'";
    }
    else if ($vehicleType  == 'vanSUV'){
        $editData = "UPDATE vanSUVDetails SET costPerDay='$modCost' WHERE VehicleName='$prevName'";
        $editData2 = "UPDATE vanSUVDetails SET VehicleName='$modName' WHERE VehicleName='$prevName'";
    }
    else if ($vehicleType  == 'motorC'){
        $editData = "UPDATE motorCDetails SET costPerDay='$modCost' WHERE VehicleName='$prevName'";
        $editData2 = "UPDATE motorCDetails SET VehicleName='$modName' WHERE VehicleName='$prevName'";
    }

    mysqli_query($sqlConnect, $editData);
    mysqli_query($sqlConnect, $editData2);

    ?>
    <h2>Vehicle Successfully Edited</h2> <br>
    <a href='VehicleList.php' class='button'> View Database </a> <br> <br>
    <a href='Menu.php' class='button'><b>B A C K</b></a>
</center>
</body>
</html>