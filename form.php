<?php

//database connection
require './dbconnect.php';



if (isset($_POST['submit'])) {

    //personal details
    $last_name = (($_POST['sname']));
    $first_name = ($_POST['fname']);
    $middle_name = ($_POST['mname']);
    $adm = ($_POST['ad_no']);
    $nID = ($_POST['id_no']);
    $gend = ($_POST['gender']);
    $dob = ($_POST['dob']);
    $phone = ($_POST['phone']);
    $email = ($_POST['p_email']);


    //parental details
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $g_name = $_POST['gname'];
    $f_health = $_POST['health_f'];
    $m_health = $_POST['health_m'];
    $g_id = $_POST['id_g'];
    $f_doc = empty($_POST['id_f']) ? $_POST['docno_f'] : $_POST['id_f'];
    $m_doc = empty($_POST['id_mo']) ? $_POST['docno_m'] : $_POST['id_mo'];
    $g_ph = $_POST['gphone'];
    $f_occ = $_POST['foccupation'];
    $m_occ = $_POST['moccupation'];
    $g_em = $_POST['gemail'];
    $f_ph = $_POST['fphone'];
    $m_ph = $_POST['mphone'];
    $g_occ = $_POST['g_occ'];
    $f_em = $_POST['femail'];
    $m_em = $_POST['memail'];
    $g_rel = $_POST['grelation'];
    $p_status = $_POST['parentalstatus'];

    $sbadm = $_POST['sbadm_1'];
    $sb_adm = $_POST['sbadm_2'];
    $sbname = $_POST['sbname_1'];
    $sb_name = $_POST['sbname_2'];
    $sbsch = $_POST['sbsch_1'];
    $sb_sch = $_POST['sbsch_2'];
    $sbfee = $_POST['sbfee_1'];
    $sb_fee = $_POST['sbfee_2'];




    $sub = ($_POST['subc']);
    $cons = ($_POST['cons']);
    $ward = $_POST['1_ward'] or $_POST['2_ward'] or $_POST['3_ward'];
    $loc = $_POST['1_loc'] or $_POST['2_loc'] or $_POST['3_loc'];
    $subl = $_POST['1_subloc'] or $_POST['2_subloc'] or $_POST['3_subloc'] or $_POST['4_subloc']
            or $_POST['5_subloc'] or $_POST['6_subloc'] or $_POST['7_subloc'] or $_POST['8_subloc'];
    $vilg = ($_POST['village']);

    $level = ($_POST['level']);

    if (empty($_POST['Inames'])) {
        $name = empty($_POST['Inamec']) ? $_POST['Inameu'] : $_POST['Inamec'];
    }  else {
        $name = $_POST['Inames'];
    }

    
    $year = ($_POST['year']);
    $branch = ($_POST['branch']);
    $address = ($_POST['address']);
    $teleph = ($_POST['telephone']);
    $cellph = ($_POST['cellphone']);
    $Imail = ($_POST['email']);
    $website = ($_POST['website']);


    $student = "INSERT IGNORE INTO STUDENT "
            . "(admission_no, national_id, surname, firstname, other, gender, dateofbirth, phone, emailaddr)"
            . " VALUES('$adm', '$nID', '$last_name', '$first_name', '$middle_name', '" . $gend . "', '$dob', '$phone', '$email')";

    if (!$conn->query($student)) {
        $status = "Student already";
    }
    $dad = "INSERT IGNORE INTO FATHER"
            . "(name, alive, document_number, occupation, phone, email)"
            . "VALUES('$f_name', '$f_health', '$f_doc', '$f_occ', '$f_ph', '$f_em')";
    if (!$conn->query($dad)) {
        $status.="father details already";
    }
    $mum = "INSERT IGNORE INTO MOTHER"
            . "(name, alive, document_number, occupation, phone, email)"
            . "VALUES('$m_name', '$m_health', '$m_doc', '$m_occ', '$m_ph', '$m_em')";
    if (!$conn->query($mum)) {
        $status.="already saved";
    }
    $gurd = "INSERT IGNORE INTO GUARDIAN"
            . "(name, document_number, occupation, relationship, phone, email)"
            . "VALUES('$g_name', '$g_id', '$g_occ', '$g_rel', '$g_ph', '$g_em')";
    if (!$conn->query($gurd)) {
        
    }
    $sibling = "INSERT IGNORE INTO SIBLING"
            . "(admission_no, name, institution, feeperyear)"
            . "VALUES('$sbadm', '$sbname', '$sbsch', '$sbfee')";
    if (!$conn->query($sibling)) {
        
    }
    $residence = "INSERT IGNORE INTO RESIDENCE"
            . "(subcounty, constituency, ward, location, sublocation, village)"
            . " VALUES('$sub', '$cons', '$ward', '$loc', '$subl','$vilg')";
    if (!$conn->query($residence)) {
        
    }
    $skul = "INSERT IGNORE INTO INSTITUTION"
            . "(name,branch, address, telephone, phone, email, website)"
            . "VALUES('$name', '$branch', '$address', '$teleph', '$cellph','$Imail', '$website')";
    if (!$conn->query($skul)) {
        
    }
    $aplikant = "INSERT INTO APPLICANT"
            . "(applicant_adm, inst_name, year_admitted, ward, village, father_docno, mother_docno, guardian_docno, sibling_admno)"
            . "VALUES('$adm', '$name', '$year', '$ward', '$vilg', '$f_doc', '$m_doc', '$g_id', '$sbadm')";
    $app = "INSERT INTO APPLICATION"
            . "(bursary_type, date, applicant_adm, applicant_idno, inst_level, inst_name, parental_status, ward, village)"
            . "VALUES('cdf', curdate(), '$adm', '$nID', '$level', '$name', '$p_status', '$ward',  '$vilg')";
    if ($conn->query($aplikant) && $conn->query($app)) {
        header("Location: cdf_form.php?application=success");
    } else {
        echo '<p>send fail<p>' . $conn->error;
    }
}
$conn->close();


