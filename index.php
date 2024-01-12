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

    <title>simsaifah</title>


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
        <?php include('nav.php'); ?>
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
                                <form id="horo" action="horocal.php" method="post" enctype="multipart/form-data">

                                    <div class="form-row col-lg-9 col-md-8 mx-auto">
                                        <div class="my-container">

                                            <div class="form-group col-lg-12 " style="display: flex; padding:5px;">
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder="0"
                                                        maxlength="1" autocomplete="off" value="0" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>--
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>--
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
                                                <div>
                                                    <input type="text" class="form-control digit" placeholder=""
                                                        maxlength="1" autocomplete="off" value="" pattern="[0-9]*"
                                                        name="numbers[]" onkeydown=""
                                                        style="width:30px;text-align: center;flex:5; padding:0 1px;">
                                                </div>-
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
                                ซิมสายฟ้า
                            </h2>
                        </div>
                        <p>
                            ทุกเบอร์ในเว็บไซต์ซิมสายฟ้า ผ่านการคัดเลือกมาอย่างถี่ถ้วนตามหลัก ศาสตร์พลังตัวเลข
                            โดยผู้เชี่ยวชาญด้านพลังตัวเลขในเบอร์มือถือ ท่านสามารถเลือกเบอร์มือถือเองได้
                            โดยเลือกให้เหมาะสมกับอาชีพของท่าน และสิ่งที่ท่านต้องการเปลี่ยนแปลงชีวิต
                            (ค้นหาเบอร์มงคลที่ท่านต้องการที่นี่) เมื่อเลือกเบอร์ที่ต้องการได้แล้ว
                            ก็กดที่ตัวเลขเบอร์มือถือ เพื่ออ่านความหมาย คำทำนายเบอร์
                            ซึ่งเราก็ได้ทำระบบวิเคราะห์เบอร์มือถือไว้ให้ท่านอ่านความหมายของเบอร์เองได้อย่างละเอียดและแม่นยำ
                            ซึ่งขอย้ำว่าผลรวมในเบอร์มือถือจะไม่ส่งผลกับตัวเรา
                            ทั้งนี้การเลือกเบอร์มงคลให้เห็นผลและตรงจุดที่สุด
                            ท่านควรเลือกตามอาชีพและเรื่องที่ท่านต้องการเปลี่ยนแปลงชีวิตจริงๆ
                            เลือกเบอร์ให้เหมาะสมกับสิ่งที่แต่ละคนต้องการ เท่านี้ท่านก็จะสมปรารถนาดังที่หวัง
                            ให้เบอร์มือถือมาช่วยเสริมพลังชีวิตของท่านในสิ่งที่ท่านขาด
                            แล้วท่านก็จะพบกับความน่าอัศจรรย์ของศาสตร์พลังตัวเลข
                            เมื่อท่านได้ลองเปลี่ยนเบอร์มือถือแล้วจริงๆ
                        </p>
                        <a href="article.php">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="logo/logo.png" alt="">
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
                    $stmt = $conn->query("SELECT * FROM stock where phonenumber LIKE '%789%' LIMIT 15");
                    $stmt->execute();
                    $stock = $stmt->fetchAll();

                    if (!$stock) {
                        echo "<div class='row'>
                    <div class='col-lg-12'>No phonenumber found
                             </div></div>";
                    } else {
                        foreach ($stock as $number) {
                            ?>
                    <tr>

                        <div class="col-lg-4">
                            <div class="box"
                                style=" background: linear-gradient(to bottom right, #d7b335 20%, #FFD700 100%);">
                                <table class="table-layout">
                                    <tr>
                                        <td rowspan=2 colspan=5 class="left-cell">
                                            <div class="job_content-box">
                                                <h3>
                                                    <?php
                                                            $phoneNumber = $number['phonenumber'];
                                                            $formattedPhoneNumber = substr($phoneNumber, 0, 3) . '-' . substr($phoneNumber, 3, 3) . '-' . substr($phoneNumber, 6);
                                                            ?>
                                                    <a href="horo.php"
                                                        title="คำทำนาย"><?php echo $formattedPhoneNumber; ?></a>
                                                </h3>

                                            </div>
                                        </td>

                                        <td class="right-cell">
                                            <div class="job_content-box">
                                                <img width="30%" src="network/<?= $number['network']; ?>"
                                                    class="rounded" alt="">

                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="right-cell">
                                            <div class="job_content-box">
                                                <?php
                                                        $network_value = $number['network'];

                                                        switch ($network_value) {
                                                            case 'logo_ais.png':
                                                                echo 'ais';
                                                                break;
                                                            case 'logo_dtac.png':
                                                                echo 'dtac';
                                                                break;
                                                            case 'logo_dtac_happy.png':
                                                                echo 'happy';
                                                                break;
                                                            case 'logo_true.png':
                                                                echo 'true-pre';
                                                                break;
                                                            case 'logo_true_postpaid.png':
                                                                echo 'true-post';
                                                                break;
                                                            default:
                                                                // Handle any other case if needed
                                                                break;
                                                        }
                                                        ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>

                                        <div class="left-cell">
                                            <td>
                                                <div class="detail-box">
                                                    <div class="detail-info">
                                                        <h6>
                                                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                            <span><?= $number['sum']; ?></span>
                                                        </h6>

                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="detail-box">
                                                    <div class="detail-info">

                                                        <h6>
                                                            <?php
                                                                    $price = $number['price'];
                                                                    if ($price > 0) {
                                                                        echo '<i class="fa fa-money" aria-hidden="true"></i> ';
                                                                        echo '<span>' . number_format($price) . '.-</span>';
                                                                    }
                                                                    ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <td colspan=2 class="right-cell">
                                            <div class="option-box">
                                                <?php
                                                        $status = $number['status'];
                                                        if ($status === 'avialable') {
                                                            echo '<a href="createOrder.php?id=' . $number['id'] . '" class="apply-btn">detail</a>';
                                                        } elseif ($status === 'booked') {
                                                            echo '<button class="booked-btn">Booked</button>';
                                                        }
                                                        ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <style>
                        .table-layout {
                            width: 100%;
                        }

                        .left-cell {
                            width: 50%;
                        }

                        .right-cell {
                            width: 20%;
                        }
                        </style>
                        <?php }
                    } ?>



                </div>
            </div>
            <div class="job_container">
                <h4 class="job_heading">
                    เบอร์ยอดนิยม
                </h4>
                <div class="row">
                    <!-- กล่อง 1  -->

                    <!-- ทด -->

                    <!-- *** -->
                    <?php
                    $stmt = $conn->query("SELECT * FROM stock where phonenumber LIKE '%456%' LIMIT 15");
                    $stmt->execute();
                    $stock = $stmt->fetchAll();

                    if (!$stock) {
                        echo "<div class='row'>
                    <div class='col-lg-12'>No phonenumber found
                             </div></div>";
                    } else {
                        foreach ($stock as $number) {
                            ?>
                    <tr>

                        <div class="col-lg-4">
                            <div class="box"
                                style=" background: linear-gradient(to bottom right, #d7b335 20%, #FFD700 100%);">
                                <table class="table-layout">
                                    <tr>
                                        <td rowspan=2 colspan=5 class="left-cell">
                                            <div class="job_content-box">
                                                <h3>
                                                    <?php
                                                        $phoneNumber = $number['phonenumber'];
                                                        $formattedPhoneNumber = substr($phoneNumber, 0, 3) . '-' . substr($phoneNumber, 3, 3) . '-' . substr($phoneNumber, 6);
                                                        ?>
                                                    <a href="horo.php"
                                                        title="คำทำนาย"><?php echo $formattedPhoneNumber; ?></a>
                                                </h3>

                                            </div>
                                        </td>

                                        <td class="right-cell">
                                            <div class="job_content-box">
                                                <img width="30%" src="network/<?= $number['network']; ?>"
                                                    class="rounded" alt="">

                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="right-cell">
                                            <div class="job_content-box">
                                                <?php
                                                            $network_value = $number['network'];

                                                            switch ($network_value) {
                                                                case 'logo_ais.png':
                                                                    echo 'ais';
                                                                    break;
                                                                case 'logo_dtac.png':
                                                                    echo 'dtac';
                                                                    break;
                                                                case 'logo_dtac_happy.png':
                                                                    echo 'happy';
                                                                    break;
                                                                case 'logo_true.png':
                                                                    echo 'true-pre';
                                                                    break;
                                                                case 'logo_true_postpaid.png':
                                                                    echo 'true-post';
                                                                    break;
                                                                default:
                                                                    // Handle any other case if needed
                                                                    break;
                                                            }
                                                            ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>

                                        <div class="left-cell">
                                            <td>
                                                <div class="detail-box">
                                                    <div class="detail-info">
                                                        <h6>
                                                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                            <span><?= $number['sum']; ?></span>
                                                        </h6>

                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="detail-box">
                                                    <div class="detail-info">

                                                        <h6>
                                                            <?php
                                                                        $price = $number['price'];
                                                                        if ($price > 0) {
                                                                            echo '<i class="fa fa-money" aria-hidden="true"></i> ';
                                                                            echo '<span>' . number_format($price) . '.-</span>';
                                                                        }
                                                                        ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <td colspan=2 class="right-cell">
                                            <div class="option-box">
                                                <?php
                                                            $status = $number['status'];
                                                            if ($status === 'avialable') {
                                                                echo '<a href="createOrder.php?id=' . $number['id'] . '" class="apply-btn">detail</a>';
                                                            } elseif ($status === 'booked') {
                                                                echo '<button class="booked-btn">Booked</button>';
                                                            }
                                                            ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <style>
                        .table-layout {
                            width: 100%;
                        }

                        .left-cell {
                            width: 50%;
                        }

                        .right-cell {
                            width: 20%;
                        }
                        </style>
                        <?php }
                    } ?>



                </div>
            </div>
            <div class="btn-box">
                <a href="searchNumber.php">
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
                <?php
                $stmt = $conn->query("SELECT * FROM article LIMIT 15");
                $stmt->execute();
                $article = $stmt->fetchAll();

                if (!$article) {
                    echo "<div class='row'>
                    <div class='col-lg-12'>No article found
                             </div></div>";
                } else {
                    foreach ($article as $art) {
                        ?>
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <img width="100%" src="art/<?= $art['img']; ?>" class="rounded" alt="">
                        </div>
                        <div class="detail-box">
                            <a href="">

                                <?= $art['title']; ?>
                            </a>
                            <h6 class="expert_position">
                                <span>
                                    <?= $art['category']; ?>
                                </span>

                            </h6>
                        </div>
                    </div>
                </div>

                <?php }
                } ?>
            </div>
            <div class="btn-box">
                <a href="article.php">
                    View All
                </a>
            </div>
        </div>
    </section>

    <!-- end expert section -->

    <?php include('footer.php'); ?>
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