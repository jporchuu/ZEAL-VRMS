<?php
    session_start();

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

    // Retrieve Table Data
    $result_out = mysqli_query($sqlConnect,"select * from EmployeeDetails");

    // Get Table Data
    while($credentials = mysqli_fetch_array($result_out)) {
        $Username = $credentials["Username"];
        $Password = $credentials["Password"];

        if ($_POST["username"] == $Username && $_POST["password"] == $Password){
            $_SESSION['access'] = $credentials["Access"];
            $dataMatch = true;
        }
    }

    echo "<center>";

    // Outputs per condition
    if (empty($_POST["username"]) && empty($_POST["password"])){
        echo "<h2>Input Error</h2> <br>
        <h3>Username & Password Field Empty.</h3> ";

        echo "<a href='Login.html' class='button'> B A C K </a>  </center>";
    }
    else if (empty($_POST["username"])){
        echo "<h2>Input Error</h2> <br>
        <h3>Username Field Empty.</h3>";

        echo "<a href='Login.html' class='button'> B A C K </a>  </center>";
    }

    else if (empty($_POST["password"])){
        echo "<h2>Input Error</h2> <br>
        <h3>Password Field Empty.</h3> ";

        echo "<a href='Login.html' class='button'> B A C K </a>  </center>";
    }

    else if ($dataMatch == false){
        echo "<h2>Input Error</h2> <br>
        Username and/or Password given doesn't match any entry in the employee database. <br> <br>";

        echo "<a href='Login.html' class='button'> B A C K </a>  </center>";
    }

    else {
        echo "<br><h2>SUCCESSFUL LOG-IN</h2><br><br>
        <a href='Menu.php' class='button'> GO TO MENU </a> </center>";
    }

    mysqli_close($sqlConnect);
?>



