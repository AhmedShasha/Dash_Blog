<?php
require 'config/core.php';
require 'session.php';

if (!array_key_exists("login", $_SESSION) || !array_key_exists("id", $_GET)) {
    header("location: logout.php");
    exit();
}

$id = $_POST['delete'];

$blog["id"] = $_GET["id"];
$mBlogs = $core->getAddBlog($blog);
if ($mBlogs) {
    $blog = $mBlogs[0];
}

if (array_key_exists('delete', $_POST) && !empty($_POST['delete'])) {
    # code...
    $fileName = $blog['addition_image'];
    $imgPath = $core->path;

    $query = "DELETE FROM `addition_blogs` WHERE id = $id";

    if (mysqli_query($core->dbConnection, $query)) {
        unlink($imgPath . $fileName);

        $_SESSION["success"] = "Addition blogs successfully Deleted";

        header('Location: AllAdditional.php');
    }else{
        $this->setError("Can't Delete This Racord");
        return false;
    }
}
