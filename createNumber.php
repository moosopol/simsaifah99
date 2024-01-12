<?php

session_start();
require_once "config/db.php";

if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM stock WHERE id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        echo "<script>alert('Data has been deleted successfully');</script>";
        $_SESSION['success'] = "Data has been deleted succesfully";
        header("refresh:1; url=createNumber.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>number</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_SESSION['admin_login'])) {
        $admin_id = $_SESSION['admin_login'];
        $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <?php include('nav.php'); ?>
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insertNumber.php" id="formData" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="phonenumber" class="col-form-label">Phone Number:</label>

                            <input type="text" required class="form-control" name="phonenumber">
                        </div>

                        <div class="mb-3">
                            <label for="network" class="col-form-label">Network:</label>
                            <select name="network" id="operator" required class="form-control">
                                <option value="logo_ais.png">ais</option>
                                <option value="logo_dtac.png">dtac</option>
                                <option value="logo_dtac_happy.png">happy</option>
                                <option value="logo_true.png">true prepaid</option>
                                <option value="logo_true_postpaid.png">true postpaid</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="text" required class="form-control" name="price">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="col-form-label">Status:</label>
                            <select name="status" id="operator" required class="form-control">
                                <option value="avialable">avialable</option>
                                <option value="booked">booked</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sum" class="col-form-label">Sum:</label>
                            <select type="text" required class="form-control" name="sum">


                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="owner" class="col-form-label">Owner:</label>
                            <select name="owner" id="operator" required class="form-control">
                                <option value="0">best</option>
                                <option value="1">mim</option>
                                <option value="2">imm</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">วันลงเว็บ</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="registerdate" name="registerdate"
                                    placeholder="" value="" autocomplete="off">
                            </div>
                            <script>
                            console.log("Date : ", moment().format("YYYY-MM-DD"));
                            document.querySelector("#date").value = moment().format("YYYY-MM-DD");
                            </script>
                        </div>

                        <div class="mb-3">
                            <label for="">วันหมดอายุซิม</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="expiredate" name="expiredate" placeholder=""
                                    value="" autocomplete="off">
                            </div>
                            <script>
                            console.log("Date : ", moment().format("YYYY-MM-DD"));
                            document.querySelector("#date").value = moment().format("YYYY-MM-DD");
                            </script>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>สร้าง ber</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">Add
                    number</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">number
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
                    <th scope="col">#</th>
                    <th scope="col">Ber</th>
                    <th scope="col">network</th>
                    <th scope="col">price</th>
                    <th scope="col">status</th>
                    <th scope="col">sum</th>
                    <th scope="col">owner</th>
                    <th scope="col">register date</th>
                    <th scope="col">expire date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM stock");
                $stmt->execute();
                $stock = $stmt->fetchAll();

                if (!$stock) {
                    echo "<tr><td colspan='9' class='text-center'>No phonenumber found</td></tr>";
                } else {
                    foreach ($stock as $number) {
                        ?>
                <tr>
                    <th scope="row"><?= $number['id']; ?></th>
                    <td><?= $number['phonenumber']; ?></td>
                    <td width="15px"><img width="100%" src="network/<?= $number['network']; ?>" class="rounded" alt="">
                    </td>
                    <td><?= $number['price']; ?></td>
                    <td><?= $number['status']; ?></td>
                    <td><?= $number['sum']; ?></td>
                    <td><?= $number['owner']; ?></td>
                    <td><?= $number['registerdate']; ?></td>
                    <td><?= $number['expiredate']; ?></td>
                    <td>
                        <a href="editNumber.php?id=<?= $number['id']; ?>" class="btn btn-warning">Edit</a>
                        <a data-id="<?= $number['id']; ?>" href="?delete=<?= $number['id']; ?>"
                            class="btn btn-danger delete-btn">Delete</a>
                    </td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
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
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                            window.location.reload();
                        });
                });
            },
        });
    }
    </script>

</body>

</html>