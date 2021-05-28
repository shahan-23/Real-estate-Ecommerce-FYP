<?php 
$Message = '';
include 'header.php';

if(isset($_POST["save"])){
    if(empty($_POST["passwd"]) && $_POST["passwd"] == '') {
        
        $updateQuery = "UPDATE users SET name = '".$_POST["name"]."', phone = '".$_POST["phone"]."', dob = '".$_POST["dob"]."', email = '".$_POST["email"]."' WHERE id ='".$_SESSION["SellerUserid"]."'";
         $isUpdated = $data->setData($updateQuery);	

         if($isUpdated) {
            $_SESSION["SellerName"] = $_POST['name'];
            $Message = "Account details saved.";
          }
  
      } else if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] != $_POST["cpasswd"]) {

          $Message = "Confirm passwords do not match.";

      } else if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] == $_POST["cpasswd"]) {

          $updatePassword = ", password='".md5($_POST["passwd"])."' ";
          $updateQuery = "UPDATE users 
         SET name = '".$_POST["name"]."', phone = '".$_POST["phone"]."', dob = '".$_POST["dob"]."', email = '".$_POST["email"]."' $updatePassword
          WHERE id ='".$_SESSION["SellerUserid"]."'";
         $isUpdated = $data->setData($updateQuery);	

            if($isUpdated) {
              $_SESSION["SellerName"] = $_POST['name'];
              $Message = "Account details saved.";
            }
     }	
  
  }
  
  $data = $data->getData("SELECT * FROM users WHERE id = '".$_SESSION["SellerUserid"]."' LIMIT 1");
 foreach ($data as $row) { 

?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">My Profile
            </h2>
          
        </div>
            <div class="row mb-6">
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
                        <div class="card-body px-6 pt-6 pb-5">

                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                                            value="<?php echo $row['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"
                                            value="<?php echo $row['phone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Card Number <small>(Contact admin to change)</small></label>
                                        <input type="text" class="form-control" value="<?php echo $row['id_card'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date of birth</label>
                                        <input type="text" onfocus="(this.type='date')" class="form-control" name="dob"
                                            value="<?php echo $row['dob'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                                            value="<?php echo $row['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password <small>(ignore if you dont want to change)</small></label>
                                        <input type="password" class="form-control" name="passwd"
                                            placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="cpasswd"
                                            placeholder="Enter Confirm Password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="d-flex justify-content-end flex-wrap">
                                    <button type="submit" name="save" class="btn btn-lg btn-primary ml-4 mb-3">Update Profile</button>
                                </div>
                                </form>


                        </div>
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