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

if(empty($_POST["vehicleType"])){
    echo "<center><h2>Input Error</h2> <br>";

    if (empty($_POST["vehicleType"])) echo "<h3>You did not choose a vehicle to rent.</h3>";

    echo "
        <a href='RentVehicle.php' class='button'> B A C K </a> </center>";

}

else{
    $vehicleName = $_POST["vehicle"];
    if ($_POST["vehicleType"] == 'car') $rent = "UPDATE CarDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

    else if ($_POST["vehicleType"] == 'vanSUV') $rent = "UPDATE vanSUVDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

    else if ($_POST["vehicleType"] == 'motorC') $rent = "UPDATE motorCDetails SET Availability=0 WHERE VehicleName='$vehicleName'";

    mysqli_query($sqlConnect, $rent);

    echo "<center><br><h2>SUCCESSFULLY RENTED VEHICLE</h2> <br> <br>

        <a href='VehicleList.php' class='button'> View Database </a> <br> <br>
        <a href='Menu.php' class='button'> B A C K </a> </center>";

}
echo "</center>";
mysqli_close($sqlConnect);
?>