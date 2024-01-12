<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {

    $phonenumber = $_POST['phonenumber'];
    $network = $_POST['network'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sum = $_POST['sum'];
    $owner = $_POST['owner'];
    $registerdate = $_POST['registerdate'];
    $expiredate = $_POST['expiredate'];

    $sql = $conn->prepare("INSERT INTO stock( phonenumber, network, price, status,sum, owner, registerdate, expiredate) VALUES( :phonenumber, :network, :price, :status,:sum, :owner, :registerdate, :expiredate)");

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
        $_SESSION['success'] = "Data has been inserted succesfully";
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'success',
                        text: 'Data inserted successfully!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
        header("refresh:2; url=createNumber.php");
    } else {
        $_SESSION['error'] = "Data has not been inserted succesfully";
    }
}
?>