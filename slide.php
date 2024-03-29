<?php
session_start();
require_once 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Bootstrap Theme The Band</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    .container {
        padding: 80px 120px;
    }

    .person {
        border: 10px solid transparent;
        margin-bottom: 25px;
        width: 80%;
        height: 80%;
        opacity: 0.7;
    }

    .person:hover {
        border-color: #f1f1f1;
    }
    </style>
</head>

<body>
    <?php include('nav.php'); ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-touch="true">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="ny.jpg" alt="New York" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>New York</h3>
                    <p>The atmosphere in New York is lorem ipsum.</p>
                </div>
            </div>

            <div class="item">
                <img src="chicago.jpg" alt="Chicago" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago - A night we won't forget.</p>
                </div>
            </div>

            <div class="item">
                <img src="la.jpg" alt="Los Angeles" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>LA</h3>
                    <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
                </div>
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

    <div class="container text-center">
        <h3>THE BAND</h3>
        <p><em>We love music!</em></p>
        <p>We have created a fictional band website. Lorem ipsum..</p>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <p class="text-center"><strong>Name</strong></p><br>
                <a href="#demo" data-toggle="collapse">
                    <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo" class="collapse">
                    <p>Guitarist and Lead Vocalist</p>
                    <p>Loves long walks on the beach</p>
                    <p>Member since 1988</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Name</strong></p><br>
                <a href="#demo2" data-toggle="collapse">
                    <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo2" class="collapse">
                    <p>Drummer</p>
                    <p>Loves drummin'</p>
                    <p>Member since 1988</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Name</strong></p><br>
                <a href="#demo3" data-toggle="collapse">
                    <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo3" class="collapse">
                    <p>Bass player</p>
                    <p>Loves math</p>
                    <p>Member since 2005</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>