<html>
<head>
    <title>REGISTER VERIFICATION</title>
</head>
<body>
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

    if(empty($_POST["FName"]) || empty($_POST["LName"]) || empty($_POST["position"]) || empty($_POST["username"]) || empty($_POST["password"]) || $_POST["password"] != $_POST["confirmPassword"] || ($_POST["position"] == 'Admin' && $_POST["adminPass"] != "gawr")){

        echo "<center><h2>Input Error</h2> <br>";

        if (empty($_POST["FName"])) echo "<h3>- 'First Name' Field Empty.</h3>";

        if (empty($_POST["LName"])) echo "<h3>- 'Last Name' Field Empty.</h3>";

        if (empty($_POST["position"])) echo "<h3>- 'Company Personnel Position' Field Empty.</h3>";

        if (empty($_POST["username"])) echo "<h3>- Username Field Empty.</h3>";

        if (empty($_POST["password"])) echo "<h3>- Password Field Empty.</h3>";

        if ($_POST["password"] != $_POST["confirmPassword"]) echo "<h3> - Both passwords do not match </h3>";

        if ($_POST["position"] == 'Admin' && $_POST["adminPass"] != "gawr") echo "<h3> - Incorrect Admin Passcode </h3> <br> <br>";

        echo "<a href='Register.html' class='button'> B A C K </a>  </center>";

    }

    else {

        $newData = "Insert into EmployeeDetails(LastName, FirstName, Username, Password, Access)
        values('$_POST[LName]','$_POST[FName]', '$_POST[username]', '$_POST[password]', '$_POST[position]')";

        mysqli_query($sqlConnect, $newData);

        echo "<center><br><h2>REGISTERED NEW USER</h2> <br> <br>

        <a href='Login.html' class='button'> LOG-IN </a> </center>";
    }

    mysqli_close($sqlConnect);
?>
</body>
</html>



