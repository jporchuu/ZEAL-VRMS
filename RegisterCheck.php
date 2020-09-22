<html>
<head>
    <title>Registration Verification</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
<center>
    <div id="check">
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

            echo "<h2>Input Error</h2> <br>";

            if (empty($_POST["FName"])) echo "- 'First Name' Field Empty.<br> <br>";

            if (empty($_POST["LName"])) echo "- 'Last Name' Field Empty.<br> <br>";

            if (empty($_POST["position"])) echo "- 'Company Personnel Position' Field Empty.<br> <br>";

            if (empty($_POST["username"])) echo "- Username Field Empty.<br> <br>";

            if (empty($_POST["password"])) echo "- Password Field Empty.<br> <br>";

            if ($_POST["password"] != $_POST["confirmPassword"]) echo "- Both passwords do not match <br> <br>";

            if ($_POST["position"] == 'Admin' && $_POST["adminPass"] != "gawr") echo "- Incorrect Admin Passcode <br> <br>";

            echo "<br> <a href='Register.html' class='button'> B A C K </a>";

        }

        else {

            $newData = "Insert into EmployeeDetails(LastName, FirstName, Username, Password, Access)
            values('$_POST[LName]','$_POST[FName]', '$_POST[username]', '$_POST[password]', '$_POST[position]')";

            mysqli_query($sqlConnect, $newData);

            echo "<br><h2>Successfully Registered New User</h2> <br> <br>
    
            <a href='Login.html' class='button'> Log-in </a> ";
        }

        mysqli_close($sqlConnect);
    ?>
    </div>
</center>
</body>
</html>



