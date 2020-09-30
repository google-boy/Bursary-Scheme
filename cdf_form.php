<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bursary-Online | Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/my_javascript.js"></script>
        <link rel="icon" href="education.ico" type="image/x-icon"/>

        <style>
            .form-group{
                padding: 2%;
            }
            .form{
                margin: 5%;
            }
            .header{
                color:  #663300;
            }


            .table-editable {
                position: relative;
                


            }

            .table-remove {
                color: red;
                cursor: pointer;

                &:hover {
                    color: #f00;
                }
            }

            .glyphicon-plus{
                color:  green;
                cursor: pointer;
            }


        </style>
        <script>
            $(document).ready(function () {

                $("#add").click(function () {
                    $("#table-data1").show();
                    $("#table-data").show();
                });
                $("#add").dblclick(function () {
                    $("#table-data2").show();
                    $("#table-data0").show();
                });



                $('.table-remove').click(function () {
                    $(this).parents('tr').hide();
                });
                $("#slevel").click(function () {
                    $("#secondary").show();
                    $("#college, #university").hide();

                });
                $("#clevel").click(function () {

                    $("#college").show();
                    $("#university ,#secondary").hide();
                });
                $("#ulevel").click(function () {
                    $("#secondary, #college").hide();

                    $("#university").show();
                });
                $('[data-toggle="tooltip"]').tooltip();
            });






        </script>
    </head>
    <body>
        <div class="container" style="background-color: #663300; width: 100%">
            <div class="row">
                <div class="col-md-8" style=" padding-top: 2%;">
                    <p><a href=index.php><h2>Bursary-Online</h2></a></p>
                    <p>financial support to needy students</p>
                </div>
                <div class="col-md-4" style=" padding-top: 2%;">

                </div>
            </div>
        </div>
        
        <ul class="breadcrumb" >
            <li>You are here  <span class="glyphicon glyphicon-arrow-right"></span></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="application.html">Application</a></li>
            <li><a href="application.html">Apply Now</a></li>
            <li class="active">Application form</li>        
        </ul>
    <?php
    if(!empty($_GET['application']) && $_GET['application']=='success'){
        ?>
        <h1 class="alert-success">Form Sent Successfully</h1>
            <?php
    }
