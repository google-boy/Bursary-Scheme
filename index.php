<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome To Bursary-Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.2.0.js"></script>
        
        <link rel="icon" href="education.ico" type="image/x-icon"/>
        <script src="js/bootstrap.min.js"></script>

        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 70%;
                height: 30%;
                margin-left: 15%;
                margin-right: 15%;
            }
            .info-area{


                border-right:  1px solid #080808;
                padding-top: 5%;


            }
            .news-events{


                border-right:  1px solid #080808;
                padding-top: 2%;
            }
            nav{
                margin-left: 20%;
            }
            .carousel{

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
                    <form>
                        <input type="search" placeholder="Enter Keyword">
                        <button class="btn btn-info">
                            <span class="glyphicon glyphicon-search"></span>
                            search</button>
                    </form>
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
    <di>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/students_4.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/students_3.jpg" alt="">
                </div>

                <div class="item">

                    <img src="images/students_2.jpg" alt=""/>
                </div>

                <div class="item">
                    <img src="images/students_1.jpg" alt="">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-6 info-area bg-info">
            <p>
                Welcome to <a href="index.php">Bursary-Online.</a>We promise you the best experience
                when you use our site.
            </p>
            <p>
                Students in secondary and Tertiary learning learning institutions can use the services
                of this site to apply for financial support.
            </p>
            <p>
                Remember to adhere to the rules and guidelines
            </p>
        </div>
        <div class="col-md-3 news-events">
            <h4 class="bg-primary">News and Events</h4>
            <ul>
                <li><a href="#">harambee</a></li>
                <li><a href="#">prayer for KCSE candidates</a></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>
    <footer style="background-color:  #080808;bottom:0%; width: 100%;height: 100%">
        <div class="container footer affix-bottom" style="background-color:  #080808;">
            <div class="col-md-4">Copyright &COPY; 2016<a href="index.php">Bursary-Online</a></div>
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
