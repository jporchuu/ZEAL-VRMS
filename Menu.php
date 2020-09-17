<?php
session_start();

// Verify mySQL
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

// Verify Database
$selectDB = mysqli_select_db($sqlConnect,'AccountDatabase');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$access = $_SESSION['access'];

echo "<center>
    <br><h2>MAIN MENU</h2><br>

    <a href='VehicleList.php' class='button'>View Vehicles List</a> <br> <br>

    <a href='RentVehicle.php' class='button'>Rent Vehicle</a> <br> <br>

    <a href='ReturnVehicle.html' class='button'>Return Vehicle</a> <br> <br>";

if ($access == 'Admin'){

    echo "
    <a href='AddVehicle.html' class='button'>Add Vehicle </a> <br> <br>

    <a href='DeleteVehicle.php' class='button'>Delete Vehicle</a> <br> <br>

    <a href='EditVehicle.html' class='button'>Edit Vehicle</a> <br> <br>";
}
echo "<a href='Login.html' class='button'>L O G   -   O U T</a></center>";
?>