
<?php

$msg = "";
session_start();

require './admin/adminconnect.php';
if (isset($_POST['login'])) {
    $username = filter_input(0, 'email');
    $password = filter_input(0, 'password');







    $sql_query = "SELECT * FROM staff_login WHERE email = '$username' AND password='$password'";
    $results = $dbcon->query($sql_query);

    if ($results->num_rows <= 0) {
        $msg = "wrong username or password";
    } else {
        
        
        $usql = "SELECT firstname FROM STAFF, STAFF_LOGIN WHERE "
                . "staff_login.email = '$username' AND staff_login.emp_id = staff.emp_id";
        $user = $dbcon->query($usql);
        $row = $user->fetch_assoc();
        $_SESSION["id"] = $row["firstname"];
        //$_SESSION["user"] = strval($user);
        header("Location: staff_portal.php");
    }
}
?>
<!DOCTYPE html>


<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bursary-Online | Staff Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>

        <link rel="icon" href="education.ico" type="image/x-icon"/>
        <script src="js/bootstrap.min.js"></script>



    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p><a href=index.php>Bursary-Online</a></p>
                    <p>financial support to needy students</p>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
        <div class="container well" style="min-height: 500px; padding-top: 5%;">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="border: 2px solid;">
                <p class="bg-success"><?php //echo $message;?></p>
                <a class="glyphicon glyphicon-arrow-left" href="./index.php">gotosite</a>
                <legend><p class="bg-info">Staff Login</p></legend>
                <form class="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <label for="staffid" style="padding-right: 5%;">Staff ID:</label>
                        <input type="email" value="" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required><br/>
                        <p class="bg-warning"><?php echo $msg;?></p>
                        <a href="#">  forgot password?</a> <a href="#">  forgot username?</a>
                        
                    </div>
                    <div class="form-group-sm">
                        <input type="checkbox" name="remember">
                        <span> Remember Me</span>
                    </div>
                    <div>
                        <p><a>new user?<a/><a href="accounts.php">CREATE ACCOUNT</a></p>
                    </div>
                    <input style="float: right;" type="submit" name="login" value="Login" class="btn">


                </form>

            </div>
            <div class="col-md-4"></div>
        </div>
        <footer style="background-color:  #080808;bottom:0%; width: 100%; height: auto;">
            <div class="container footer affix-bottom" style="background-color:  #080808;">
                <div class="col-md-4">Copyright &COPY; <a href="index.php">Bursary-Online</a></div>
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <p>Designed by: Alaro Hezron</p>
                    <p>NetGram Softwares</p>
                </div>
            </div>
        </footer>
<?php
// put your code here
?>

    </body>
</html>