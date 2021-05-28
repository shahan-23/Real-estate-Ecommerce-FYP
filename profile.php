<?php 
    include 'includes/header.php';

    $data->BuyerLoginStatus();



    if(isset($_POST["save"])){
        if(empty($_POST["passwd"]) && $_POST["passwd"] == '') {
            
            $updateQuery = "UPDATE users SET name = '".$_POST["name"]."', phone = '".$_POST["phone"]."', dob = '".$_POST["dob"]."', email = '".$_POST["email"]."' WHERE id ='".$_SESSION["BuyerUserid"]."'";
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
              WHERE id ='".$_SESSION["BuyerUserid"]."'";
             $isUpdated = $data->setData($updateQuery);	
    
                if($isUpdated) {
                  $_SESSION["SellerName"] = $_POST['name'];
                  $Message = "Account details saved.";
                }
         }	
      
      }
      
      $data = $data->getData("SELECT * FROM users WHERE id = '".$_SESSION["BuyerUserid"]."' LIMIT 1");
     foreach ($data as $row) { 
    


?>

<main id="content">
    <section class="pb-8 page-title shadow">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Buyer profile</h1>
            </nav>
        </div>
    </section>
    <section class="pt-8 pb-11 bg-gray-01">
        <div class="container">
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
        </div>
    </section>
</main>

<?php } 
    include 'includes/footer.php'
?>