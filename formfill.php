

<?php

//database connection
require './dbconnect.php';


if (isset($_POST['submit'])) {
    $last_name = ($_POST['sname']);
    $first_name = ($_POST['fname']);
    $middle_name = ($_POST['mname']);
    $adm = ($_POST['ad_no']);
    $nID = ($_POST['id_no']);
    $gend = ($_POST['gender']);
    $dob = ($_POST['dob']);
    $phone = ($_POST['phone']);
    $email = ($_POST['email']);
    
    $sub = $_POST['subc'];
    $cons = $_POST['cons'];
    $ward = $_POST['ward'];
    $loc = $_POST['loc'];
    $subl = $_POST['subloc'];
    $vilg = $_POST['village'];
    
    $level = $_POST['level'];
    $name = $_POST['Iname'];
    $year = $_POST['year'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $teleph = $_POST['telephone'];
    $cellph = $_POST['cellphone'];
    $Imail = $_POST['email'];
    $website = $_POST['website'];
}

$sql1 = "INSERT INTO APPLICANT "
        . "(admission_no, id_number, surname, firstname, middlename, gender, date_of_birth, phone, email)"
        . " VALUES('$adm', '$nID', '$last_name', '$first_name', '$middle_name', '" . $gend . "', '$dob', '$phone', '$email')";
$sql2 = "INSERT INTO RESIDENTIAL_DETAILS"
        . "(applicant_adm, subcounty, constituency, ward, location, sublocation, village)"
        . " VALUES('$adm', '$sub', '$cons', '$ward', '$loc', '$subl','$vilg')";
$sql3 = "INSERT INTO INSTITUTION_DETAILS"
        . "(applicant_adm, level, name, year_admitted, branch, address, telephone, cellphone, email, website)"
        . "VALUES('$adm', '$level', '$name', '$year', '$branch', '$address', '$teleph', '$cellph','$Imail', '$website')";
if ($conn->query($sql1)&& $conn->query($sql2)&& $conn->query($sql3)) {
    echo 'form send successful';
} else {
    echo 'send fail' . $conn->error;
}
$conn->close();
?>

