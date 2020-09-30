<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Bursary-Online | Check Status</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="icon" href="education.ico" type="image/x-icon"/>
        <script src="js/bootstrap.min.js"></script>
        <style>
            nav{
                margin-left: 20%;
            }
            .form-group{
                padding: 2%;
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
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>

                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav nav-pills">

                        <li><a class="active "href="index.php">Home</a></li>
                        <li><a href="about.html">About us</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Application
                                <span class="caret"></span> 
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="application.html">Apply now</a></li>
                                <li><a href="status.php">Check Status</a></li>
                            </ul>

                        </li>
                        <li ><a href="#">Donate</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" style="float: right; ">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Area Administrator</a></li>
                                <li><a href="institutionLogin.php">Institution Verification</a></li>
                                <li><a href="staff_portal.php">Staff portal</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <ul class="breadcrumb">
            you are here  <span class="glyphicon glyphicon-arrow-right"></span>
            <li><a href="index.php">Home</a></li>
            <li><a href="application.html">Application</a></li>
            <li><a class="active" href="status.php">Check Status</a></li>

        </ul>
        <div class="container" style="min-height:500px;">
            <div class="form" style="float: left;">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label for="search" >Search Type:</label>
                        <select class="form-control" id="search_Type" onchange="changeSearchType();" required>
                            <option value=""></option>
                            <option value="nat_id">National ID</option>
                            <option value="admission">Admission Number</option>
                        </select>
                    </div><br/>
                    <div class="form-group" id="id" style="display:none;" >
                        <label for="nationalId">ID Number:</label>
                        <input type="number" name="id_search">
                        <input class="btn btn-default" type="submit" name="search_id"
                               value="search" >

                    </div><br/>
                    <div class="form-group" id="adm" style="display:none">
                        <label for="admission">Admission Number:</label>
                        <input type="text" name="adm_search">
                        <input class="btn btn-default" type="submit" name="search_adm"
                               value="search" >
                    </div><br/>
                </form>
            </div>
            <div style="">
                <?php
                require './dbconnect.php';
                $idtxt = filter_input(1, 'id_search', 519);
                $admtxt = filter_input(1, 'adm_search', 513);

                if (isset($_GET['search_id'])) {

                    $idsach = "SELECT * FROM STUDENT WHERE national_id = '$idtxt'";


                    if (!$conn->query($idsach)) {
                        print 'error has been encounted submitting your request. please try again later';
                    }
                    $idres = $conn->query($idsach);


                    if ($idres->num_rows <= 0) {
                        echo "<h2><p class=alert-warning>no result found for id no " . $idtxt . "</p></h2>";
                        echo "You may have entered the search object incorrectely or you did apply for bursary ";
                        echo "<p>You can try the following:</p>"
                        . "<p>1. Check the search object and try again.</p>"
                        . "<p>2. Use a different search criteria.</p>"
                        . "<p>3. Contact the Bursary Office for Assistance</p>";
                    } else {
                        $idst = $conn->query("SELECT concat(surname,' ', firstname,' ', other) as aplname, national_id, "
                                . "applicant_adm, inst_name, approval_status FROM student s left join application a on s.admission_no=a.applicant_adm"
                                . " WHERE national_id='$idtxt'");
                        if (!$idst) {
                            echo $conn->error;
                        }

                        $row = $idst->fetch_assoc();
                        //var_dump($row);
                        print "<p>name: " . $row['aplname'] . "</p><p>ID No: " . $row['national_id'] . "</p><p>Learning Institution: "
                                . $row['inst_name'] . "</p><p>Status:</p>";
                    }
                }
                if (isset($_GET['search_adm'])) {
                    $admsach = "SELECT * FROM STUDENT WHERE admission_no = '$admtxt'";
                    if (!$conn->query($admsach)) {
                        print 'error has been encounted submitting your request. please try again later';
                    }
                    $admres = $conn->query($admsach);
                    if ($admres->num_rows <= 0) {
                        echo "<h2 class='alert-warning'>no result found for admission no " . $admtxt . "</h2>";
                        echo "You may have entered the search object incorrectely or you did apply for bursary ";
                        echo "<p>You can try the following:</p>"
                        . "<p>1. Check the search object and try again.</p>"
                        . "<p>2. Use a different search criteria.</p>"
                        . "<p>3. Contact the Bursary Office for Assistance</p>";
                    } else {
                        $admst = $conn->query("SELECT concat(surname,' ', firstname,' ', other) as aplname, applicant_adm, admission_no,"
                                . "inst_name, approval_status FROM student s left join application a on s.admission_no=a.applicant_adm "
                                . "WHERE admission_no='$admtxt'");
                        if (!$admst) {
                            echo $conn->error;
                        }
                        $row2 = $admst->fetch_assoc();
                        print "<p>Name: " . $row2['aplname'] . "</p><p>Admission Number: " . $row2['applicant_adm'] . "</p><p>"
                                . "Learning Institution: " . $row2['inst_name'] . "</p><p> Status: </p>";
                    }
                }
                ?>
            </div>
        </div>
        <script type="text/javascript">
            function changeSearchType() {
                var searchType = document.getElementById('search_Type');
                var nationalId = document.getElementById('id');
                var admission = document.getElementById('adm');

                if (searchType.value === 'nat_id') {
                    nationalId.style.display = 'block';
                    admission.style.display = 'none';
                } else if (searchType.value === 'admission') {
                    admission.style.display = 'block';
                    nationalId.style.display = 'none';
                } else {
                    nationalId.style.display = 'none';
                    admission.style.display = 'none';
                }

            }
        </script>

        <footer>
            <div class="container" style="background-color:  #080808;bottom:0%; width: 100%;">
                <div class="col-md-4">Copyright &COPY; 2016<a href="index.php">Bursary-Online</a></div>
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <p>Designed by: Alaro Hezron</p>
                    <p>NetGram Softwares</p>
                </div>
            </div>
        </footer>
    </body>
</html>