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

<body class="sub_page">
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
    </div>

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stmt = $conn->query("SELECT * FROM stock WHERE id = $id");
                    $stmt->execute();
                    $data = $stmt->fetch();
                }
                ?>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">

                            <h2><?= $data['phonenumber']; ?></h2>
                            <div class="col-md-2">
                                <div class="img-box">
                                    <img width="50%" src="network/<?= $data['network']; ?>" class="rounded" alt="">
                                </div>
                                <?php
                                $network_value = $data['network'];

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
                        </div>
                        <p>
                        <div class="option-box">
                            <button class="fav-btn">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                            </button>
                            <a href="createOrder.php?id=<?= $data['id']; ?>" class="apply-btn">Buy Now</a>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    คำทำนาย
                </div>
            </div>
        </div>
    </section>



    <!-- end about section -->

    <!-- info section -->
    <?php include('footer.php'); ?>
    <!-- end info_section -->


    <!-- footer section -->

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

</body>

</html>