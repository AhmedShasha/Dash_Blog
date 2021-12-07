<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/normalize.css">

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/style.css">

<link rel="icon" type="image/png" href="assets/media/sdIcon.png">

<!--Update header & title to includes from another class-->

<header class="header navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="index.php" style="width: 210px; cursor: default;">
        <img src="assets/media/SD.png" alt="logo" style="width: 100%;">
    </a>
</header>
<?php
$str = "";
$title = "SD-Blogs";

$alt = $title;
$alt_ar = "";


if (@$exTitle) $title =  $alt . " - $exTitle";

?>
<title> <?php print $title; ?></title>