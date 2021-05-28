<?php 
include 'header.php';


if(isset($_POST['delete'])){
  $data->setData("DELETE FROM users WHERE id ='".$_POST["userId"]."'");
}

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
            $sqlQuery = "INSERT INTO users (name, email, password, status, type) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".md5($_POST["passwd"])."', '".$_POST["status"]."', '".$_POST["type"]."')";
         
            $isUpdated = $data->setData($sqlQuery);	
            if($isUpdated) {
              $Message = "Account details saved.";
            }
        }
  }	

}

$data = $data->getData("SELECT * FROM users WHERE id != '1' ORDER BY id DESC");




?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
            <?php
      if($Message){
        ?>
            <div class="alert alert-info alert-dismissible">
                <?php echo $Message;?>
            </div>
            <?php
      }
      ?>
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">Users
                </h2>
            </div>

        </div>
        <div class="table-responsive">
            <table id="example1" class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                    <tr>
                        <th scope="col" class="border-top-0 pt-5 pb-4">#</th>

                        <th scope="col" class="border-top-0 px-6 pt-5 pb-4">User Info</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Email & Phone</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Status</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Type</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>

                    <tr class="shadow-hover-xs-2 bg-hover-white">
                        <td class="align-middle"><?php echo $row['id'] ?></td>
                        <td class="align-middle pt-6 pb-4 px-6">
                            <h5 class="fs-16 mb-0 lh-18"><?php echo $row['name'] ?></h5>
                            <small>ID: <?php echo $row['id_card'] ?></small><br>
                            <small>DOB: <?php echo $row['dob'] ?></small>

                        </td>
                        <td class="align-middle"><?php echo $row['email'] ?> <br>
                        <small><?php echo $row['phone'] ?></small></td>
                        <td class="align-middle">
                            <span
                                class="badge text-capitalize font-weight-normal fs-12 badge-<?php if($row['status'] == 'blocked') { echo 'danger';} elseif($row['status'] == 'pending') {echo 'yellow';} else {echo 'success';} ?>"><?php echo $row['status'] ?></span>
                        </td>
                        <td class="align-middle"><?php echo $row['type'] ?></td>
                        <td class="align-middle btn-group">
                        
                            <form action="edit_user.php" method="get">
                            <input type="hidden" name="userId" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="edit" data-toggle="tooltip" title="Edit" class="btn btn-link fs-18 text-muted"><i class="fal fa-pencil-alt"></i></button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="userId" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="delete" data-toggle="tooltip" title="Delete" class="btn btn-link fs-18 text-danger"><i class="fal fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>


                    <?php } ?>

                </tbody>
            </table>
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

  <!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


});



</script>

</body>

</html>