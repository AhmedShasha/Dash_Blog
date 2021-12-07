<?php
require 'config/core.php';
require 'session.php';

if (!array_key_exists("login", $_SESSION) || !array_key_exists("id", $_GET)) {
    header("location: logout.php");
    exit();
}

$id = $_POST['delete'];

$blog["id"] = $_GET["id"];
$mBlogs = $core->getBlog($blog);
if ($mBlogs) {
    $blog = $mBlogs[0];
}
if (array_key_exists('delete', $_POST) && !empty($_POST['delete'])) {
    # code...

    $query = "DELETE FROM `blogs` WHERE id = $id";

    $fileName = $blog['main_image'];
    $imgPath = $core->path;

    if (mysqli_query($core->dbConnection, $query)) {
        unlink($imgPath . $fileName);

        $_SESSION["success"] = "Blog successfully Deleted";

        header('Location: AllBlogs.php');
    } else {
        $this->setError("Can't Delete This Racord");
        return false;
    }
}
