<html>
<head>
    <title>Rent Vehicle</title>
</head>
<body>
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

<center>
    <h3>Select Vehicle:</label></h3><br/>
    <form action = 'RentConfirm.php' method = 'post'>

    <input type='radio' name='vehicleType' id='v1' value='car' onclick='Checkradiobutton()'/>Passenger Car<br/>";
    echo "<select name = 'vehicle' id='CarSel'> <option disabled selected value style='display:none'></option>";
    while ($row = mysqli_fetch_array($result_out_Car)) {
        echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
    }
    echo "</select> <br> <br>";

    echo"
    <input type='radio' name='vehicleType' id='v2' value='vanSUV' onclick='Checkradiobutton()'/>SUV / Van<br/>";
        echo "<select name = 'vehicle' id='vanSUVSel'> <option disabled selected value style='display:none'></option>";
        while ($row = mysqli_fetch_array($result_out_vanSUV)) {
            echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
        }
        echo "</select> <br> <br>";

    echo"
    <input type='radio' name='vehicleType' id ='v3' value='motorC' onclick='Checkradiobutton()'/> Motorcycles: <br/>";
    echo "<select name = 'vehicle' id='motorCSel'> <option disabled selected value style='display:none'></option>";
    while ($row = mysqli_fetch_array($result_out_motorC)) {
        echo "<option value='" . $row['VehicleName'] . "'>" . $row['VehicleName'] . "</option>";
    }
    echo "</select> <br> <br>";

    echo"
    <input type = 'submit' value = 'Rent Selected Vehicle'>
        </form>
        <a href='Menu.php' class='button'><b>B A C K</b></a>
    </center>";

    mysqli_close($sqlConnect);

?>
</body>
</html>