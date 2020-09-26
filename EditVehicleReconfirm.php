<?php
session_start();
?>
<html>
<head>
    <title>Confirm Vehicle Information Edit</title>
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
        $vehicleType = $_SESSION['vType1'];
        $prevName = $_SESSION['prevName1'];
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
            ."NEW Vehicle Name: " ,$_POST["vName"]."<br>NEW Rental Cost Per day: " ,$_POST["costPerDay"];
            echo "<br><br><br><a href='EditVehicleConfirm.php' class='button'> Proceed </a><br><br><br>";
        }
        echo " <a href='EditVehicle.php' class='button'> B A C K </a>";
        ?>
        </div>
    </center>
    </body>
    </html>

