<?php
session_start();
require_once 'config/db.php';
?>


<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Hirevac</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <?php
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            SimsaiFah
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">หน้าหลัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="searchNumber.php">รายการเบอร์มงคล</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="article.php">บทความ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php"> เกี่ยวกับเรา</a>
                            </li>
                            <?php
                              if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {
                                  ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        logout
                                    </span>
                                </a>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="signin.php">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        เข้าสู่ระบบ
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                            <form class="form-inline">
                                <button class="btn   nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-7 col-md-8 mx-auto">
                        <div class="detail-box">
                            <h1>
                                วิเคราะห์ <br>
                                เบอร์ของท่าน
                            </h1>
                            <p>
                                ทำนายเบอร์ ที่ท่านใช้อยู่ตามหลักเลขศาสตร์
                            </p>
                        </div>
                    </div>
                </div>
                <div class="find_container ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 mx-auto">

                                <form action="filter.php" method="post">
                                    <div class="form-row col-lg-9 col-md-8 mx-auto">
                                        <div class="my-container ">
                                            <div class="form-group col-lg-12 " style="display: flex; padding:5px;">
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="0" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">--
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">--
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                                <input type="text" class="form-control" id="inputPatientName"
                                                    placeholder="" maxlength="1" autocomplete="off" value=""
                                                    style="width:30px;text-align: center;flex:5; padding:0 1px;">-
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="form-row col-lg-7 col-md-8 mx-auto">

                                        <div class="form-group col-lg-7 col-md-8 mx-auto">
                                            <div class="btn-box">
                                                <button type="submit" class="btn ">เริ่มเวิคราะห์</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- category section -->
    <section class="category_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์มังกร
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์หง
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์กวนอู
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์การงาน
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c5.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์นักเรียน
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2 px-0">
                    <a href="#" class="box">
                        <div class="img-box">
                            <img src="images/c6.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                เบอร์เก็บเงิน
                            </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end category section -->


    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                            Normal distribution of letters, as opposed to using 'Content here, content here', making it
                            look like
                            readable English. Many desktop publishing packages and web page editors has a more-or-less
                            normal
                            distribution of letters, as opposed to using 'Content here, content here', making it look
                            like readable
                            English. Many desktop publishing packages and web page editors
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- job section -->
    <section class="job_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    เบอร์มงคลแนะนำ
                </h2>
            </div>
            <div class="job_container">
                <h4 class="job_heading">
                    เบอร์เข้าใหม่
                </h4>
                <div class="row">
                    <!-- กล่อง 1  -->

                    <!-- ทด -->

                    <!-- *** -->
                    <?php
                    $stmt = $conn->query("SELECT * FROM stock");
                    $stmt->execute();
                    $stock = $stmt->fetchAll();

                    if (!$stock) {
                        echo "<tr><td colspan='6' class='text-center'>No phonenumber found</td></tr>";
                    } else {
                        foreach ($stock as $number) {
                            ?>
                    <tr>

                        <div class="col-lg-4">
                            <div class="box">
                                <div class="job_content-box">
                                    <div class="img-box">
                                        <img width="100%" src="network/<?= $number['network']; ?>" class="rounded"
                                            alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <?= $number['phonenumber']; ?>
                                        </h5>
                                        <div class="detail-info">
                                            <h6>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <span>
                                                    <?= $number['sum']; ?>
                                                </span>
                                            </h6>
                                            <h6>
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <span>
                                                    <?= $number['price']; ?>
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="option-box">
                                    <button class="fav-btn">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                    <a href="" class="apply-btn">
                                        buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }
                    } ?>


                        <!-- กล่อง2 -->
                        <div class="col-lg-4">
                            <div class="box">
                                <div class="job_content-box">
                                    <div class="img-box">
                                        <img src="images/job_logo2.png" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            065-456-6395
                                        </h5>
                                        <div class="detail-info">
                                            <h6>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <span>
                                                    TRUEMOVE
                                                </span>
                                            </h6>
                                            <h6>
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <span>
                                                    ฿450,000.-
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="option-box">
                                    <button class="fav-btn">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                    <a href="" class="apply-btn">
                                        buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="job_container">
                <h4 class="job_heading">
                    เบอร์ยอดนิยม
                </h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="job_content-box">
                                <div class="img-box">
                                    <img src="images/job_logo3.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Looking Graphic Designer (Logo + UI)
                                    </h5>
                                    <div class="detail-info">
                                        <h6>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Washington. D.C.
                                            </span>
                                        </h6>
                                        <h6>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>
                                                $1200/mo
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">
                                <button class="fav-btn">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                <a href="" class="apply-btn">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="job_content-box">
                                <div class="img-box">
                                    <img src="images/job_logo6.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Are you Typography Expert?
                                    </h5>
                                    <div class="detail-info">
                                        <h6>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                New York
                                            </span>
                                        </h6>
                                        <h6>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>
                                                $56 - $90
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">
                                <button class="fav-btn">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                <a href="" class="apply-btn">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="job_content-box">
                                <div class="img-box">
                                    <img src="images/job_logo5.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Looking WordPress Developer for ThemeForest
                                    </h5>
                                    <div class="detail-info">
                                        <h6>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Washington. D.C.
                                            </span>
                                        </h6>
                                        <h6>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>
                                                $400 - $540
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">
                                <button class="fav-btn">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                <a href="" class="apply-btn">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="job_content-box">
                                <div class="img-box">
                                    <img src="images/job_logo4.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Hiring Web Designer for Project
                                    </h5>
                                    <div class="detail-info">
                                        <h6>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Washington. D.C.
                                            </span>
                                        </h6>
                                        <h6>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>
                                                $350 - $450
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">
                                <button class="fav-btn">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                <a href="" class="apply-btn">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View All
                </a>
            </div>
        </div>
    </section>
    <!-- end job section -->

    <!-- expert section -->

    <section class="expert_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    บทความน่าสนใจ
                </h2>
                <p>
                    ความรู้ด้านศาสตร์ตัวเลข / ข้อควรรู้ก่อนเปลี่ยนและหลังเปลี่ยนเบอร์ / ฤกษ์งามยามดี / ฯลฯ
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/e1.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <a href="">
                                ความรู้ด้านศาสตร์ตัวเลข
                            </a>
                            <h6 class="expert_position">
                                <span>
                                    วิชาเลขศาสตร์
                                </span>
                                <span>
                                    41 Jobs Done
                                </span>
                            </h6>
                            <span class="expert_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <p>
                                Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel,
                                sed quam
                                nulla
                                mauris iaculis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/e2.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <a href="">
                                Semanta Klores
                            </a>
                            <h6 class="expert_position">
                                <span>
                                    Graphic Designer
                                </span>
                                <span>
                                    32 Jobs Done
                                </span>
                            </h6>
                            <span class="expert_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <p>
                                Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel,
                                sed quam
                                nulla
                                mauris iaculis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/e3.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <a href="">
                                Ryan Martines
                            </a>
                            <h6 class="expert_position">
                                <span>
                                    SEO Expert
                                </span>
                                <span>
                                    27 Jobs Done
                                </span>
                            </h6>
                            <span class="expert_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <p>
                                Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel,
                                sed quam
                                nulla
                                mauris iaculis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View All Freelancers
                </a>
            </div>
        </div>
    </section>

    <!-- end expert section -->

    <!-- info section -->
    <section class="info_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-2 info_links">
                    <h4>
                        Menu
                    </h4>
                    <ul>
                        <li class="active">
                            <a href="index.html">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="" href="job.html">
                                Jobs
                            </a>
                        </li>
                        <li>
                            <a class="" href="freelancer.html">
                                Freelancers
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>
                        Jobs
                    </h4>
                    <p>
                        Established fact that a reader will be distracted by the readable content of a page when looking
                        at its
                        layout. The point of using Lorem Ipsum
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="info_social">
                        <h4>
                            Social Link
                        </h4>
                        <div class="social_container">
                            <div>
                                <a href="">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info_form">
                        <h4>
                            Newsletter
                        </h4>
                        <form action="">
                            <input type="text" placeholder="Enter Your Email" />
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end info_section -->


    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
    var container = document.getElementsByClassName("my-container")[0];
    container.onkeyup = function(e) {

        var target = e.srcElement || e.target;


        var maxLength = parseInt(target.attributes["maxlength"].value, 10);

        var myLength = target.value.length;

        if (myLength >= maxLength) {
            var next = target;
            // console.log(target.value,maxLength,myLength,next);
            // console.log(next.parentNode);
            // console.log(next.parentNode.nextElementSibling);
            // console.log(next.parentNode.nextElementSibling.firstElementChild );
            while (next = next.parentNode.nextElementSibling.firstElementChild) {

                if (next == null)
                    break;
                if (next.tagName.toLowerCase() === "input" && next.classList.contains('digit')) {
                    next.focus();
                    break;
                }
            }
        }
        // Move to previous field if empty (user pressed backspace)
        else if (myLength === 0) {
            var previous = target;
            while (previous = previous.parentNode.previousElementSibling.firstElementChild) {
                if (previous == null)
                    break;
                if (previous.tagName.toLowerCase() === "input") {
                    previous.focus();
                    break;
                }
            }
        }
    }
    </script>

</body>

</html>