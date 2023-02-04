<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
</head>
<style>
body {
    padding: 50px;
}
</style>
<?php
include 'connection.php';
session_start();
$query = "SELECT * FROM post";
$select = mysqli_query($db, $query);
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row card-header">
                        <div class="col-6 card-header">
                            <h1 class="text-primary ">Post Lists</h1>
                        </div>
                        <div class="col-6 card-header">
                            <a href="create-post.php" class="btn btn-primary float-end">+ Create Post</a>
                        </div>
                        <div class="card-body">
                            <?php if (isset($_SESSION['message'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select as $data) : ?>

                                    <tr class="table-danger">
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['title']; ?></td>
                                        <td><?= $data['description']; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td>
                                            <a name='delete' href="index.php?deleteID=<?php echo $data['id']; ?>" class=" btn
                                                btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            <a name='update' href="update-post.php?updateID=<?php echo $data['id']; ?>"
                                                class="btn btn-success">Update</a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_GET['deleteID'])) {
            $id = $_GET['deleteID'];
            $query="DELETE FROM post WHERE id=$id";
            mysqli_query($db, $query);
            mysqli_query($db," ALTER TABLE post AUTO_INCREMENT = $id");
            $_SESSION['message'] = "A post deleted successfully.";
            header('location: index.php');
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js">
    </script>
</body>

</html>