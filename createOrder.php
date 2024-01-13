<?php

session_start();
require_once "config/db.php";

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->query("SELECT * FROM stock where id = $id");
    $stmt->execute();
    $stock = $stmt->fetchAll();
}
?>
<?php
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} ?>
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

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คำสั่งซื้อ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insertOrder.php" id="formData" method="post" enctype="multipart/form-data">
                        <?php foreach ($stock as $number) {
                            ?>
                            <!-- ----------------------------------- -->
                            <!-- $_SESSION['user_login'] = $row['id']; -->
                            <div class="mb-3" hidden-element>
                                <label for="customer" class="col-form-label">customer ID:</label>
                                <input type="text" 0 readonly value="<?= $row['id']; ?>" required class="form-control"
                                    name="customer">
                            </div>
                            <div class="mb-3">
                                <label for="num_id" class="col-form-label">number ID:</label>
                                <input type="text" readonly value="<?= $number['phonenumber']; ?>" required
                                    class="form-control" name="num_id">
                            </div>
                            <div class="mb-3">
                                <label for="orderdate" class="col-form-label">Order date:</label>
                                <input type="text" readonly value="<?php echo date('Y-m-d'); ?>" required
                                    class="form-control" name="orderdate">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="col-form-label">status:</label>
                                <input type="text" readonly value="Pending" required class="form-control" name="status">
                            </div>


                            <!-- ----------------------------------- -->
                            <div class="mb-3">

                                <label for="phonenumber" class="col-form-label">เบอร์:</label>
                                <input type="text" readonly value=<?= $number['phonenumber']; ?> required
                                    class="form-control" name="phonenumber">


                                <label for=" network" class="col-form-label">ค่าย:</label>
                                <td width="15px"><img width="10%" src="network/<?= $number['network']; ?>" class="rounded"
                                        alt="">
                                </td>
                                <br>
                                <label for="sum" class="col-form-label">ผลรวม:</label>
                                <input type="text" readonly value=<?= $number['sum']; ?> required class="form-control"
                                    name="sum">

                            </div>



                            <hr>
                            <!-- ----------------------------------- -->

                            <div class="mb-3">
                                <label for="bank" class="col-form-label">ธนาคาร:</label>
                                <br>
                                <select name="bank" id="operator" required class="form-control">
                                    <option value="SCB">SCB เลขที่บัญชี 111-599292-8</option>
                                    <option value="KTB">KTB เลขที่บัญชี 488-0-62320-2</option>

                                </select>
                                <br>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="price" class="col-form-label">ยอดโอน:</label>

                                <input type="text" readonly value="<?= $number['price']; ?>" required class="form-control"
                                    name="price">
                            </div>

                            <div class="mb-3">
                                <label for="datetransfer">เวลาโอน:</label>
                                <div class="col-form-label">
                                    <input type="date" class="form-control" id="datetransfer" name="datetransfer"
                                        placeholder="" value="" autocomplete="off">
                                </div>
                                <script>
                                console.log("Date : ", moment().format("YYYY-MM-DD"));
                                document.querySelector("#date").value = moment().format("YYYY-MM-DD");
                                </script>
                            </div>

                            <div class="mb-3">
                                <label for="img" class="col-form-label">สลิปการโอน:</label>
                                <input type="file" required class="form-control" id="imgInput" name="img">
                                <img width="60%" id="previewImg" alt="">
                            </div>

                            <!-- ----------------------------------- -->
                            <div class="mb-3">
                                <label for="name" class="col-form-label">ชื่อผู้รับสินค้า:</label>
                                <input type="text" required class="form-control" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="address1" class="col-form-label">ที่อยู่ผู้รับ:</label>
                                <input type="text" required class="form-control" name="address1">
                            </div>

                            <div class="mb-3">
                                <label for="tambon" class="col-form-label">ตำบล/แขวง:</label>
                                <input type="text" required class="form-control" name="tambon">
                            </div>

                            <div class="mb-3">
                                <label for="amphure" class="col-form-label">อำเภอ/เขต:</label>
                                <input type="text" required class="form-control" name="amphure">
                            </div>

                            <div class="mb-3">
                                <label for="province" class="col-form-label">จังหวัด:</label>
                                <input type="text" required class="form-control" name="province">
                            </div>

                            <div class="mb-3">
                                <label for="zipcode" class="col-form-label">รหัสไปรษณีย์:</label>
                                <input type="text" required class="form-control" name="zipcode">
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="col-form-label">เบอร์โทรติดต่อ:</label>
                                <input type="text" required class="form-control" name="contact">
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="col-form-label">หมายเหตุ:</label>
                                <input type="text" required class="form-control" name="comment">
                            </div>




                        <?php } ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submit" name="submit" class="btn btn-success">สั่งซื้อ</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>เบอร์ที่ท่านเลือก</h1>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">number
                <td name="phonenumber"><?= $number['phonenumber']; ?> </td>
                <?php $number['status'] = "booked" ?>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>

        <!-- Users Data -->

        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Ber</th>
                    <th scope="col">network</th>
                    <th scope="col">price</th>
                    <th scope="col">status</th>
                    <th scope="col">sum</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (!$stock) {
                    echo "<tr><td colspan='7' class='text-center'>No phonenumber found</td></tr>";
                } else {
                    foreach ($stock as $number) {
                        ?>
                        <tr>
                            <!-- <th scope="row"><?= $number['id']; ?></th> -->
                            <th><?= $number['phonenumber']; ?></th>
                            <td width="15px"><img width="100%" src="network/<?= $number['network']; ?>" class="rounded" alt="">
                            </td>
                            <td><?= $number['price']; ?></td>
                            <td><?= $number['status']; ?></td>
                            <td><?= $number['sum']; ?></td>
                            <td> <?php if ($number['status'] == 'avialable') { ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#userModal">สั่งซื้อ</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    let imgInput = document.getElementById('imgInput');
    let previewImg = document.getElementById('previewImg');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file);
        }
    }

    $(".delete-btn").click(function(e) {
        var userId = $(this).data('id');
        e.preventDefault();
        deleteConfirm(userId);
    })

    function deleteConfirm(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'createNumber.php',
                            type: 'GET',
                            data: 'delete=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                title: 'success',
                                text: 'Data deleted successfully!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'createNumber.php';
                            })
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !',
                                'error')
                            window.location.reload();
                        });
                });
            },
        });
    }
    </script>
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