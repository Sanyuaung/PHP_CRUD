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
$query='SELECT * FROM post';
$select=mysqli_query($db,$query);
?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row card-header">
                            <div class="col-6">
                                <h1 class="text-primary ">Post Lists</h1>
                            </div>
                            <div class="col-6">
                                <a href="create-post.php" class="btn btn-primary float-end">+ Create Post</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach($select as $a) :?>
                                        <th scope="row"><?= $select['id'];?></th>
                                        <td><?= $select['name'];?></td>
                                        <td><?= $select['des'];?></td>
                                        <td><?= $select['create'];?></td>
                                        <td>
                                            <a href="http://" class="btn btn-danger">Delete</a>
                                            <a href="http://" class="btn btn-success">Update</a>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>