<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT * FROM orderss where customer = $user_id");
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

    <div class="container text-blue">
        <h2 class='text-center text-blue'>My Account</h2>

        <section id="content">
            <div class="content-blog content-account">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Recent Orders</h1>
                            <br>

                            <table class="cart-table account-table table table-bordered bg-white text-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ber</th>
                                        <th scope="col">price</th>
                                        <th scope="col">status</th>
                                        <th scope="col">tracking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$orders) {
                                        echo "<tr><td colspan='7' class='text-center'>No order found</td></tr>";
                                    } else {
                                        foreach ($orders as $order) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $order['id']; ?></th>
                                                <td><?= $order['num_id']; ?></td>
                                                <td><?= $order['price']; ?></td>
                                                <td><?= $order['status']; ?></td>
                                                <td><?= $order['tracking']; ?></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>







                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>


    </div>

    </ul>
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

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>