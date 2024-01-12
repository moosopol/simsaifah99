<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $phonenumber = $_POST['phonenumber'];
    $status = $_POST['status'];

    $sql = $conn->prepare(" UPDATE stock SET status = :status WHERE phonenumber = :num_id");

    $sql->bindParam(":id", $id);
    $sql->bindParam(":phonenumber", $phonenumber);
    $sql->bindParam(":status", $status);

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




<?php



if (isset($_POST['update_status'])) {
    $orderId = $_POST['update_status'];
    $newStatus = $_POST['status'];

    $updateStmt = $conn->prepare("UPDATE orderss SET status = :status WHERE id = :order_id");
    $updateStmt->bindParam(':status', $newStatus);
    $updateStmt->bindParam(':order_id', $orderId);

    if ($updateStmt->execute()) {
        $_SESSION['success'] = "Order status has been updated successfully";
        header("Location: allOrder.php");
        exit(); // Stop further execution
    } else {
        $_SESSION['error'] = "Failed to update order status";
        header("Location: allOrder.php");
        exit(); // Stop further execution
    }
}

// Redirect back to the original page or display a message
header('Location: allOrder.php');
?>