<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $urole = $_POST['urole'];

    $img = $_FILES['img'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "adminpic/" . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($img['size'] > 0 && $img['error'] == 0) {
            move_uploaded_file($img['tmp_name'], $filePath);
        }
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = $conn->prepare("INSERT INTO users(firstname, lastname, email,position, password, urole , img) 
        VALUES(:firstname, :lastname, :email, :position,:password, :urole ,:img)");
    $sql->bindParam(":firstname", $firstname);
    $sql->bindParam(":lastname", $lastname);
    $sql->bindParam(":position", $position);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $passwordHash);
    $sql->bindParam(":urole", $urole);
    $sql->bindParam(":img", $fileNew);
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
        header("refresh:2; url=index.php");
    } else {
        $_SESSION['error'] = "Data has not been inserted succesfully";
    }
}
?>