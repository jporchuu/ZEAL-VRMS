<?php session_start(); ?>

<html>
<head>
    <title>Rent Vehicle</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
<?php
    $access = $_SESSION['access'];
    echo "
    <div class='topnav'>
        <img src='assets/img/zeal2.png' width=8%>
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
        <a id='topNavBtn' href='Menu.php' class='button'>Menu</a>
        </div> <center> <div id='check'>";

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

    $result_out_Car = mysqli_query($sqlConnect,"select * from CarDetails where Availability>0");
    if(!$result_out_Car) {
        die();
    }
    $result_out_vanSUV = mysqli_query($sqlConnect,"select * from vanSUVDetails where Availability>0");
    if(!$result_out_vanSUV) {
        die();
    }
    $result_out_motorC = mysqli_query($sqlConnect,"select * from motorCDetails where Availability>0");
    if(!$result_out_motorC) {
        die();
    }
echo"

<script type='text/javascript'>

    function Checkradiobutton() {
    if(document.getElementById('v1').checked){
        document.getElementById('CarSel').disabled=false;
        document.getElementById('vanSUVSel').disabled=true;
        document.getElementById('motorCSel').disabled=true;
    }
    else if(document.getElementById('v2').checked){
        document.getElementById('CarSel').disabled=true;
        document.getElementById('vanSUVSel').disabled=false;
        document.getElementById('motorCSel').disabled=true;
    }
    else if(document.getElementById('v3').checked){
        document.getElementById('CarSel').disabled=true;
        document.getElementById('vanSUVSel').disabled=true;
        document.getElementById('motorCSel').disabled=false;
    }
}
</script>
    <h3>Select a Vehicle to Rent:</label></h3><br/>
    <form action = 'RentConfirm.php' method = 'post'>

    <input type='radio' name='vehicleType' id='v1' value='car' onclick='Checkradiobutton()'/> Passenger Car<br/>";
    echo "<select name = 'vehicle' id='CarSel'> <option disabled selected value style='display:none'></option>";
    while ($row = mysqli_fetch_array($result_out_Car)) {
        echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
    }
    echo "</select> <br> <br>";

    echo"
    <input type='radio' name='vehicleType' id='v2' value='vanSUV' onclick='Checkradiobutton()'/> SUV / Van<br/>";
        echo "<select name = 'vehicle' id='vanSUVSel'> <option disabled selected value style='display:none'></option>";
        while ($row = mysqli_fetch_array($result_out_vanSUV)) {
            echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
        }
        echo "</select> <br> <br>";

    echo"
    <input type='radio' name='vehicleType' id ='v3' value='motorC' onclick='Checkradiobutton()'/> Motorcycle <br/>";
    echo "<select name = 'vehicle' id='motorCSel'> <option disabled selected value style='display:none'></option>";
    while ($row = mysqli_fetch_array($result_out_motorC)) {
        echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
    }
    echo "</select> <br> <br>";

    echo"
    <input type = 'submit' value = 'Rent Selected Vehicle'>
        </form>
        <a href='Menu.php' class='button'><b>B A C K</b></a>";

    mysqli_close($sqlConnect);

?>
</center>
</body>
</html>