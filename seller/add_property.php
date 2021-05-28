<?php 
$Message = '';
include 'header.php';

if(isset($_POST["add"])){
    if(empty($_FILES['File']['name'])){
        $Message = "Please add file.";

    } else {

        $fileName = $_FILES['File']['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = md5(time() . $fileName).'.'.$ext;
        $destination1 = '../propertyPhotos/' . $fileName;
        $file = $_FILES['File']['tmp_name'];
        $move = move_uploaded_file($file, $destination1);
    
                  $sqlQuery = "INSERT INTO listing (user_id, image, name, location, type, description, price, contact, map_link) 
                  VALUES ('".$_SESSION["SellerUserid"]."', '".$fileName."', '".$_POST["title"]."', '".$_POST["location"]."', '".$_POST["category"]."', '".$_POST["description"]."', '".$_POST["price"]."', '".$_POST["contact"]."', '".$_POST["map_link"]."')";
               
                  $isUpdated = $data->setData($sqlQuery);	
                  if($isUpdated) {
                    $Message = "Details saved.";
                  }	

    }
  
      
  
  
  }
  

?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
            </h2>

        </div>
        <div class="collapse-tabs new-property-step">

            <div class="tab-content shadow-none p-0">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div id="collapse-tabs-accordion">
                        <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="card bg-transparent border-0">
                            <?php
      if($Message){
        ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <?php echo $Message;?>
                                                </div>
                                                <?php
      }
      ?>

                                <div id="description-collapse" class="collapse show collapsible"
                                    aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                            Name</h3>
                                                        <div class="form-group">
                                                            <label for="title" class="text-heading">Title <span
                                                                    class="text-muted">(mandatory)</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-lg border-0" id="title"
                                                                name="title" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                            Property
                                                            Description</h3>
                                                        <div class="form-group">
                                                            <label for="title" class="text-heading">Location <span
                                                                    class="text-muted">(mandatory)</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-lg border-0" id="location"
                                                                name="location" required>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <label for="description-01"
                                                                class="text-heading">Description</label>
                                                                <textarea  class="form-control border-0" rows="5"
                                                                name="description" required id="summernote">
                                                                  Place <em>some</em> <u>text</u> <strong>here</strong>
                                                                </textarea>
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                            Select
                                                            Category</h3>

                                                        <div class="form-group ">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2 mb-4 mb-md-0">
                                                                <div class="form-group mb-0">
                                                                    <label for="category"
                                                                        class="text-heading">Category</label>
                                                                    <select
                                                                        class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                        title="Select" data-style="btn-lg py-2 h-52"
                                                                        id="category" name="category" required>
                                                                        <option value="RENT">For Rent</option>
                                                                        <option value="SALE">For Sale</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                            Select
                                                            Photo</h3>

                                                        <div class="form-group ">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2 mb-4 mb-md-0">
                                                                <div class="form-group mb-0">
                                                                    <label for="category"
                                                                        class="text-heading">Photo <br><i class="text-danger">Please upload collaged photo</i></label>
                                                                        <input type="file"
                                                                class="form-control form-control-lg border-0"
                                                                name="File" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                            Property
                                                            Price</h3>

                                                        <div class="form-group ">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                <div class="form-group">
                                                                    <label for="price" class="text-heading">Price
                                                                        <span class="text-muted">(only
                                                                            numbers)</span></label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg border-0"
                                                                        id="price" name="price" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                        Contact (Agent Phone Number) </h3>

                                                        <div class="form-group ">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                <div class="form-group">
                                                                    <label for="price" class="text-heading">Contact</label>
                                                                    <input type="text" class="form-control form-control-lg border-0" name="contact" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                        Where is the place</h3>

                                                        <div class="form-group ">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                <div class="form-group">
                                                                    <label for="price" class="text-heading">Google map iframe</label>
                                                                    <!-- <input type="text" class="form-control form-control-lg border-0" name="map_link" required> -->
                                                                    <input class="form-control form-control-lg border-0" name="map_link" required>
                                                                       
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                     
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-lg btn-primary mb-3" type="submit" name="add" >Submit
                                                property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

<script src="../plugins/summernote/summernote-bs4.min.js"></script>

<script src="js\theme.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
    $('#summernote2').summernote()

  })
</script>

</body>

</html>