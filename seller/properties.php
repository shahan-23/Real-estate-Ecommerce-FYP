<?php 
include 'header.php';


if(isset($_POST['delete'])){
  $data->setData("DELETE FROM listing WHERE id ='".$_POST["id"]."'");
}

$data = $data->getData("SELECT * FROM listing WHERE user_id = '".$_SESSION["SellerUserid"]."'  ORDER BY id DESC");




?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">My Properties
                </h2>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example1" class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                    <tr>
                        <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing title</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Status</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data as $row) { ?>

                    <tr class="shadow-hover-xs-2 bg-hover-white">
                        <td class="align-middle pt-6 pb-4 px-6">
                            <div class="media">
                                <div class="w-120px mr-4 position-relative">
                                    <a href="single-property-1.html">
                                        <img src="../propertyPhotos/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                                    </a>
                                    <span class="badge badge-indigo position-absolute pos-fixed-top">for
                                        <?php echo $row['type'] ?></span>
                                </div>
                                <div class="media-body">
                                <form action="../property.php" method="GET">
                                        <input type="hidden" name="property" value="<?php echo $row['id'] ?>">
                                        <button type="submit" style="border: none; background: none; padding: 0;" class="text-dark hover-primary"><h5 class="fs-16 mb-0 lh-18"><?php echo $row['name'] ?></h5></button>
                                    </form>
                                    <span class="text-heading lh-15 font-weight-bold fs-17">BDT <?php echo $row['price'] ?></span>
                                    <small><?php echo $row['location'] ?></small>
                                </div>
                            </div>
                        </td>
    
                        <td class="align-middle">
                             <span class="badge text-capitalize font-weight-normal fs-12 badge-<?php if($row['status'] == 'Pending') {echo 'yellow';} else {echo 'success';} ?>"><?php echo $row['status'] ?></span> <br>
                        </td>
                       
                        <td class="align-middle">
                        
                            <form action="edit_property.php" method="get">
                            <input type="hidden" name="pId" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="edit" data-toggle="tooltip" title="Edit" class="btn btn-link fs-18 text-muted"><i class="fal fa-pencil-alt"></i></button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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