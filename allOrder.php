<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}
if (isset($_SESSION['admin_login'])) {
    $user_id = $_SESSION['admin_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT * FROM orderss");
    $stmt->execute();
    $orders = $stmt->fetchAll();
}

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

    <div class="hero_area">
        <!-- header section strats -->
        <?php include('nav.php'); ?>
        <!-- end header section -->
    </div>


    <section id="content">
        <div class="content-blog content-account">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Recent Orders</h1>
                        <br>
                        <form method="POST" action="editTracking.php">
                            <table class="cart-table account-table table table-bordered bg-white text-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ber</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tracking</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($orders)) {
                                        echo "<tr><td colspan='8' class='text-center'>No order found</td></tr>";
                                    } else {
                                        foreach ($orders as $order) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $order['id']; ?></th>
                                                <td><?= $order['num_id']; ?></td>
                                                <td><?= $order['customer']; ?></td>
                                                <td><?= $order['price']; ?></td>
                                                <td><?= $order['status']; ?></td>
                                                <td>
                                                    <?php if (empty($order['tracking'])) { ?>
                                                        <input type="text" name="tracking[<?= $order['id']; ?>"
                                                            placeholder="Enter Tracking">
                                                    <?php } else { ?>
                                                        <?php if (!isset($_SESSION['editing_order_id']) || $_SESSION['editing_order_id'] != $order['id']) { ?>
                                                            <?= $order['tracking']; ?>
                                                        <?php } else { ?>
                                                            <input type="text" name="tracking[<?= $order['id']; ?>]" value="">
                                                        <?php } ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if (empty($order['tracking'])) { ?>
                                                        <button type="submit" name="insert_tracking" value="<?= $order['id']; ?>"
                                                            class="btn btn-primary">Insert</button>
                                                    <?php } else { ?>
                                                        <?php if (!isset($_SESSION['editing_order_id']) || $_SESSION['editing_order_id'] != $order['id']) { ?>
                                                            <a href="editTracking.php?id=<?= $order['id']; ?>"
                                                                class="btn btn-warning">Edit</a>
                                                        <?php } else { ?>
                                                            <button type="submit" name="update_tracking" value="<?= $order['id']; ?>"
                                                                class="btn btn-primary">Update</button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <span>
                                                        <a href="viewOrder.php?id=<?= $order['id']; ?>"
                                                            class="btn btn-warning">รายละเอียด</a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- end about section -->

    <!-- job section -->

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