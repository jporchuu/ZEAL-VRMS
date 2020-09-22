<html>
<head>
    <title>Vehicles Database</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
<div class="topnav">
    <img src='assets/img/zeal2.png' width=10%>
    <a id='topNavBtn' href='Login.html' class='button'>LOG-OUT</a>
    <a id='topNavBtn' href='ReturnVehicle.php' class='button'>Return a Vehicle</a>
    <a id='topNavBtn' href='RentVehicle.php' class='button'>Rent a Vehicle</a>
    <a id='topNavBtn' href='VehicleList.php' class='button'>Vehicle Database</a>
    <a id='topNavBtn' href='Menu.php' class='button'>Menu</a>
</div>
<center>
    <br>
<h2 id="blueLabel">VEHICLE DATABASE</h2>
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

    // Retrieve Table Data
    $result_out = mysqli_query($sqlConnect,"select * from CarDetails");
    if(!$result_out) {
        die();
    }

    // Car Table
    echo " <table border='1'>
    <tr>
    <th>CarID</th>
    <th>Vehicle Name</th>
    <th>Cost Per Day</th>
    <th>Availability</th>
    </tr>";

    while($row = mysqli_fetch_array($result_out)){

        $availability = "TRUE";
        if ($row['Availability'] == '0') $availability = "FALSE";

        echo "<tr>";
        echo "<td>" . $row['CarID'] . "</td>";
        echo "<td>" . $row['VehicleName'] . "</td>";
        echo "<td>" . $row['costPerDay'] . "</td>";
        echo "<td>" . $availability . "</td>";
        echo "</tr>";
    }
    echo "</table>";



    // Retrieve Table Data
    $result_out = mysqli_query($sqlConnect,"select * from vanSUVDetails");
    if(!$result_out) {
        die();
    }

    // SUV / Van Table
    echo "<table border='1'>
        <tr>
        <th>VanID</th>
        <th>Vehicle Name</th>
        <th>Cost Per Day</th>
        <th>Availability</th>
        </tr>";

    while($row = mysqli_fetch_array($result_out)){

        $availability = "TRUE";
        if ($row['Availability'] == 0) $availability = "FALSE";

        echo "<tr>";
        echo "<td>" . $row['vanSUVID'] . "</td>";
        echo "<td>" . $row['VehicleName'] . "</td>";
        echo "<td>" . $row['costPerDay'] . "</td>";
        echo "<td>" . $availability . "</td>";
        echo "</tr>";
    }
    echo "</table>";



    // Retrieve Table Data
    $result_out = mysqli_query($sqlConnect,"select * from motorCDetails");
    if(!$result_out) {
        die();
    }

    // SUV / Van Table
    echo "<table border='1'>
            <tr>
            <th>MotorCID</th>
            <th>Vehicle Name</th>
            <th>Cost Per Day</th>
            <th>Availability</th>
            </tr>";

    while($row = mysqli_fetch_array($result_out)){

        $availability = "TRUE";
        if ($row['Availability'] == 0) $availability = "FALSE";

        echo "<tr>";
        echo "<td>" . $row['motorCID'] . "</td>";
        echo "<td>" . $row['VehicleName'] . "</td>";
        echo "<td>" . $row['costPerDay'] . "</td>";
        echo "<td>" . $availability . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<a href='Menu.php' class='button'> B A C K </a>  </center>";

    mysqli_close($sqlConnect);
?>
</center>
</body>
</html>
