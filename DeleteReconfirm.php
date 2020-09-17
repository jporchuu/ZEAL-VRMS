<?php
session_start();
?>
<html>
<head>
    <title>Confirm Vehicle Removal</title>
</head>
<body>
<center>

<?php

if(empty($_POST["vehicle"])){
    echo "<h2>Input Error</h2> <br>
    <h3>You did not choose a vehicle to delete.</h3>
    <a href='DeleteVehicle.php' class='button'> B A C K </a>";
}

else{
    $_SESSION['deleteThis'] = $_POST["vehicle"];
    $_SESSION['vType'] = $_POST["vehicleType"];

    if ($_POST["vehicleType"] == 'car') $vType = "Car";
    else if ($_POST["vehicleType"] == 'vanSUV') $vType = "SUV / Van";
    else if ($_POST["vehicleType"] == 'motorC') $vType = "Motorcycle";

    echo "<h3>Are you sure you want to delete this vehicle ?</label></h3><br/>"
        .$vType ."<br>" .$_POST["vehicle"]
        ."<br><br> <a href='DeleteConfirm.php' class='button'><b>Proceed</b></a><br/><a href='DeleteVehicle.php' class='button'><b>Cancel</b></a>";
}
?>

</center>
</body>
</html>
