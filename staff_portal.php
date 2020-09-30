<?php
session_start();

if (empty($_SESSION["id"])) {
    header("Location: staff_login.php");
}
$username = $_SESSION["id"];
require './dbconnect.php';
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
        <title>staff portal - Bursary-Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>

        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="education.ico" type="image/x-icon"/>
        <style>
            .navigator{
                width: auto;
                float: left;
                min-height: fit-content;
            }

            li{
                list-style-type: none;
                padding: 5px;
            }
            .tab-content{
                float: right;  
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <a href="staff_portal.php"></a>
                <div class="col-md-8">
                    <p><a href=index.php>Bursary-Online</a></p>

                    <p>financial support to needy students</p>
                </div>
                <div class="col-md-4">
                    <p>Hi  <?php echo $_SESSION["id"]; ?>
                        <a style="float: right" href="logout.php" >logout</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container" style="min-height: 570px; border-top: 1px solid #8c8c8c;">
            <div class="navigator well container-fluid">

                <ul class="nav nav-tabs nav-stacked">
                    <li><a href="staff_portal.php">My Home</a></li>
                    <li><a data-toggle="tab" href="#applicants">applications</a></li>
                    <li><a data-toggle="tab" href="#institutions">Institutions</a></li>
                    <li><a data-toggle="tab" href="#verify">verify application</a></li>
                    <li><a data-toggle="tab" href="#Q_A">Q&A</a></li>
                </ul>

            </div>
            <div class="tab-content">
                <div class="tab-pane" id="applicants">
                    <?php
                    require './dbconnect.php';

                    $sql = "SELECT surname, firstname, other, applicant_adm, inst_level, inst_name, parental_status, ward"
                            . " FROM student, application"
                            . " WHERE admission_no=applicant_adm";
                    $respone = $conn->query($sql);

                    if (!$conn->query($sql)) {
                        print 'An error occurred. Records could not be retrieved' . $conn->error;
                    } else {
                        if ($respone->num_rows > 0) {
                            print "<form>"
                                    . "<input type = 'search' placeholder = 'Enter Keyword'>"
                                    . "<button class = 'btn btn-info'>"
                                    . "<span class = 'glyphicon glyphicon-search'></span>"
                                    . "search</button>"
                                    . "</form >";
                            print "<table class='table-striped table'><thead >"
                                    . "<tr class='bg-info'><td>#</td><td>applicant name</td><td>"
                                    . "Admission Number</td><td>Parental Status</td><td>Level</td>"
                                    . "<td>Learning Institution</td><td>Contact Details</td><td>"
                                    . "Residence</td></tr><thead>";
                            print "<tbody>";

                            $count = 0;
                            while ($row = $respone->fetch_assoc()) {
                                $count++;

                                print "<tr><td>" . $count . "</td>"
                                        . "<td>" . $row['surname'] . " " . $row['firstname']
                                        . " " . $row['other'] . "</td>"
                                        . "<td>"
                                        . $row['applicant_adm'] . "</td>"
                                        . "<td>" . $row['parental_status'] . "</td>"
                                        . "<td>".$row['inst_level']."</td><td>"
                                        . "<a>" . $row['inst_name'] . "</a>"
                                        . "</td><td><a href='staff_portal.php'>View</a></td><td>" . $row['ward'] . "</tr>";
                            }
                            print "</tbody>";
                            print "</table>";
                        } else {
                            print 'No Records Found';
                        }
                    }
                    
                    ?>

                </div>
                <div class="tab-pane" id="institutions">
                    <?php
                    
                    $sqli = "SELECT inst_name, count(inst_name)as no FROM application GROUP BY inst_name";

                    $reply = $conn->query($sqli);

                    if (!$reply) {
                        print "Requested Information could not be retrieved " . $conn->error;
                    } else {
                        if ($reply->num_rows > 0) {
                            print "<table class='table-striped table'><thead><tr class='bg-info'>";
                            print "<td>#</td><td>Name of Institution</td><td>Number of Applications</td><td>phone contact</td>"
                                    . "<td>email</td><td>Status</td><td>Personnel</td>";
                            print "</tr></thead><tbody>";

                            $i = 0;
                            while ($row1 = $reply->fetch_assoc()) {

                                $i++;
                                print "<tr><td>" . $i . "</td><td>" . $row1['inst_name'] . "</td><td><a>" . $row1['no'] . "</a>"
                                        . "</td></tr>";
                            }

                            print "</table>";
                        } else {
                            print "No Records Exist";
                        }
                    }
                    ?>

                </div>
                <div class="tab-pane" id="verify">
                    <?php
                    $ver = $conn->query("SELECT admission_no, bursary_type, recommendation, "
                            . "approval_status FROM student s, applicant p, application a "
                            . "WHERE s.admission_no=p.applicant_adm AND a.applicant_adm=s.admission_no "
                            . "AND a.approval_status=''"); 
                    
                    if(!$ver){
                        echo "request failed".$conn->error;
                    }
                    ?>
                </div>
                <div class="tab-pane" id="Q_A">

                </div>
            </div>
        </div>
        <footer style="background-color:  #080808;bottom:0%; width: 100%;height: 100%">
            <div class="container footer affix-bottom" style="background-color:  #080808;">
                <div class="col-md-4">Copyright &COPY; <?php echo date; ?><a href="index.php">Bursary-Online</a></div>
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
