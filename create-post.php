<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body {
        padding: 50px;
    }
</style>
<?php
include 'connection.php';
session_start();
$nameError = '';
$descError = '';
if (isset($_POST['post'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    if (empty($name)) {
        $nameError = "Name is required";
    }
    if (empty($desc)) {
        $descError = "Description is required";
    }
    if (!empty($name) && !empty($desc)) {
        $query = "INSERT INTO `post`(`name`, `des`) VALUES ('$_POST[name]','$_POST[desc]')";
        $insert = mysqli_query($db, $query);
        $_SESSION['message'] = "Post is created";
        header('location: index.php');
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row card-header">
                            <div class="col-6">
                                <h1 class="text-primary ">Create Post</h1>
                            </div>
                            <div class="col-6">
                                <a href="index.php" class="btn btn-info float-end">
                                    << Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate action="create-post.php" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control is-invalid" id="" placeholder="Enter your post name">
                                    <span class="text-danger invalid-feedback"><?= $nameError; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <input name="desc" type="text" class="form-control is-invalid" id="" placeholder="Enter your post description">
                                    <span class="text-danger invalid-feedback"><?= $descError; ?></span>
                                </div>
                                <button name="post" type="submit" class="btn btn-primary">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>