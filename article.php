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

    <!-- expert section -->

    <section class="expert_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    บทความที่น่าสนใจ
                </h2>
                <p>
                    สิ่งที่น่าสนใจ
                </p>
            </div>




            <div class="row">

                <?php

                $recordsPerPage = 9;

                // Get the current page number from the query string
                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $currentPage = intval($_GET['page']);
                } else {
                    $currentPage = 1;
                }

                // Modify your SQL query to count the total number of records
                $totalRecordsQuery = $conn->query("SELECT COUNT(*) FROM article");
                $totalRecords = $totalRecordsQuery->fetchColumn();

                // Calculate the total number of pages
                $totalPages = ceil($totalRecords / $recordsPerPage);

                // Calculate the offset for the centering logic
                $offset = 5; // Number of pages to show before and after the current page
                
                // Calculate the start and end pages for pagination
                $startPage = max(1, $currentPage - $offset);
                $endPage = min($totalPages, $currentPage + $offset);

                // Calculate the LIMIT clause for the SQL query
                $offset = ($currentPage - 1) * $recordsPerPage;

                // Modify your SQL query to use LIMIT and OFFSET
                $stmt = $conn->prepare("SELECT * FROM article LIMIT :limit OFFSET :offset");
                $stmt->bindParam(':limit', $recordsPerPage, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                $article = $stmt->fetchAll();




                if (!$article) {
                    echo "<div class='row'>
                    <div class='col-lg-12'>No article found
                             </div></div>";
                } else {
                    foreach ($article as $art) {
                        ?>
                <tr>

                    <div class="col-md-6 col-lg-4 mx-auto">
                        <div class="box">
                            <div class="img-box">
                                <img width="100%" src="art/<?= $art['img']; ?>" class="rounded" alt="">
                                <!-- <img src="images/789.png" alt=""> -->
                            </div>
                            <div class="detail-box">
                                <a href="">
                                    <?= $art['title']; ?>
                                </a>
                                <h6 class="expert_position">
                                    <span>
                                        <?= $art['created_at']; ?>
                                    </span>
                                    <span>
                                        <?= $art['category']; ?>
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

                                </p>
                                <br>
                                <span>
                                    <a href="singleArticle.php?id=<?= $art['id']; ?>" class="btn btn-warning">
                                        อ่านต่อ
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <?php }
                } ?>

            </div>
        </div>

        <div class="container">
            <div class="heading_container heading_center">
                <?php
                if ($totalPages > 1) {
                    echo "<div class='pagination'>";

                    // Display previous page link
                    if ($currentPage > 1) {
                        echo "<a href='article.php?page=" . ($currentPage - 1) . "'>&laquo;</a>";
                    }

                    // Display numbered page links
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        if ($i == $currentPage) {
                            echo "<span class='current-page'>$i</span>";
                        } else {
                            echo "<a href='article.php?page=$i'>$i</a>";
                        }
                        if ($i < $endPage) {
                            echo "&nbsp;&nbsp;"; // Add space between links
                        }
                    }

                    // Display next page link
                    if ($currentPage < $totalPages) {
                        echo "<a href='article.php?page=" . ($currentPage + 1) . "'>&raquo;</a>";
                    }

                    echo "</div>";
                }

                ?>

            </div>

        </div>
        </div>
    </section>

    <!-- end expert section -->

    <!-- info section -->
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


</body>

</html>