<?php
$str = "";
$title = "SD-Blogs";
$alt = $title;

if (@$exTitle) $title = $alt . " -$exTitle";
?>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<!------ Include the above in your HEAD tag ---------->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" type="image/png" href="assets/media/sdIcon.png">

    <title> <?php print $title; ?></title>

</head>

<body>

    <!--===============================================
                      HEADER , NAVBAR
    ===============================================-->

    <header class="navbar navbar-expand-sm bg-dark navbar-dark mb-0">
        <div class="hamburger">
            <div class="cta">
                <div class="toggle-btn type14"></div>
            </div>
        </div>
        <!-- Brand/logo -->
        <a class="navbar-brand" href="" style="width: 210px; cursor: default;">
            <img src="assets/media/SD.png" alt="logo" style="width: 100%;">
        </a>
    </header>
    <nav class="side-bar-warp">
        <div class="sidebar-menu small-side-bar flowHide">

            <ul class="navbar-nav " style="margin: 10px;">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <span class="sidebar-icon"><i class="fas fa-th-large"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AllBlogs.php">
                        <span class="sidebar-icon"><i class="fas fa-blog"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Blogs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AllAddition.php">
                        <span class="sidebar-icon"> <i class="fas fa-plus-square"></i> </span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Addition Blogs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/all.min.js"></script>
</body>

</html>