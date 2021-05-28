<?php 
include 'header.php';


if(isset($_POST["addUser"])){
  if(empty($_POST["pass"]) && $_POST["pass"] == '') {
    $Message = "Please enter passwords.";
  } else if(!empty($_POST["pass"]) && $_POST["pass"] != '' && $_POST["pass"] != $_POST["cpass"]) {
    $Message = "Confirm passwords do not match.";
  } else if(!empty($_POST["pass"]) && $_POST["pass"] != '' && $_POST["pass"] == $_POST["cpass"]) {

    foreach($data->getData("SELECT * FROM users WHERE email = '".$_POST["email"]."' LIMIT 1") as $key => $check){
        $check = $check['id'];
    }
        if(!empty($check)){
            $Message = "Account already exests.";
        }
        else {
            $sqlQuery = "INSERT INTO users (name, phone, id_card, dob, email, password, status, type) VALUES ('".$_POST["name"]."', '".$_POST["phone"]."', '".$_POST["id_card"]."', '".$_POST["dob"]."', '".$_POST["email"]."', '".md5($_POST["pass"])."', '".$_POST["status"]."', '".$_POST["type"]."')";
         
            $isUpdated = $data->setData($sqlQuery);	
            if($isUpdated) {
              $Message = "Account details saved.";
            }
        }
  }	

}


?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Add new User
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

                                                            <div class="form-group">
                                                                <label for="inputAddress">Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Full Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Phone</label>
                                                                <input type="text" class="form-control" name="phone"
                                                                    placeholder="Phone Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">ID Card Number</label>
                                                                <input type="text" class="form-control" name="id_card" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Date of birth</label>
                                                                <input type="text" class="form-control" name="dob" onfocus="(this.type='date')" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputAddress">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="user@website.com">
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Password&</label>
                                                                    <input type="password" class="form-control"
                                                                        name="pass" placeholder="***">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Confirm Password*</label>
                                                                    <input type="password" class="form-control"
                                                                        name="cpass" placeholder="***">
                                                                </div>
                                                            </div>

                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-sm-2 pt-0">Status
                                                                    </legend>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status" value="active" checked>
                                                                            <label class="form-check-label">
                                                                                Active
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status" value="blocked">
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
                                                                                name="type" value="buyer" checked>
                                                                            <label class="form-check-label">
                                                                                Buyer
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="type" value="seller" checked>
                                                                            <label class="form-check-label">
                                                                                Seller
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="type" value="admin">
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
                                            <button class="btn btn-lg btn-primary mb-3" type="submit"  name="addUser">Add User
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