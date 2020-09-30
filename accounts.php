<?php
$message = "";
$accountErr = "";
$passErr = "";
$surname = filter_input(0, 'surname');
$fname = filter_input(0, 'firstname');
$empy_id = filter_input(0, 'employee_id');
$email_cr = filter_input(0, 'email');
$pwd = filter_input(0, 'pwd1');
$pwd_con = filter_input(0, 'pwd2');

if (isset($_POST['create'])) {
    if ($pwd != $pwd_con) {
        $passErr = "passwords do not match";
    } else {


        require './admin/adminconnect.php';

        $stmt_1 = "SELECT * FROM STAFF WHERE emp_id = '$empy_id' and lastname = '$surname' and firstname= '$fname'";

        $res = $dbcon->query($stmt_1);

        if ($res->num_rows <= 0) {
            $accountErr = "The information you provided above do not match any of our records."
                    . " " . "Please check and try again";
        } else {


            $stmt_2 = "SELECT * FROM STAFF_LOGIN WHERE emp_id = '$empy_id'";
            

            if (!$dbcon->query($stm_2)) {
                print 'A problem has occured. The server was unable to process your request.'
                        . ' Please try again later' . $dbcon->error;
            }
            $resa = $dbcon->query($stmt_2);
            if ($resa->num_rows <= 0) {
                $stm = "INSERT INTO STAFF_LOGIN (emp_id, email, password)"
                        . "VALUES('$empy_id', '$email_cr', '$pwd_con')";

                if (!$dbcon->query($stm)) {
                    print 'A problem has occured. The server was unable to process your request.'
                            . ' Please try again later' . $dbcon->error;
                }
                $message = "Acount creation successful";
                header("location: staff_login.php");
            } else {
                $message = "Account already exist";
            }
        }
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
        <title>create account - staff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>

        <link rel="icon" href="education.ico" type="image/x-icon"/>
        <script src="js/bootstrap.min.js"></script>
        <style>
            .container{
                padding-top: 5%;
            }
            .btn{
                float: right;
            }
        </style>

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
        <div class="container well">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <legend>please enter the following details</legend>
                <form class="form-inline" role="form" method="post" 
                      action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="passwordMatch()">

                    <table class="table">
                        <tr>
                            <td><label for="name">Surname*:</label></td>
                            <td><input type="text" name="surname" required class="form-control" value="<?php echo $surname; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="firstname">First Name*:</label></td>
                            <td> <input type="text" name="firstname" required class="form-control" value="<?php echo $fname; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="id">Employee ID*:</label></td>
                            <td><input type="number" name="employee_id" required class="form-control" value="<?php echo $empy_id; ?>">
                                <p class="bg-danger"><?php echo $accountErr; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="email">Email*:</label></td>
                            <td><input type="email" name="email" required class="form-control" value="<?php echo $email_cr; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Choose Password*:</label></td>
                            <td><input type="password" name="pwd1"  class="form-control" id="field_1" value="<?php echo $pwd ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lastname">Re-enter Password*:</label></td>
                            <td><input type="password" name="pwd2" required class="form-control" id="field_2" value="<?php echo $pwd_con ?>">
                            <p class="bg-warning"><?php echo $passErr;?></p>
                            </td>  
                         </tr>
                       <p class="bg-warning"><?php echo $message; ?></p>

                        

                    </table>
                    <input type="submit" name="create" class="btn btn-lg btn-success form-control"
                           value="SUBMIT">

                    <script type="text/javascript">

                        function passwordMatch() {
                            var first_field = document.getElementById('field_1');
                            var second_field = document.getElementById('field_2');
                            if (first_field.value !== second_field.value) {
                                alert("password do not match");
                                return false;
                            } else {
                                return true;
                            }

                        }

                    </script>

                </form>


            </div>
            <div class="col-md-4"></div>
        </div>

    </body>
</html>
