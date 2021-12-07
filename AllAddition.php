<?php
require_once 'session.php';
$exTitle = "Additional Blogs";


$mBlog = array();

$addBlogs = $core->getAddBlog($mBlog);
$mainBlogs = $core->getBlog($mBlog);

$svc = array("count" => true);
$counterAdd = $core->getAddBlog($svc);
// die(var_dump($addBlogs));

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

if ($_POST) {

    if (/*$resp->isValid() == */false) {
        $_SESSION["error"] = "Invalid CAPTCHA verification. ";
    } else {
        //Captcha is valid
        $_POST["addition_image"] = $_FILES["addition_image"];
        $add = $core->createAddBlog($_POST);
        $_POST["control"] = $_SESSION["control"]["id"];
        $_POST["file"] = $_FILES["file"];

        // print $core->getError();

        if (!$add) {
            $_SESSION["error"] = $core->getError();
        } else {
            $_SESSION["success"] = "New Additional Blog successfully created";

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
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'in-head.php'; ?>
</head>

<body>
    <div class="DashboardContainer">
        <?php include("inc-error.php"); ?>

        <div class="row text-justify text-center mb-4">
            <div class="col-md-6 col-sm-6">
                <h3>
                    Number of Additional Blogs : <? print($counterAdd) ?>
                </h3>
            </div>
            <div class="col-md-6 col-sm-6 m-auto ">
                <a href="AddAdditional.php" class="btn btn-success btn-sm  "><i class="fa fa-plus mr-1"></i> Add Additional Blog</a>
            </div>
        </div>
        <div class="table-responsive-md">
            <table class="table table-hover" style="margin: auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Image</th>
                        <th scope="col">Main Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php

                foreach ($addBlogs as $index => $value) {
                ?>
                    <tbody class="thead-light">
                        <tr>
                            <td>
                                <?=
                                $index + 1
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['addition_title']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['addition_body']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['addition_image']
                                ?>
                            </td>
                            <td>
                                <?=
                                $value['blogs']['main_title']
                                ?>
                            </td>

                            <td style="width: 185px;">
                                <a href="UpdateAdditional.php?id=<?= $value['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit mr-1"></i> Edit</a>
                                <form action="DeleteAdditional.php?id=<?= $value['id'] ?>" enctype="multipart/form-data" method="POST" style="display:inline-block;">
                                    <button type="submit" value="<?= $value['id'] ?>" name="delete" class="btn btn-danger btn-sm delete" onclick="return confirm('Are you sure you want to delete this Service ?!')">
                                        <i class="fa fa-trash mr-1"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>