?>
    <div class="form">
        <form class="form-inline" role="form"  method="post" action="form.php">
            <fieldset>
                <legend><p class="bg-primary">Instructions</p></legend>
                <strong>
                    <p>You are required to fill all the fields marked*</p>
                    <p>Make sure you provide truthful information failure to which a legal action will be taken against you</p>
                    <p>Remember there is no room for double application, otherwise it will lead to automatic disqualification</p>
                </strong>
            </fieldset>
            <fieldset>
                <legend><p class="bg-info">Personal Details</p></legend>
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="SName">Surname*:</label>
                                <input type="text" name="sname" class="form-control" id="sname" required="required">
                            </div></td><td>
                            <div class="form-group">
                                <label for="FName">First Name<span class="error">*</span>:</label>
                                <input type="text" name="fname" class="form-control" required="required">
                            </div></td><td>
                            <div class="form-group">
                                <label for="MName">other names:</label>
                                <input type="text" name="mname" class="form-control">
                            </div></td>
                    </tr>
                    <tr><td>
                            <div class="form-group">
                                <label for="DOB">Date Of Birth*:</label>
                                <input type="date" name="dob" class="form-control" required placeholder="mm/dd/yyyy">
                            </div>
                        </td><td>
                            <div class="form-group gender well" >
                                <label for="gender"> Gender*:</label>
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="male" required="required">Male</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="female" required="required">Female</label>
                                </div>  
                            </div></td> <td> 
                            <div class="form-group">
                                <label for="ID">National ID:</label>
                                <input type="number" name="id_no" class="form-control" placeholder="ID Number">
                            </div> </td>
                    </tr>
                    <tr><td>
                            <div class="form-group">
                                <label for="ADM">Admission Number*:</label>
                                <input type="text" name="ad_no" class="form-control" required
                                       data-toggle="tooltip" title="enter this in the correct format">
                            </div></td>
                        <td>
                            <div class="form-group">
                                <label for="PHONE">Phone Number:</label>
                                <input type="number" name="phone" class="form-control">
                            </div> </td>
                        <td>
                            <div class="form-group">
                                <label for="EMAIL">Email:</label>
                                <input type="email" name="p_email" class="form-control">
                            </div> </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend class="bg-info">family details</legend>
                <div class="form-group">
                    <label for="PS">Parental Status:</label>
                    <select class="form-control" id="ps" onchange="parentalStatus()" name="parentalstatus">
                        <option value=""></option>
                        <option id="p_alive" value="both parents alive">Both parents Alive</option>
                        <option id="partial" value="partial orphan">Partial Orphan</option>

                        <option id="total" value="total orphan" >Total Orphan</option>

                    </select>

                </div>
                <div class="panel-group" id="family" style="display: none;">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="flink">
                            <a href="#father" class="btn" data-toggle="collapse" data-parent="#family">enter father details</a>
                        </div>
                        <div id="father" class="collapse">


                            <div class="form-group">
                                <label for="Name">Name*:</label>
                                <input type="text" name="f_name" class="form-control" id="sname">
                            </div>
                            <div class="form-group">
                                <label for="alive">Is he Alive?</labe>
                                    <select class="form-control" id="father_h" name="health_f" onchange="changeDoc()">
                                        <option value=""></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                            </div>




                            <div class="form-group" id="national_f">
                                <label for="ID">National ID:</label>
                                <input type="number" name="id_f" class="form-control" placeholder="ID Number">
                            </div> 
                            <div class="form-group" style="display: none;"  id="document_f">
                                <label for="document">Proof Document</label>
                                <select class="form-control" name="docname_f">
                                    <option value=""></option>
                                    <option value="">Death Certificate</option>
                                    <option value="">Burial Permit</option>
                                </select>
                                <label for="docno">Enter number*:</label>
                                <input type="text" name="docno_f" class="form-control">
                            </div>
                            <div class="form-group"id="occupation_f">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="foccupation" class="form-control">
                            </div>

                            <div class="form-group" id="phone_f">
                                <label for="PHONE">Phone Number:</label>
                                <input type="number" name="fphone" class="form-control">
                            </div> 

                            <div class="form-group" id="email_f">
                                <label for="EMAIL">Email:</label>
                                <input type="email" name="femail" class="form-control">
                            </div> 


                        </div>
                    </div>
                    <div class="panel panel-default" id="mlink">
                        <div class="panel-heading">
                            <a href="#mother" class="btn" data-toggle="collapse" data-parent="#family">enter mother details</a>
                        </div>
                        <div id="mother" class="collapse">
                            <div class="form-group">
                                <label for="Name">Name*:</label>
                                <input type="text" name="m_name" class="form-control" id="sname">
                            </div>
                            <div class="form-group">
                                <label for="alive">Is she Alive?</labe>
                                    <select class="form-control" id="mother_h" name="health_m" onchange="changeDoc()">
                                        <option value=""></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                            </div>




                            <div class="form-group" id="national_m">
                                <label for="ID">National ID:</label>
                                <input type="number" name="id_mo" class="form-control" placeholder="ID Number">
                            </div> 
                            <div class="form-group" style="display: none;"  id="document_m">
                                <label for="document">Proof Document*:</label>
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="">Death Certificate</option>
                                    <option value="">Burial Permit</option>
                                </select>
                                <label for="docno">Enter number*:</label>
                                <input type="text" name="docno_m" class="form-control">
                            </div>
                            <div class="form-group"id="occupation_m">
                                <label for="occupation">Occupation*:</label>
                                <input type="text" name="moccupation" class="form-control">
                            </div>

                            <div class="form-group" id="phone_m">
                                <label for="PHONE">Phone Number:</label>
                                <input type="number" name="mphone" class="form-control">
                            </div> 

                            <div class="form-group" id="email_m">
                                <label for="EMAIL">Email:</label>
                                <input type="email" name="memail" class="form-control">
                            </div> 

                        </div>
                    </div>
                    <div class="panel panel-default" id="glink">
                        <div class="panel-heading">
                            <a href="#guardian" class="btn" data-toggle="collapse" data-parent="#family" >
                                enter guardian details</a>
                        </div>
                        <div id="guardian" class="collapse">

                            <div class="form-group">
                                <label for="SName">Name*:</label>
                                <input type="text" name="gname" class="form-control" id="sname" >
                            </div>




                            <div class="form-group">
                                <label for="ID">National ID*:</label>
                                <input type="number" name="id_g" class="form-control" placeholder="ID Number">
                            </div> 

                            <div class="form-group">

                                <label for="PHONE">Phone Number:</label>
                                <input type="number" name="gphone" class="form-control">
                            </div> 

                            <div class="form-group">
                                <label for="EMAIL">Email:</label>
                                <input type="email" name="gemail" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="gocc">Occupation*:</label>
                                <input type="text" name="g_occ" class="form-control">
                            </div>
                            <div>
                                <label for="rel">Relationship to Applicant*:</label>
                                <input type="text" name="grelation" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" id="mlink">
                        <div class="panel-heading">
                            <a href="#sibling" class="btn" data-toggle="collapse" data-parent="#family">Sibling</a>
                            You can provide details of Sibling(s) in Secondary or Tertiary Institution(s).
                        </div>
                        <div id="sibling" class="collapse">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th><span class="table-add glyphicon glyphicon-plus" id="add">ADD</span></th>
                                        <th>Admission Number</th>
                                        <th>Name</th>
                                        <th>Learning Institution</th>
                                        <th>Fee Per Year</th>

                                    </tr>
                                </thead>

                                <tr id="table-data">
                                    <td></td>
                                    <td><input type="text" name="sbadm_1" ></td>
                                    <td><input type="text" name="sbname_1" ></td>
                                    <td><input type="text" name="sbsch_1" ></td>
                                    <td><input type="number" name="sbfee_1" ></td>

                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove">remove</span>
                                    </td>

                                </tr>
                                <tr id="table-data0">
                                    <td></td>
                                    <td><input type="text" name="sbadm_2" ></td>
                                    <td><input type="text" name="sbname_2" ></td>
                                    <td><input type="text" name="sbsch_2" ></td>
                                    <td><input type="number" name="sbfee_2" ></td>

                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove">remove</span>
                                    </td>

                                </tr>
                                <tr id="table-data1" style="display:none;">
                                    <td></td>
                                    <td><input type="text" name="sbadm_3" ></td>
                                    <td><input type="text" name="sbname_3" ></td>
                                    <td><input type="text" name="sbsch_3" ></td>
                                    <td><input type="number" name="sbfee_3" ></td>

                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove">remove</span>
                                    </td>

                                </tr>
                                <tr id="table-data2" style="display:none;">
                                    <td></td>
                                    <td><input type="text" name="sbadm_4" ></td>
                                    <td><input type="text" name="sbname_4" ></td>
                                    <td><input type="text" name="sbsch_4" ></td>
                                    <td><input type="number" name="sbfee_4" ></td>

                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove">remove</span>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><p class="bg-info">Residential details</p></legend>
                <div class="form-group">
                    <label for="PS">Sub-County:</label>
                    <select class="form-control" id="subc" required="required" name="subc">
                        <option value="">Select</option>
                        <option value="muhoroni">Muhoroni</option>
                        <option value="nyakach">Nyakach</option>
                        <option value="nyando">Nyando</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="PS">Constituency:</label>
                    <select class="form-control" id="cons" required="required" name="cons" onchange="selectWard()">
                        <option value="">Select</option>
                        <option value="muhoroni">Muhoroni</option>
                        <option value="nyakach">Nyakach</option>
                        <option value="nyando">Nyando</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="PS">Ward:</label>
                    <select class="form-control" id="muhoroni_w"  name="1_ward" >
                        <option value="">Select</option>
                        <option value="koru">Koru</option>
                        <option value="muhoroni town">Muhoroni Town</option>
                        <option value="ombeyi south">Ombeyi South</option>
                        <option value="ombeyi North">Ombeyi North</option>
                        <option value="chemelil">Chemelil</option>
                        <option value="miwani">Miwani</option>
                    </select>
                    <select class="form-control" id="nyakach_w"  name="2_ward"  style="display: none">
                        <option value="">Select</option>
                        <option value="south east nyakach">South East Nyakach</option>
                        <option value="south west nyakach">South West Nyakach</option>
                        <option value="north nyakach">North Nyakach</option>
                        <option value="central nyakach">Central Nyakach</option>
                        <option value="west nyakach">West Nyakach</option>

                    </select>
                    <select class="form-control" id="nyando_w"  name="3_ward"  style="display: none;">
                        <option value="">Select</option>
                        <option value="awasi">Awasi</option>
                        <option value="kochogo">Kochogo</option>
                        <option value="kakola">Kakola</option>
                        <option value="kobura">Kobura</option>
                        <option value="Onjiko">Onjiko</option>

                    </select>
                </div><br/>
                <div class="form-group">
                    <label for="PS">Location:</label>
                    <select class="form-control" id="muhoroni_l"  name="1_loc"  onchange="sublocation()" 
                            >
                        <option value="">Select</option>
                        <option value="koru" >Koru</option>

                        <option value="ombeyi" >Ombeyi</option>

                        <option value="chemelil" >Chemelil</option>
                        <option value="miwani" >Miwani</option>
                    </select>
                    <select class="form-control" id="nyakach_l"  name="2_loc"  onchange="sublocation()"
                            style="display: none">
                        <option value="">Select</option>
                        <option value="south east nyakach" >South East Nyakach</option>
                        <option value="south west nyakach" >South West Nyakach</option>
                        <option value="north nyakach">North Nyakach</option>
                        <option value="central nyakach">Central Nyakach</option>
                        <option value="west nyakach">West Nyakach</option>

                    </select>
                    <select class="form-control" id="nyando_l"  name="3_loc"  onchange="sublocation()"
                            style="display: none;">
                        <option value="">Select</option>
                        <option value="awasi">Awasi</option>
                        <option value="kochogo">Kochogo</option>
                        <option value="kakola">Kakola</option>
                        <option value="kobura" id="kb">Kobura</option>
                        <option value="Onjiko">Onjiko</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="PS">Sub-location:</label>
                    <select class="form-control" id="koru"  name="1_subloc" >
                        <option value="">Select</option>
                        <option value="muhoroni town">Muhoroni Town</option>
                        <option value="tonde">Tonde</option>
                        <option value="orego">Orego</option>
                        <option value="homa line">Homa Line</option>
                    </select>
                    <select class="form-control" id="ombeyi"  name="2_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="obumba">Obumba</option>
                        <option value="kang'o">Kango</option>
                        <option value="ramula">Ramula</option>
                        <option value="kore">Kore</option>
                    </select>
                    <select class="form-control" id="chemelil"  name="3_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="upper tamu">Upper Tamu</option>
                        <option value="lower tamu">Lower Tamu</option>
                        <option value="kibigori">Kibigori</option>
                        <option value="chemelil">Chemelil</option>
                    </select>
                    <select class="form-control" id="miwani"  name="4_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="miwani north">Miwani North</option>
                        <option value="miwani west">Miwani West</option>
                        <option value="miwani central">Miwani Cental</option>
                        <option value="miwani east">Miwani East</option>
                    </select>
                    <select class="form-control" id="senya"  name="5_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="east koguta">East Koguta</option>
                        <option value="east kadianga">East Kadiang'a</option>
                        <option value="ramogi">Ramogi</option>

                    </select>
                    <select class="form-control" id="swnya"  name="6_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="kajimbo">Kajimbo</option>
                        <option value="ramogi">Ramogi</option>
                        <option value="gari">Gari</option>
                        <option value="west kadianga">West Kadiang'a</option>
                    </select>
                    <select class="form-control" id="awasi"  name="7_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="magina">Magina</option>
                        <option value="nyakongo">Nyakongo</option>
                        <option value="kotelo">Kotelo</option>
                        <option value="Achego">Achego</option>
                    </select><select class="form-control" id="kobura"  name="8_subloc"  style="display: none">
                        <option value="">Select</option>
                        <option value="kotieno">Kotieno</option>
                        <option value="lela">Lela</option>
                        <option value="masogo">Masogo</option>
                        <option value="kamayoga">Kamayoga</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="PS">Village:</label>
                    <input type="text" name="village" required>
                </div>
            </fieldset>
            <fieldset>
                <legend><p class="bg-info">institution details</p></legend>
                <div class="form-group well" >
                    <label for="I_LEVEL"> Level:</label>
                    <div class="radio">
                        <label><input type="radio" name="level" value="secondary" id="slevel"
                                      required >Secondary</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="level" value="college" required id="clevel"
                                      >College</label>
                    </div>  
                    <div class="radio">
                        <label><input type="radio" name="level" value="university" id="ulevel"
                                      required >University</label>
                    </div> 
                </div>  
                <div class="form-group">
                    <label for="IN">Institution Name:</label>
                    <select class="form-control" id="secondary"  name="Inames" contenteditable="true">
                        <option value="">Choose...</option>
                        <option value="nyakoko mixed">Nyakoko Mixed</option>
                        <option value="ahero girls">Ahero Girls</option>
                        <option value="masara mixed">Masara Mixed</option>

                    </select>
                    <select class="form-control" id="college"  name="Inamec" style="display: none;" contenteditable="true">
                        <option value="">Choose...</option>
                        <option value="tambach ttc">Tambach TTC</option>
                        <option value="kisii ttc">Kisii TTC</option>
                        <option value="kisumu polytechnic">Kisumu Polytechnic</option>

                    </select>
                    <select class="form-control" id="university"  name="Inameu" style="display: none;" contenteditable="true">
                        <option value="">Choose...</option>
                        <option value="University of nairobi">Universty of Nairobi</option>
                        <option value="pwani university">Pwani University</option>
                        <option value="Kenyatta University">Kenyatta University</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year Admitted:</label> 
                    <select class="form-control" id="yearAdmitted" required="required" name="year">
                        <option value="">Choose</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2010">2016</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="BRANCh">Branch:</label>
                    <input type="text" name="branch" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ADR">Address:</label>
                    <textarea class="form-control" rows="5" name="address" required="required"></textarea>
                </div>  
                <div class="form-group">
                    <label for="TEL">Telephone:</label>
                    <input type="tel" name="telephone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="PHONE">Phone:</label>
                    <input type="tel" name="cellphone" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="EMAIL">Email:</label>
                    <input type="email" name="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="website">website:</label>
                    <input type="website" name="website" class="form-control">
                </div>

            </fieldset>
            <input type="submit" class="btn btn-success btn-lg"  
                   style="float: right;" name="submit" value="submit">
        </form>

    </div>
</form>





<footer>
    <div class="container" style="background-color:#663300;bottom:0%; width: 100%;">
        <div class="col-md-4">Copyright &COPY; 2016 <a href="index.php">Bursary-Online</a></div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <p>Designed by: Alaro Hezron</p>
            <p>NetGram Softwares</p>
        </div>
    </div>
</footer>

</body>
</html>
