<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $phonenumber = $_POST['phonenumber'];
    $network = $_POST['network'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sum = $_POST['sum'];
    $owner = $_POST['owner'];
    $registerdate = $_POST['registerdate'];
    $expiredate = $_POST['expiredate'];

    $sql = $conn->prepare("UPDATE stock SET phonenumber = :phonenumber, network = :network, price = :price, status = :status, sum = :sum, owner = :owner , registerdate = :registerdate, expiredate = :expiredate WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":phonenumber", $phonenumber);
    $sql->bindParam(":network", $network);
    $sql->bindParam(":price", $price);
    $sql->bindParam(":status", $status);
    $sql->bindParam(":sum", $sum);
    $sql->bindParam(":owner", $owner);
    $sql->bindParam(":registerdate", $registerdate);
    $sql->bindParam(":expiredate", $expiredate);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "Data has been updated succesfully";
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'success',
                        text: 'Data updated successfully!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
        header("refresh:2; url=createNumber.php");
    } else {
        $_SESSION['error'] = "Data has not been updated succesfully";
        header("location: createNumber.php");
    }
}

?>