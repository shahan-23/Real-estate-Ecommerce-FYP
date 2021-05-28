<?php 
include 'header.php';

$listing = $data->getNumRows("SELECT * FROM listing "); 
$users = $data->getNumRows("SELECT * FROM users "); 





?>
                <main id="content" class="bg-gray-01">
                    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
                        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                            <div class="mr-0 mr-md-auto">
                                <h2 class="mb-0 text-heading fs-22 lh-15">Welcome back, <?php echo $_SESSION["admin"] ?>!</h2>
                            </div>
                            <div>
                                <a href="dashboard-add-new-property.html" class="btn btn-primary btn-lg">
                                    <span>Add New Property</span>
                                    <span class="d-inline-block ml-1 fs-20 lh-1"><svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xxl-6 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-5">
                                            <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-blue badge-circle">
                                                <i class="fal fa-building"></i>
                                            </span>
                                        </div>
                                        <div class="col-7 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="<?php echo $listing ?>"
                                                data-decimals="0" data-duration="0" data-separator=""><?php echo $listing ?></p>
                                            <p>Properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-6 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-5">
                                             <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-blue badge-circle">
                                                <i class="fal fa-users"></i>
                                            </span>
                                        </div>
                                        <div class="col-7 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="<?php echo $users ?>"
                                                data-decimals="0" data-duration="0" data-separator=""><?php echo $users ?></p>
                                            <p>Total Users</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="vendors\jquery.min.js"></script>
    <script src="vendors\jquery-ui\jquery-ui.min.js"></script>
    <script src="vendors\bootstrap\bootstrap.bundle.js"></script>
    <script src="vendors\bootstrap-select\js\bootstrap-select.min.js"></script>
    <script src="vendors\slick\slick.min.js"></script>
    <script src="vendors\waypoints\jquery.waypoints.min.js"></script>
    <script src="vendors\counter\countUp.js"></script>
    <script src="vendors\magnific-popup\jquery.magnific-popup.min.js"></script>
    <script src="vendors\chartjs\Chart.min.js"></script>
    <script src="vendors\dropzone\js\dropzone.min.js"></script>
    <script src="vendors\timepicker\bootstrap-timepicker.min.js"></script>
    <script src="vendors\hc-sticky\hc-sticky.min.js"></script>
    <script src="vendors\jparallax\TweenMax.min.js"></script>
    <script src="vendors\mapbox-gl\mapbox-gl.js"></script>

    <script src="js\theme.js"></script>

 
</body>

</html>