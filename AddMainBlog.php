<?php
require_once 'session.php';
$exTitle = "Add Blog";

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

if ($_POST) {

    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        //Captcha is valid
        $_POST["main_image"] = $_FILES["main_image"];
        $add = $core->createBlog($_POST);
        $_POST["control"] = $_SESSION["control"]["id"];
        $_POST["file"] = $_FILES["file"];

        // print $core->getError();

        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "New Blog successfully created";

            header("location: AllBlogs.php");
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
            <h4 class="card-title bg-info text-white rounded ">Add Blog</h4>
            <div class="card-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" class="row">
                    <div class="form-groub col-md-6 col-sm-6">
                        <label for="main_title">Title</label>
                        <input type="text" class="form-control" id="main_title" name="main_title" placeholder="Title Of Blog" required>
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="main_image">Choose image : </label>
                        <input type="file" id="main_image" name="main_image" class="form-control image btn btn-small" required>
                    </div>

                    <!-- <div class="form-group col-md-2 col-sm-2">
                        <input class="btn btn-primary" type="button" value="Addition">
                    </div> -->

                    <div class="form-groub col-md-12 col-sm-12 m-auto">
                        <label for="main_body">Body</label>
                        <textarea class="form-control" name="main_body" id="main_body" cols="300" rows="10" placeholder="Main Body"></textarea>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-right">
                        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus mr-1"></i> Add</button>
                        <a href="AllBlogs.php" class="btn btn-danger mt-3"><i class="fas fa-times mr-1"></i> Cancle</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>