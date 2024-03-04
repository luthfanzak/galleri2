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

if (!isset($_GET['id'])) {
    header("Location: myGall.php");
}
$id = $_GET['id'];

$gallery = getGalleryById($id, $_SESSION['id']);
$gallery = mysqli_fetch_array($gallery);
if ($gallery['userID'] !== $_SESSION['id']) {
    header("Location: myGall.php");
}

$uploadsFolder = '../uploads/';
$fotoFileName = $gallery['image'];
$filePath = $uploadsFolder . $fotoFileName;
unlink($filePath);
mysqli_query($conn, "DELETE FROM post WHERE id='$id'");
echo "<script>alert('Delete Success!'); window.location.href='myGall.php'</script>";
