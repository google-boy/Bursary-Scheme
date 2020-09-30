<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bursary-Online | Institution Verification</title>
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
            <div class="col-md-4" style="border: 2px solid">
                <legend><p class="bg-info">Login to continue</p></legend>
                <p class="bg-warning">Only authorized staff (preferable student's affairs personnel)
                    from the learning institution are allowed to login</p>
                <form class="form" role="form" method="post" name="login_form">
                    <div class="form-group form-inline">
                        <label for="institution_name">Institution name:</label>
                        <?php
                        require './dbconnect.php';
                        $ins = $conn->query("SELECT name FROM institution");
                        if(!$ins){
                            echo 'an error occured. please try again later';
                        }
                        if($ins->num_rows>0){
                        print "<select name='ins' class='form-control'>";
                        print "<option value=''></option>";
                        while ($data = $ins->fetch_assoc()){
                            
                            print "<option value=".$data['name'].">".$data['name']."</option>";
                        }
                        print "</select>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="token" style="padding-right: 7%;">Login Token:</label>
                        <input type="text" name="token" id="login_token" >
                    </div>
                    <div class="form-group-sm">
                        <input type="checkbox" value="remember" name="remember">
                        Remember Me
                    </div>
                    <div style="float: right;">
                        <input type="submit" name="enter" class="btn btn-success" value="Login">
                        
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <footer style="background-color:  #080808;bottom:0%; width: 100%;height: 100%">
            <div class="container footer affix-bottom" style="background-color:  #080808;">
                <div class="col-md-4">Copyright &COPY; 2016 <a href="index.php">Bursary-Online</a></div>
                <div class="col-md-4">
                    <p><a href="index.php">Home</a>
                        <a>News $ events</a>
                    </p>
                    <p><a href="about.html">About Us</a>
                        <a>Gallery</a>
                    </p>
                    <p><a href="contact.html">Contact Us</a>
                        <a href="staff_portal.php">staff portal</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>Designed by: Alaro Hezron</p>
                    <p>NetGram Softwares</p>
                </div>
            </div>
        </footer>
        <?php
        if(isset($_POST['enter'])){
            header("location: isnportal.php");
        }
        ?>

    </body>
</html>
