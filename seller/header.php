<?php
require '../auth/auth.php';
$data->SellerLoginStatus();


$chat = $data->getNumRows("SELECT * FROM chat WHERE  receiver_id = '".$_SESSION["SellerUserid"]."' AND status = 'unread'");    


$Listing = $data->getNumRows("SELECT * FROM Listing WHERE user_id ='".$_SESSION["SellerUserid"]."'"); 
$favListing = $data->getNumRows("SELECT * FROM fav WHERE user_id ='".$_SESSION["SellerUserid"]."'"); 


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard</title>

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
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


    <link rel="stylesheet" href="css\themes.css">

    <link rel="icon" href="images\favicon.ico">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Dashboard">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">

    <meta property="og:url" content="dashboard.html">
    <meta property="og:title" content="Dashboard">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
</head>

<body>
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            <div class="db-sidebar bg-white">
                <nav class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
                    <div class="sticky-area shadow-xs-1 py-3">
                        <div class="d-flex px-3 px-xl-6 w-100">
                            <a class="navbar-brand" href="../index.php">
                                <img src="images\logo.png" alt="HomeID">
                            </a>
                            <div class="ml-auto d-flex align-items-center ">
                                <div class="d-flex align-items-center d-xl-none">
                                    <div class=" px-3">
                                        <div class="d-flex align-items-center text-heading">
                                            <div class="w-48px">
                                                <img src="images\testimonial-5.jpg" alt="Ronald Hunter"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                           
                                </div>
                                <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                                    data-target="#primaryMenuSidebar" aria-controls="primaryMenuSidebar"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse bg-white" id="primaryMenuSidebar">
                            <ul class="list-group list-group-flush w-100">
                                <li class="list-group-item pt-6 pb-4">
                                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Listings</h5>
                                    <ul class="list-group list-group-no-border rounded-lg">
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="add_property.php"
                                                class="text-heading lh-1 sidebar-link">
                                                <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-plus"></i></span>
                                                <span class="sidebar-item-text">Add new</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="properties.php"
                                                class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                                <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-building"></i></span>
                                                <span class="sidebar-item-text">My Properties</span>
                                                <span
                                                    class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold"><?php echo $Listing; ?></span>
                                            </a>
                                        </li>
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="favorites.php"
                                                class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                                <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-heart"></i></span>
                                                <span class="sidebar-item-text">My Favorites</span>
                                                <span
                                                    class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold"><?php echo $favListing; ?></span>
                                            </a>
                                        </li>
                      
                                    </ul>
                                </li>
                                <li class="list-group-item pt-6 pb-4">
                                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Chat</h5>
                                    <ul class="list-group list-group-no-border rounded-lg">
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="chat.php"
                                                class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                                <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-comments"></i></span>
                                                <span class="sidebar-item-text">Chat</span>
                                                <?php
                                                    if($chat != NULL){
                                                    ?>
                                                            <span
                                                    class=" ml-auto text-primary fs-15 font-weight-bold"><?php echo $chat; ?></span>
                                                    <?php } ?>
                                            </a>
                                        </li>
                      
                                    </ul>
                                </li>
                                <li class="list-group-item pt-6 pb-4">
                                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Acount</h5>
                                    <ul class="list-group list-group-no-border rounded-lg">
                                  
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="profiles.php" class="text-heading lh-1 sidebar-link">
                                            <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-id-card"></i></span>

                                                <span class="sidebar-item-text">My Profile</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a href="logout.php" class="text-heading lh-1 sidebar-link">
                                            <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-sign-out-alt"></i></span>

                                                <span class="sidebar-item-text">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="page-content">
                <header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
                            <div class="col-md-12 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
                                <div class="dropdown py-3 text-right">
                                    <div class="text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end">
                                     <div class="mr-4 w-48px">
                                        <img src="https://img.icons8.com/fluent/96/000000/user-male-circle.png" class="rounded-circle"/>
                                     </div>
                                     <div class="fs-13 font-weight-500 lh-1">
                                         <?php echo $_SESSION["SellerName"] ?>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>