<footer class="bg-dark pt-8 pb-6 footer text-muted">
        <div class="container container-xxl">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
                    <a class="d-block mb-2" href="#">
                        <img src="images\logo-white-primary.png" alt="Rokye">
                    </a>
                    <div class="lh-26 font-weight-500">
                        <p class="mb-0">We are an experienced group of people who have been doing real-estate business for the last 30 years. Our goal is to connect the real-estate agents with the appropiate buyers and accomplish this in the form of easy and convenient web platform.</p>
                        <p>Trusted by more than 1000+ people</p>
                    </div>
                </div>
                <div class="row col-md-6 col-lg-5 mb-6 mb-md-0">
                <div class="col-md-12 ">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Location</h4>
                    <p>Golden Plaza, (3rd Floor)Plot No. 34, Road No. 46, Gulshan Circle-2, Dhaka-1212.</p>
                </div>
                <div class="col-md-12 ">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Phone</h4>
                    <p>+88 0288 33406</p>
                </div>
                <div class="col-md-12 ">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Email</h4>
                    <p>bananiproperty-bd@gmail.com</p>
                </div>
                </div>
                
   
                <div class="col-md-6 col-lg-3 mb-6 mb-md-0">
                    <h4 class="text-white fs-16 my-4 font-weight-500">LATEST NEWS</h4>
                    <p class="font-weight-500 text-muted lh-184">Follow us on facebook @Banani Properties LTD</p>
                    <p>Follow our Facebook page to keep up-to-date with latest announcements, promotions, dealings etc.</p>
            
                </div>
            </div>
            <div class="mt-0 mt-md-10 row">
                <ul class="list-inline mb-0 col-md-6 mr-auto">
                    <li class="list-inline-item mr-6">
                        <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
                    </li>
                </ul>
                <p class="col-md-auto mb-0 text-muted">
                    © 2020 Roof-site. All Rights Reserved
                </p>
            </div>
        </div>
    </footer>

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

          <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
  $(function () {
    $("#listings").DataTable({
        "ordering": false,
        "info": false,

      "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>


    <div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog"
        aria-labelledby="login-register-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 p-0">
                    <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
                        <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
                            data-toggle="tab" href="#login" role="tab" aria-controls="login"
                            aria-selected="true">Login</a>
                        <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab"
                            href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                        <div class="nav-item col-sm-6 ml-0 d-flex align-items-center justify-content-end">
                            <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-4 py-sm-7 px-sm-8">
                    <div class="tab-content shadow-none p-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form class="form" method="post" action="">
                                <div class="form-group mb-4">
                                    <label for="username" class="sr-only">Email</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                                id="inputGroup-sizing-lg">
                                                <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13" id="username"
                                            name="loginId" required="" placeholder="Your email" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13" id="password"
                                            name="loginPass" required="" placeholder="Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                                      
                                    </div>
                                </div>
             
                        
                                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Log in</button>
                            </form>
                        </div>


                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="form" method="post" action="">
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                        name="name" class="form-control" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i></span>
                                        </div>

                                        <select class="form-control border-0 shadow-none fs-13" name="type" class="form-control" required>
                                            <option selected>Select Account Type</option>
                                              <option value="buyer">Buyer</option>
                                              <option value="seller">Seller</option>
                                            </select>

                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                        name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                        name="id_card" class="form-control" placeholder="ID Card Number" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" onfocus="(this.type='date')" class="form-control border-0 shadow-none fs-13"
                                        name="dob" class="form-control" placeholder="Date of Birth" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="email" class="form-control border-0 shadow-none fs-13"
                                        name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13" name="passwd" class="form-control" placeholder="Password" required>
                                       
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13" name="cpasswd" class="form-control" placeholder="Retype password" required>
                                       
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#"
            class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
            title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
</body>



</html>