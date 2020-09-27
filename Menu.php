<?php session_start(); ?>

<html>
<head>
    <title>Main Menu</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
<?php
$access = $_SESSION['access'];

echo "
<div class='topnav'>
    <a id='topNavBtnOUT' href='Login.html' class='button'>LOG-OUT</a>";

if ($access == 'Admin'){
echo "
    <a id='topNavBtn' href='EditVehicle.php' class='button'>Edit Vehicle</a>
    <a id='topNavBtn' href='DeleteVehicle.php' class='button'>Delete Vehicle</a>
    <a id='topNavBtn' href='AddVehicle.html' class='button'>Add Vehicle</a>";
}
echo "
    <a id='topNavBtn' href='ReturnVehicle.php' class='button'>Return a Vehicle</a>
    <a id='topNavBtn' href='RentVehicle.php' class='button'>Rent a Vehicle</a>
    <a id='topNavBtn' href='VehicleList.php' class='button'>Vehicle Database</a>
</div>";

echo "<center><div id = 'bot'></div></center>";

?>

</body>
</html>
