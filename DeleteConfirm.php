<?php
session_start();
?>

<html>
<head>
    <title>Vehicle Successfully Removed</title>
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

$deleteThis = $_SESSION['deleteThis'];
$vehicleType = $_SESSION['vType'];

if ($vehicleType == 'car') $removeData = "DELETE FROM CarDetails WHERE VehicleName = '$deleteThis'";
else if ($vehicleType  == 'vanSUV') $removeData = "DELETE FROM vanSUVDetails WHERE VehicleName = '$deleteThis'";
else if ($vehicleType  == 'motorC') $removeData = "DELETE FROM motorCDetails WHERE VehicleName = '$deleteThis'";

mysqli_query($sqlConnect, $removeData);

?>
    <h2>Vehicle Successfully Deleted</h2> <br>
    <a href='VehicleList.php' class='button'> View Database </a> <br> <br>
    <a href='Menu.php' class='button'><b>B A C K</b></a>
</center>
</body>
</html>
