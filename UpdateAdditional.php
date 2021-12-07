<?php
require_once 'session.php';
$exTitle = "Add Blog";

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

$blog["id"] = $_GET["id"];
$mBlogs = $core->getAddBlog($blog);

$blog_arr = array();
$blogsss = $core->getBlog($blog_arr);

if ($mBlogs) {
    $blog = $mBlogs[0];
}

if ($_POST) {

    // die(var_dump($_POST));
    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        $_POST["addition_image"] = $_FILES["addition_image"];
        $_POST["id"] = $_GET["id"];
        $add = $core->updateAddBlog($_POST);

        $_POST["control"] = $_SESSION["control"]["id"];
        $_POST["file"] = $_FILES["file"];
        
        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "Blog successfully Updated";
            $blog["id"] = $_GET["id"];
            $mBlogs = $core->getAddBlog($blog);
            if ($mBlogs) {
                $blog = $mBlogs[0];
            }
            header("location: AllAddition.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <?php include 'in-head.php'; ?>
</head>

<body>
    <div class="DashboardContainer">
        <?php include("inc-error.php"); ?>
        <div class="card rounded">
            <h4 class="card-title bg-info text-white rounded ">Update Blog</h4>
            <div class="card-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" class="row">
                    <div class="form-groub col-md-6 col-sm-6">
                        <label for="addition_title">Title</label>
                        <input type="text" class="form-control" id="addition_title" name="addition_title" placeholder="Title Of Blog" value="<?= $blog['addition_title'] ?>" required>
                    </div>

                    <div class="form-group col-md-3 col-sm-3">
                        <label for="addition_image">Choose image : </label>
                        <input type="file" id="addition_image" name="addition_image" class="form-control image btn btn-small">
                    </div>

                    <div class="form-group col-md-2 col-sm-2">
                        <label for="main_id">Under Title:</label>
                        <select name="main_id" id="main_id" class="form-control">
                            <option value="<?=$blog['blogs']['id']?>"><?=$blog['blogs']['main_title']?></option>
                            <?php foreach ($blogsss as $bVal) { ?>
                                <option value="<?= $bVal['id'] ?>">
                                    <?= $bVal['main_title'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-groub col-md-12 col-sm-12 m-auto">
                        <label for="addition_body">Body</label>
                        <textarea class="form-control" name="addition_body" id="addition_body" cols="300" rows="10" placeholder="Addition Body"><?= $blog['addition_body'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-right">
                        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus mr-1"></i> Update</button>
                        <a href="AllAddition.php" class="btn btn-danger mt-3"><i class="fas fa-times mr-1"></i> Cancle</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>