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



if (isset($_POST['insert_tracking'])) {
    $orderId = $_POST['insert_tracking'];
    $newTracking = $_POST['tracking'][$orderId];

    // Check if an existing tracking record exists for the order
    $existingTrackingStmt = $conn->prepare("SELECT tracking FROM orderss WHERE id = :order_id");
    $existingTrackingStmt->bindParam(':order_id', $orderId);
    $existingTrackingStmt->execute();
    $existingTracking = $existingTrackingStmt->fetchColumn();

    if ($existingTracking === false) {
        // Insert the new tracking information into the database using a SQL INSERT statement
        $insertStmt = $conn->prepare("INSERT INTO orderss (tracking) VALUES (:tracking) WHERE id = :order_id");
        $insertStmt->bindParam(':tracking', $newTracking);
        $insertStmt->bindParam(':order_id', $orderId);

        if ($insertStmt->execute()) {
            $_SESSION['success'] = "Tracking information has been added successfully";
        } else {
            $_SESSION['error'] = "Failed to add tracking information";
        }
    } else {
        // An existing tracking record was found, update it with a SQL UPDATE statement
        $updateStmt = $conn->prepare("UPDATE orderss SET tracking = :tracking WHERE id = :order_id");
        $updateStmt->bindParam(':tracking', $newTracking);
        $updateStmt->bindParam(':order_id', $orderId);

        if ($updateStmt->execute()) {
            $_SESSION['success'] = "Tracking information has been updated successfully";
        } else {
            $_SESSION['error'] = "Failed to update tracking information";
        }
    }

    header("Location: allOrder.php");
    exit();
}