<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] === '1') {
        header("Location: ../admin/index.php");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}

require '../functions.php';
$gallery = getMyGallery($_SESSION['id']);
$result = mysqli_num_rows($gallery);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGall - User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle py-5">
    <nav class="navbar navbar-expand-lg bg-primary text-light rounded bottom shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand text-light" href="">SIGall</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="myGall.php">My Gallery</a>
                    </li>
                </ul>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['name'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="card bg-primary">
            <div class="card-body text-light">
                <h2>My Gallery</h2>
                <div class="text-center mt-4">
                    <a href="newPost.php" class="btn btn-light text-primary">+New Post</a>
                    <div class="text-center mt-4 px-5">
                        <tr>
                            <?php
                            foreach ($gallery as $gal) {
                            ?>
                                <td>
                                    <button class="m-1 p-3 pb-1 text-dark bg-light rounded border border-0" data-bs-toggle="modal" data-bs-target="#pict<?= $gal['id'] ?>">
                                        <img src="../uploads/<?= $gal['image'] ?>" class="rounded" alt="Gallery" width="240px" height="240px">
                                        <div class="text-start">
                                            <p>
                                                <?= $gal['description'] ?>
                                                <br><small class="text-secondary"><?= $gal['time_upload'] ?></small>
                                            </p>
                                        </div>
                                        <div class="text-center">
                                            <a href="editPost.php?id=<?= $gal['id'] ?>" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <a href="deletePost.php?id=<?= $gal['id'] ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </button>
                                </td>
                                <div class="modal fade" id="pict<?= $gal['id'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img src="../uploads/<?= $gal['image'] ?>" class="rounded" alt="Gallery" width="400px">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary py-2 text-center text-light fixed-bottom">
        My Gall 2024
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>