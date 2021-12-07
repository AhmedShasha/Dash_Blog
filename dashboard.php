<?php
require_once 'session.php';
$exTitle = "Dashboard";

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}

//. ............................... ... ....................... 


if (array_key_exists('login', $param)) { //auth 
    $username = mysqli_real_escape_string($this->dbConnection, $param['username']); // username & password from login form 
    $password = mysqli_real_escape_string($this->dbConnection, $param['password']);

    if (empty($username) || empty($password)) {
        $this->setError("Invalid login credentials.");
        return false;
    }
    $condition = " username='$username'" . "' AND " . " password='$password'"
        . "' AND " . " password='$password'" . "' AND " . " password='$password'";
} else {
    if (array_key_exists("username", $param)) {
        $param["username"] = mysqli_real_escape_string($this->dbConnection, $param["username"]);
        $condition .= " username = '$param[username]'";
    }

    if (array_key_exists("email", $param)) {
        $param["email"] = mysqli_real_escape_string($this->dbConnection, $param["email"]);
        $condition .= " email = '$param[email]'";
    }
}
// . .............................. .... .................
$blCount = array("count" => true); 
$blog = $core->getBlog($blCount);
$AddBlog = $core->getAddBlog($blCount);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">

    <?php include 'in-head.php'; ?>
</head>

<body>
    <div class="DashboardContainer">
        <div class="content-wrapper ">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
                <!-- ./col -->
                <div class=" m-auto text-center bg bg-danger bg-border">
                    <!-- small box -->
                    <div class="small-box ">
                        <div class="inner">
                            <h2>Blogs</h2>
                            <p>Number of Blogs : <? print($blog) ?></p>
                        </div>

                        <a href="AllBlogs.php" class="small-box-footer text-white">GO Here <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class=" m-auto text-center bg bg-warning bg-border">
                    <!-- small box -->
                    <div class="small-box ">
                        <div class="inner">
                            <h2>Additional Blogs</h2>
                            <p>Number of Additional Blogs : <? print($AddBlog) ?></p>
                        </div>

                        <a href="AllAddition.php" class="small-box-footer text-white">GO Here <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</body>

</html>