<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle</title>
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

$result_out_Car = mysqli_query($sqlConnect,"select * from CarDetails");
if(!$result_out_Car) {
    die();
}
$result_out_vanSUV = mysqli_query($sqlConnect,"select * from vanSUVDetails");
if(!$result_out_vanSUV) {
    die();
}
$result_out_motorC = mysqli_query($sqlConnect,"select * from motorCDetails");
if(!$result_out_motorC) {
    die();
}

$_SESSION['vType'] = $_POST["vehicleType"];
$_SESSION['prevName'] = $_POST['vehicle'];

$defaultPrice = 0;

if ($_POST["vehicleType"] == 'car') {

    while ($row = mysqli_fetch_array($result_out_Car)) if ($_POST['vehicle'] == $row['VehicleName']) $defaultPrice = $row['costPerDay'];

}

else if ($_POST["vehicleType"] == 'vanSUV'){
    while ($row = mysqli_fetch_array($result_out_vanSUV)) if ($_POST['vehicle'] == $row['VehicleName']) $defaultPrice = $row['costPerDay'];
}

else if ($_POST["vehicleType"] == 'motorC'){
    while ($row = mysqli_fetch_array($result_out_motorC)) if ($_POST['vehicle'] == $row['VehicleName']) $defaultPrice = $row['costPerDay'];
}

echo"
    <br><h2>Edit Vehicle Information</h2><br>
    <form action = 'EditVehicleReconfirm.php' method = 'post'>

        Vehicle Name:<br> <input type = 'text' name = 'vName' value='$_POST[vehicle]'> <br> <br>

        Rent Cost Per Day:<br> <input type = 'text' name = 'costPerDay' value='$defaultPrice'> <br> <br>

        <input type = 'submit' value = 'Edit Vehicle'>  <br> <br>

    </form>

    <a href='EditVehicle.php' class='button'><b>B A C K</b></a>";
?>
</center></body>
</html>