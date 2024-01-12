<?php

session_start();
require_once "config/db.php";

if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}
// if (isset($_POST['submit'])) {
//     $firstname = $_POST['firstname'];
//     $lastname = $_POST['lastname'];
//     $position = $_POST['position'];
//     $img = $_FILES['img'];

//     $allow = array('jpg', 'jpeg', 'png');
//     $extension = explode(".", $img['name']);
//     $fileActExt = strtolower(end($extension));
//     $fileNew = rand() . "." . $fileActExt;
//     $filePath = "uploads/".$fileNew;

//     if (in_array($fileActExt, $allow)) {
//         if ($img['size'] > 0 && $img['error'] == 0) {
//             if (move_uploaded_file($img['tmp_name'], $filePath)) {
//                 $sql = $conn->prepare("INSERT INTO users(firstname, lastname, position, img) VALUES(:firstname, :lastname, :position, :img)");
//                 $sql->bindParam(":firstname", $firstname);
//                 $sql->bindParam(":lastname", $lastname);
//                 $sql->bindParam(":position", $position);
//                 $sql->bindParam(":img", $fileNew);
//                 $sql->execute();

//                 if ($sql) {
//                     $_SESSION['success'] = "Data has been inserted succesfully";
//                 } else {
//                     $_SESSION['error'] = "Data has not been inserted succesfully";
//                 }
//             }
//         }
//     }
// }

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM article WHERE id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        echo "<script>alert('Data has been deleted successfully');</script>";
        $_SESSION['success'] = "Data has been deleted succesfully";
        header("refresh:1; url=createArticle.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบทความ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php include('nav.php'); ?>

<body>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insertArticle.php" id="formData" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="img" class="col-form-label">Image:</label>
                            <input type="file" required class="form-control" id="imgInput" name="img">
                            <img width="100%" id="previewImg" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" required class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-form-label">category:</label>
                            <input type="text" required class="form-control" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="article" class="col-form-label">Article:</label>
                            <input type="text" required class="form-control" name="article">
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
                <h1>สร้างบทความ</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">Add
                    article</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">Article
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Img</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Article</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM article");
                $stmt->execute();
                $article = $stmt->fetchAll();

                if (!$article) {
                    echo "<tr><td colspan='6' class='text-center'>No article found</td></tr>";
                } else {
                    foreach ($article as $art) {
                        ?>
                <tr>
                    <th scope="row"><?= $art['id']; ?></th>
                    <td width="250px"><img width="100%" src="art/<?= $art['img']; ?>" class="rounded" alt=""></td>
                    <td><?= $art['title']; ?></td>
                    <td><?= $art['category']; ?></td>
                    <td><?= $art['article']; ?></td>
                    <td><?= $art['created_at']; ?></td>
                    <td>
                        <a href="editArticle.php?id=<?= $art['id']; ?>" class="btn btn-warning">Edit</a>
                        <a data-id="<?= $art['id']; ?>" href="?delete=<?= $art['id']; ?>"
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
                            url: 'createArticle.php',
                            type: 'GET',
                            data: 'delete=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                title: 'success',
                                text: 'Data deleted successfully!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'createArticle.php';
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