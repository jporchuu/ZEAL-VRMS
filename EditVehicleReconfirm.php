<?php
session_start();
?>
<html>
    <head>
        <title>Confirm Vehicle Information Edit</title>
    </head>
    <body>
    <center>

<?php
    $vehicleType = $_SESSION['vType'];
    $prevName = $_SESSION['prevName'];
    $_SESSION['prevName2'] = $prevName;
    $_SESSION['vType2'] = $vehicleType;
    $_SESSION['vName'] = $_POST["vName"];
    $_SESSION['costPerDay'] = $_POST["costPerDay"];

    if(empty($_POST["vName"]) || empty($_POST["costPerDay"])){
        echo "<h2>Input Error</h2> <br>";
        if(empty($_POST["vName"])) echo "<h3>- 'Vehicle Name' Field Empty.</h3>>";
        if(empty($_POST["costPerDay"])) echo "<h3>- 'Cost Per Day' Field Empty.</h3>";
    }
    else{
        echo "<h2>Are you sure you want to edit this vehicle with the following information?</h2> <br>"
        ."Vehicle Name: " ,$_POST["vName"]."<br>Rental Cost Per day: " ,$_POST["costPerDay"];
        echo "<br><br><a href='EditVehicleConfirm.php' class='button'> Proceed </a><br>";
    }
    echo " <a href='EditVehicle.php' class='button'> B A C K </a>";
    
?>
    </center>
    </body>
    </html>

