<?php 

$Message = '';
include 'header.php';

if(isset($_POST['remove'])){
    $data->setData("DELETE FROM fav WHERE user_id ='".$_POST["user"]."' AND pid ='".$_POST["pid"]."'");
  }
  
      
      $favs = $data->getData("SELECT * FROM fav LEFT JOIN listing ON fav.pid = listing.id WHERE fav.user_id ='".$_SESSION["adminUserid"]."' ");
      $favListing = $data->getNumRows("SELECT * FROM fav WHERE user_id ='".$_SESSION["adminUserid"]."'"); 

    
    
    ?>
                <main id="content" class="bg-gray-01">
                    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
                        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                            <div class="mr-0 mr-md-auto">
                                <h2 class="mb-0 text-heading fs-22 lh-15">My Favorites<span
                                        class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?php echo $favListing; ?></span>
                                </h2>
                            </div>
                        </div>

                        <div class="row">

                        <?php foreach ($favs as $row) { ?>

                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="../propertyPhotos/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-primary">for<?php echo $row['type'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                    <form action="../property.php" method="GET">
                                        <input type="hidden" name="property" value="<?php echo $row['id'] ?>">
                                        <button type="submit" style="border: none; background: none; padding: 0;" class="text-dark hover-primary"><h5 class="fs-16 mb-0 lh-18"><?php echo $row['name'] ?></h5></button>
                                    </form>
                                        <p class="card-text font-weight-500 text-gray-light mb-2"> <?php
                                         $dis = $row['description'];
                                         echo substr($dis,0,100);
                                           ?></p>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">BDT <?php echo $row['price'] ?></span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                        
                                            <li class="list-inline-item">
                                            <form action="" method="post">
                                              <input type="hidden" name="user" value="<?php echo $_SESSION["adminUserid"] ?>">
                                              <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                                                <button type="submit" name="remove" style="border: none; background: none; padding: 0;" class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-danger bg-accent border-accent" data-toggle="tooltip" title="Remove From Favorites"><i class="fas fa-trash"></i></button>
                                           </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                 
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