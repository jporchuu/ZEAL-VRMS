<html>
<head>
    <title>LOGIN VERIFICATION</title>
</head>
<body>
<?php
    // Verify mySQL
    $sqlConnect = mysqli_connect("localhost","root","");
    if(!$sqlConnect) {
        die();
    }

    // Verify Database
    $selectDB = mysqli_select_db($sqlConnect,'AccountUsers');
    if(!$selectDB) {
        die("Can't find the database!".mysqli_error());
    }

    // Retrieve Table Data
    $result_out = mysqli_query($sqlConnect,"select * from Employees");

    // Get Table Data
    while($credentials = mysqli_fetch_array($result_out)) {
        $Username = $credentials["USERNAME"];
        $Password = $credentials["PASSWORD"];

        if ($_POST["username"] == $Username && $_POST["password"] == $Password) $dataMatch = true;
    }

    // Outputs per condition
    if (empty($_POST["username"]) && empty($_POST["password"])){
        echo "<center><h2>Input Error</h2> <br>
        <h3>Username & Password Field Empty.</h3> </center>";
    }
    else if (empty($_POST["username"])){
        echo "<center><h2>Input Error</h2> <br>
        <h3>Username Field Empty.</h3> </center>";
    }

    else if (empty($_POST["password"])){
        echo "<center><h2>Input Error</h2> <br>
        <h3>Password Field Empty.</h3> </center>";
    }

    else if ($dataMatch == false){
        echo "<h3>Input Error</h3>";
        echo "Username and/or Password given doesn't match any entry in the employee database. <br> <br>";
    }

    else {
        echo "<center><br><h2>SUCCESSFUL LOG-IN</h2><br><br>
        <a href='Menu.html' class='button'> GO TO MENU </a>  </center>";
    }

    echo "<center> <a href='Login.html' class='button'> B A C K </a>  </center>"

?>
</body>
</html>

mysqli_close($sqlConnect);

