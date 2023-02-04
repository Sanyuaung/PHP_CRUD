<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
body {
    padding: 50px;
}
</style>
<?php
include 'connection.php';
session_start();
if (isset($_GET['updateID'])) {
    $updateID=$_GET['updateID'];
    $query1="SELECT * FROM post WHERE id=$updateID";
    $post=mysqli_query($db,$query1);
    if(mysqli_num_rows($post)==1){
        foreach($post as $row){
            $id=$row['id'];
            $title= $row['title'];
            $desc=$row['description'];
        }
    }
}
$titleError = '';
$descError = '';
if(isset($_POST['update'])){
    $id=$_POST['post-id'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    if (empty($title)) {
        $titleError = "Title is required";
    }
    if (empty($desc)) {
        $descError = "Description is required";
    }
if (!empty($title) && !empty($desc)) {
    $query2="UPDATE `post` SET `title`='$title',`description`='$desc' WHERE `id`=$id";
    mysqli_query($db, $query2);
    $_SESSION['message']="A post updated successfully";
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
                                <h1 class="text-primary ">Update Post</h1>
                            </div>
                            <div class="col-6">
                                <a href="index.php" class="btn btn-info float-end">
                                    << Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate action="update-post.php" method="POST">
                                <input type="hidden" name="post-id" value="<?= $id; ?>">
                                <div class=" mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input name="title" type="text"
                                        class="form-control <?php if($titleError!='') :?>is-invalid <?php endif ?>"
                                        id="" placeholder="Enter your post name" value="<?php echo $title; ?>">
                                    <span class="text-danger invalid-feedback"><?= $titleError; ?></span>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <input name="desc" type="text" class=" form-control <?php if($descError!='') :?>is-invalid <?php endif ?>
                                        id="" placeholder=" Enter your post description" value="<?php echo $desc; ?>">
                                    <span class="text-danger invalid-feedback"><?= $descError; ?></span>
                                </div>
                                <button name=" update" type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html