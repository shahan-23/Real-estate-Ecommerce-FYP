<?php 

$Message = '';
include 'header.php';

if(isset($_POST["save"])){

    if(empty($_FILES['File']['name'])){
    
        $updateQuery = "UPDATE Listing 
        SET name = '".$_POST["title"]."', location = '".$_POST["location"]."', type = '".$_POST["category"]."', description = '".$_POST["description"]."' , price = '".$_POST["price"]."', 
        contact = '".$_POST["contact"]."', map_link = '".$_POST["map_link"]."'
        WHERE id ='".$_POST["id"]."'";
      $isUpdated = $data->setData($updateQuery);	
      if($isUpdated) {
        $Message = "Details Updated.";
      }
    
    } else {

        $fileName = $_FILES['File']['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = md5(time() . $fileName).'.'.$ext;
        $destination1 = '../propertyPhotos/' . $fileName;
        $file = $_FILES['File']['tmp_name'];
        $move = move_uploaded_file($file, $destination1);
    
        $updateQuery = "UPDATE Listing 
        SET name = '".$_POST["title"]."', location = '".$_POST["location"]."', image = '".$fileName."', type = '".$_POST["category"]."', description = '".$_POST["description"]."' , price = '".$_POST["price"]."', 
        contact = '".$_POST["contact"]."', map_link = '".$map_link."'
        WHERE id ='".$_POST["id"]."'";
         $isUpdated = $data->setData($updateQuery);	
         if($isUpdated) {
            $Message = "Details Updated.";
        }
    
    }
    
      }	
      
    if(isset($_GET['edit'])){
      $data = $data->getData("SELECT * FROM Listing WHERE id = '".$_GET['pId']."' LIMIT 1");
    
    }
     foreach ($data as $row) { 
    
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
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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
                                                                name="title" required value="<?php echo $row['name'] ?>">
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
                                                                name="location" required value="<?php echo $row['location'] ?>">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <label for="description-01"
                                                                class="text-heading">Description</label>
                                                                <textarea  class="form-control border-0" rows="5"
                                                                name="description" required id="summernote">
                                                                <?php echo $row['description'] ?>
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
                                                                        <option <?php if($row['type'] == 'RENT' ) echo "selected" ?> value="RENT">For Rent</option>
                                                                        <option <?php if($row['type'] == 'SALE' ) echo "selected" ?> value="SALE">For Sale</option>
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
                                                                        class="text-heading">Photo</label>
                                                                        <input type="file"
                                                                class="form-control form-control-lg border-0"
                                                                name="File">
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
                                                                        id="price" name="price" required value="<?php echo $row['price'] ?>">
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
                                                                    <input type="text" class="form-control form-control-lg border-0" name="contact" required value="<?php echo $row['contact'] ?>">
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
                                                                    <label for="price" class="text-heading">Google map link</label>
                                                                    <textarea class="form-control form-control-lg border-0" name="map_link" required id="summernote2">
                                                                      <?php echo $row['map_link'] ?>
                                                                      </textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                     
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-lg btn-primary mb-3" type="submit" name="save" >Submit
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

<?php } ?>

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