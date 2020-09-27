<?php session_start(); ?>

<html>
<head>
    <title>Main Menu</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body bgcolor="black">
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

echo "<div id = 'bg' >
    <div id = 'vrms02'><img id='anim' src='assets/img/vrms02.png'></div>
    <div id = 'bg04'><img id='anim' src='assets/img/bg04.png'></div>
    <div id = 'car03'><img id='anim' src='assets/img/car03.png'></div>
    <div id = 'text01'><img id='anim' src='assets/img/text01.png'></div>
    </div>";

?>

<!-- These Javascript components are for aesthetic purposes only -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js'></script>
<script  src="mouse.js"></script>

</body>
</html>
