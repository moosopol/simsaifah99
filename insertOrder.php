<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
    //order
    $customer = $_POST['customer'];
    $num_id = $_POST['num_id'];
    $orderdate = $_POST['orderdate'];
    $status = $_POST['status'];

    //bank
    $bank = $_POST['bank'];
    $price = $_POST['price'];
    $datetransfer = $_POST['datetransfer'];
    $img = $_FILES['img'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "slip/" . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($img['size'] > 0 && $img['error'] == 0) {
            move_uploaded_file($img['tmp_name'], $filePath);
        }
    }

    //sent address

    $name = $_POST['name'];
    $address1 = $_POST['address1'];
    $tambon = $_POST['tambon'];
    $amphure = $_POST['amphure'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $contact = $_POST['contact'];
    $comment = $_POST['comment'];

    $sql = $conn->prepare("INSERT INTO orderss( customer, num_id, orderdate, status, bank, price,datetransfer,img,  name, address1, tambon, amphure, province, zipcode,contact,comment) VALUES( :customer, :num_id, :orderdate, :status, :bank, :price,:datetransfer,:img,  :name, :address1, :tambon, :amphure, :province, :zipcode,:contact,:comment)");


    $sql->bindParam(":customer", $customer);
    $sql->bindParam(":num_id", $num_id);
    $sql->bindParam(":orderdate", $orderdate);
    $sql->bindParam(":status", $status);

    $sql->bindParam(":bank", $bank);
    $sql->bindParam(":price", $price);
    $sql->bindParam(":datetransfer", $datetransfer);
    $sql->bindParam(":img", $fileNew);

    $sql->bindParam(":name", $name);
    $sql->bindParam(":address1", $address1);
    $sql->bindParam(":tambon", $tambon);
    $sql->bindParam(":amphure", $amphure);
    $sql->bindParam(":province", $province);
    $sql->bindParam(":zipcode", $zipcode);
    $sql->bindParam(":contact", $contact);
    $sql->bindParam(":comment", $comment);

    $sql->execute();
    if ($sql) {
        // Update the status of the phone number to 'booked'
        $updateSql = $conn->prepare("UPDATE stock SET status = 'booked' WHERE phonenumber = :num_id");
        $updateSql->bindParam(":num_id", $num_id);
        $updateSql->execute();

        if ($updateSql) {
            $_SESSION['success'] = "สั่งซื้อเรียบร้อย";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Success',
                        text: 'Data inserted successfully!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:2; url=user.php");
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปเดตสถานะของหมายเลขโทรศัพท์";
        }
    } else {
        $_SESSION['error'] = "สั่งซื้อผิดพลาด";
    }
}
?>