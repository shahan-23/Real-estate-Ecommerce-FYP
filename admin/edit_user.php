<?php 
include 'header.php';

if(isset($_POST["save"])){

if($_POST["pass"] == ''){

    $updateQuery = "UPDATE users 
    SET name = '".$_POST["name"]."', phone = '".$_POST["phone"]."', id_card = '".$_POST["id_card"]."', dob = '".$_POST["dob"]."', email = '".$_POST["email"]."', status = '".$_POST["status"]."' , type = '".$_POST["type"]."'
    WHERE id ='".$_POST["id"]."'";
  $isUpdated = $data->setData($updateQuery);	
  if($isUpdated) {
    $Message = "Account details saved.";
  }

} else {

    $updateQuery = "UPDATE users 
    SET name = '".$_POST["name"]."', phone = '".$_POST["phone"]."', id_card = '".$_POST["id_card"]."', dob = '".$_POST["dob"]."', email = '".$_POST["email"]."', password = '".md5($_POST["pass"])."' , status = '".$_POST["status"]."' , type = '".$_POST["type"]."'
    WHERE id ='".$_POST["id"]."'";
     $isUpdated = $data->setData($updateQuery);	
     if($isUpdated) {
    $Message = "Account details saved.";
  }

}


  }	
  
if(isset($_GET['edit'])){
  $data = $data->getData("SELECT * FROM users WHERE id = '".$_GET['userId']."' LIMIT 1");

}
 foreach ($data as $row) { 

?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Edit User
            </h2>

        </div>
        <div class="collapse-tabs new-property-step">

            <div class="tab-content shadow-none p-0">
                <form action="" method="POST">
                    <div id="collapse-tabs-accordion">
                        <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="card bg-transparent border-0">

                                <div id="description-collapse" class="collapse show collapsible"
                                    aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php
      if($Message){
        ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <?php echo $Message;?>
                                                </div>
                                                <?php
      }
      ?>
                                                <div class="card mb-6">

                                                    <div class="card-body p-6">

                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $row['id'] ?>">

                                                            <div class="form-group">
                                                                <label for="inputAddress">Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="<?php echo $row['name'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Phone</label>
                                                                <input type="text" class="form-control" name="phone"
                                                                    value="<?php echo $row['phone'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">ID Card Number</label>
                                                                <input type="text" class="form-control" name="id_card"
                                                                    value="<?php echo $row['id_card'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Date of birth</label>
                                                                <input type="text" class="form-control" name="dob"  onfocus="(this.type='date')" value="<?php echo $row['dob'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    value="<?php echo $row['email'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password <small>(ignore if you dont want to change)</small> </label>
                                                                <input type="password" class="form-control" name="pass"
                                                                    placeholder="***" >
                                                            </div>
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-sm-2 pt-0">Status
                                                                    </legend>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status" value="active"
                                                                                <?php if($row['status'] == 'active') echo 'checked' ?>>
                                                                            <label class="form-check-label">
                                                                                Active
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status" value="blocked"
                                                                                <?php if($row['status'] == 'blocked') echo 'checked' ?>>
                                                                            <label class="form-check-label">
                                                                                Blocked
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <legend class="col-form-label col-sm-2 pt-0">Type
                                                                    </legend>
                                                                    <div class="col-sm-10">
                                                                    <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="type" value="buyer"
                                                                                <?php if($row['type'] == 'buyer') echo 'checked' ?>>
                                                                            <label class="form-check-label">
                                                                                Buyer
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="type" value="seller"
                                                                                <?php if($row['type'] == 'seller') echo 'checked' ?>>
                                                                            <label class="form-check-label">
                                                                                Seller
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="type" value="admin"
                                                                                <?php if($row['type'] == 'admin') echo 'checked' ?>>
                                                                            <label class="form-check-label">
                                                                                Admin
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        

                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-lg btn-primary mb-3" type="submit" name="save">Save
                                            </button>
                                        </div>
                </form>

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

<script src="js\theme.js"></script>

</body>

</html>