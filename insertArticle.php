<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $article = $_POST['article'];
    $img = $_FILES['img'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "art/" . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($img['size'] > 0 && $img['error'] == 0) {
            move_uploaded_file($img['tmp_name'], $filePath);
        }
    }
    $sql = $conn->prepare("INSERT INTO article(title,category, article, img) VALUES(:title, :category, :article, :img)");
    $sql->bindParam(":title", $title);
    $sql->bindParam(":category", $category);
    $sql->bindParam(":article", $article);
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
        header("refresh:2; url=createArticle.php");
    } else {
        $_SESSION['error'] = "Data has not been inserted succesfully";
    }
}
?>