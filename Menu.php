<?php
session_start();
?>

<html>
<head>
    <title>Main Menu</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body id="Login-Menu">
<center>
<?php
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

echo "<br><img src='assets/img/zeal1.png' width=50%><br><br><br>

    <div id='loginMenuArea' class='square'>

    <a href='VehicleList.php' class='button'>View Vehicles List</a>

    <a href='RentVehicle.php' class='button'>Rent a Vehicle</a>

    <a href='ReturnVehicle.php' class='button'>Return a Vehicle</a> <br> <br> <br> <br>";

if ($access == 'Admin'){

    echo "
    <a href='AddVehicle.html' class='button'>Add Vehicle</a>

    <a href='DeleteVehicle.php' class='button'>Delete Vehicle</a>

    <a href='EditVehicle.php' class='button'>Edit Vehicle</a> <br> <br> <br> <br>";
}
echo "<a id='logoff' href='Login.html' class='button'>LOG - OUT</a> </div>";

mysqli_close($sqlConnect);
?>

</center>
</body>
</html>
