<?php
$Message = '';
require 'auth/auth.php';

if(isset($_POST['login'])){
    $Message =  $data->login();
}

if(isset($_POST['register'])){
    $Message =  $data->register();
}

if(isset($_POST['forgetpassword'])){
    $Message =  $data->resetPassword();
}

if(isset($_POST['resetpassword'])){
    $Message =  $data->savePassword();
}


//echo $Message;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Roof-site</title>

    <script src="/cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="vendors\fontawesome-pro-5\css\all.css">
    <link rel="stylesheet" href="vendors\bootstrap-select\css\bootstrap-select.min.css">
    <link rel="stylesheet" href="vendors\slick\slick.min.css">
    <link rel="stylesheet" href="vendors\magnific-popup\magnific-popup.min.css">
    <link rel="stylesheet" href="vendors\jquery-ui\jquery-ui.min.css">
    <link rel="stylesheet" href="vendors\chartjs\Chart.min.css">
    <link rel="stylesheet" href="vendors\dropzone\css\dropzone.min.css">
    <link rel="stylesheet" href="vendors\animate.css">
    <link rel="stylesheet" href="vendors\timepicker\bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="vendors\mapbox-gl\mapbox-gl.min.css">

            <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


    <link rel="stylesheet" href="css\themes.css">

    <link rel="icon" href="images\favicon.ico">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate">
    <meta name="twitter:image" content="images/Rokye-social-logo.png">

    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/Rokye-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <?php
            if($Message != '')
            {
               echo "<script type='text/javascript'> alert('". $Message ."'); </script>\n";
            }
            
    ?>
</head>

<body>
    <?php
         if(basename($_SERVER['PHP_SELF']) == 'index.php'){
    ?>
    <!-- <header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg"> -->
    <!-- <header class="main-header position-absolute fixed-top m-0 navbar-dark header-sticky header-sticky-smart header-mobile-xl"> -->
    <header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg">

        <div class="sticky-area">
            <div class="container container-xxl">
                <div class="d-flex align-items-center">
                    <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
                        <a class="navbar-brand mr-7" href="index.php">
                            <img src="images\logo.png" alt="Rokye" class="normal-logo">
                            <img src="images\logo.png" alt="Rokye" class="sticky-logo">
                        </a>
                 
                        <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                            data-target="#primaryMenu02" aria-controls="primaryMenu02" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                            <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="index.php">
                                        Home
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="listing.php">
                                        Listing
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#services">
                                         Services
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#about">
                                        About us
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#contact">
                                        Contact us
                                    </a>
                                </li>
                            </ul>
                            <div class="d-block d-xl-none">
                                <ul
                                    class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">

                                    <?php
                                            if(isset($_SESSION["SellerUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="seller/properties.php">Dashboard</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>
                                            <li class="nav-item ml-auto w-100 w-sm-auto"><a class="btn btn-primary btn-sm" href="seller/add_property.php"> Add Listing </a></li>

                                    <?php
                                            } elseif(isset($_SESSION["BuyerUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="inbox.php">inbox</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="profile.php">Profile</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="fav.php">My Favourites</a></li>

                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } elseif(isset($_SESSION["adminUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="admin/dashboard.php">Dashboard</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } else {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a></li>
                                                <?php

                                            }
                                    ?>


                   
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="ml-auto d-none d-xl-block">
                        <ul
                            class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">

                            <?php
                                            if(isset($_SESSION["SellerUserid"])) {
                                                ?>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="seller/properties.php">Dashboard</a></li>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>
                                            <li class="nav-item ml-auto w-100 w-sm-auto"><a class="btn btn-primary btn-sm" href="seller/add_property.php">Add Listing</a></li>

                                    <?php
                                            } elseif(isset($_SESSION["BuyerUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="inbox.php">inbox</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="profile.php">Profile</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="fav.php">My Favourites</a></li>

                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } elseif(isset($_SESSION["adminUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="admin/dashboard.php">Dashboard</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } else {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a></li>
                                                <?php

                                            }
                                    ?>


                               
                                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
         }
         else
         {
    ?>

    <header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg">
        <div class="sticky-area">
            <div class="container">
                <nav class="navbar navbar-expand-lg px-0">
                    <a class="navbar-brand" href="index.php">
                        <img src="images\logo.png" alt="Rokye" class="d-none d-lg-inline-block">
                        <img src="images\logo-white.png" alt="Rokye" class="d-inline-block d-lg-none">
                    </a>
                    <div class="d-flex d-lg-none ml-auto">
             
                        <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                            data-target="#primaryMenu01" aria-controls="primaryMenu01" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse mt-3 mt-lg-0 mx-auto flex-grow-0" id="primaryMenu01">
                    <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="index.php">
                                        Home
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="listing.php">
                                        Listing
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#services">
                                         Services
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#about">
                                        About us
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0" href="#contact">
                                        Contact us
                                    </a>
                                </li>
                            </ul>
                        <div class="d-block d-lg-none">
                            <ul class="navbar-nav flex-row justify-content-lg-end d-flex flex-wrap py-2">
                               
                   
                            <?php
                                            if(isset($_SESSION["SellerUserid"])) {
                                                ?>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="seller/properties.php">Dashboard</a></li>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>
                                            <li class="nav-item ml-auto w-100 w-sm-auto"><a class="btn btn-primary btn-sm" href="seller/add_property.php">Add Listing</a></li>

                                    <?php
                                            } elseif(isset($_SESSION["BuyerUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="inbox.php">inbox</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="profile.php">Profile</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="fav.php">My Favourites</a></li>

                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } elseif(isset($_SESSION["adminUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="admin/dashboard.php">Dashboard</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } else {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a></li>
                                                <?php

                                            }
                                    ?>

                            </ul>
                        </div>
                    </div>
                    <div class="d-none d-lg-block">
                        <ul class="navbar-nav flex-row justify-content-lg-end d-flex flex-wrap text-body py-2">
                            
         
                        <?php
                                            if(isset($_SESSION["SellerUserid"])) {
                                                ?>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="seller/properties.php">Dashboard</a></li>
                                            <li class="nav-item"> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>
                                            <li class="nav-item ml-auto w-100 w-sm-auto"><a class="btn btn-primary btn-sm" href="seller/add_property.php">Add Listing</a></li>

                                    <?php
                                            } elseif(isset($_SESSION["BuyerUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="inbox.php">inbox</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="profile.php">Profile</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="fav.php">My Favourites</a></li>

                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } elseif(isset($_SESSION["adminUserid"])) {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="admin/dashboard.php">Dashboard</a></li>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" href="logout.php">Logout</a></li>

                                                <?php
                                            } else {
                                                ?>
                                            <li class="nav-item "> <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a></li>
                                                <?php

                                            }
                                    ?>

                          
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <?php
        }
    ?>