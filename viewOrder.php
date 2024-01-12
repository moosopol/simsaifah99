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
    if (isset($_SESSION['admin_login'])) {
        $user_id = $_SESSION['admin_login'];
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
                    $stmt = $conn->query("SELECT * FROM orderss WHERE id = $id");
                    $stmt->execute();
                    $data = $stmt->fetch();
                }
                ?>
                <form method="POST" action="updateOrder.php">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <td><?= $data['id']; ?></td>
                        </tr>
                        <tr>
                            <th>เบอร์ที่ซื้อ</th>
                            <td><?= $data['num_id']; ?></td>
                        </tr>
                        <tr>
                            <th>ราคา</th>
                            <td><?= $data['price']; ?></td>
                        </tr>
                        <tr>
                            <th>รหัสลูกค้า</th>
                            <td><?= $data['customer']; ?></td>
                        </tr>
                        <tr>
                            <th>ชื่อผู้รับ</th>
                            <td><?= $data['name']; ?></td>
                        </tr>
                        <tr>
                            <th>ที่อยู่</th>
                            <td><?= $data['address1']; ?></td>
                        </tr>
                        <tr>
                            <th>ตำบล</th>
                            <td><?= $data['tambon']; ?></td>
                        </tr>
                        <tr>
                            <th>อำเภอ</th>
                            <td><?= $data['amphure']; ?></td>
                        </tr>
                        <tr>
                            <th>จังหวัด</th>
                            <td><?= $data['province']; ?></td>
                        </tr>
                        <tr>
                            <th>รหัสไปรษณีย์</th>
                            <td><?= $data['zipcode']; ?></td>
                        </tr>
                        <tr>
                            <th>เบอร์ติดต่อ</th>
                            <td><?= $data['contact']; ?></td>
                        </tr>
                        <tr>
                            <th>หมายเหตุ</th>
                            <td><?= $data['comment']; ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status" id="status">
                                    <option value="pending" <?= ($data['status'] === 'pending') ? 'selected' : ''; ?>>
                                        Pending</option>
                                    <option value="approved" <?= ($data['status'] === 'approved') ? 'selected' : ''; ?>>
                                        Approved</option>
                                    <option value="shipped" <?= ($data['status'] === 'shipped') ? 'selected' : ''; ?>>
                                        Shipped</option>
                                    <option value="delivered"
                                        <?= ($data['status'] === 'delivered') ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="update_status" value="<?= $data['id']; ?>"
                        class="btn btn-primary">update</button>
                </form>

                <div class="col-md-4">
                    <div class="img-box">
                        <img width="100%" src="slip/<?= $data['img']; ?>" class="rounded" alt="">

                    </div>
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