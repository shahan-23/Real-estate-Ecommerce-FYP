<?php 
    include 'includes/header.php';

    // find out how many rows are in the table 
                   
    $numrows = $data->getNumRows("SELECT * FROM listing WHERE status = 'Approved'"); 


    // number of rows to show per page
    $rowsperpage = 5;
    // find out total pages
    $totalpages = ceil($numrows / $rowsperpage);
                                    
    // get the current page or set a default
    if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
       // cast var as int
       $currentpage = (int) $_GET['currentpage'];
    } else {
       // default page num
       $currentpage = 1;
    } // end if
    
    // if current page is greater than total pages...
    if ($currentpage > $totalpages) {
       // set current page to last page
       $currentpage = $totalpages;
    } // end if
    // if current page is less than first page...
    if ($currentpage < 1) {
       // set current page to first page
       $currentpage = 1;
    } // end if
    
    // the offset of the list, based on current page 
    $offset = ($currentpage - 1) * $rowsperpage;
    
    // // get the info from the db 
    // $sql = "SELECT id, number FROM numbers LIMIT $offset, $rowsperpage";
    // $result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
    
    if(isset($_GET['sortby']) AND $_GET['sortby'] == '1'){

        $listing = $data->getData("SELECT * FROM listing WHERE status = 'Approved' ORDER BY CAST(price AS DECIMAL(18,2)) ASC LIMIT $offset, $rowsperpage");

    } elseif(isset($_GET['sortby']) AND $_GET['sortby'] == '2') {

        $listing = $data->getData("SELECT * FROM listing WHERE status = 'Approved' ORDER BY CAST(price AS DECIMAL(18,2)) DESC LIMIT $offset, $rowsperpage");

    } else {

        $listing = $data->getData("SELECT * FROM listing WHERE status = 'Approved' ORDER BY id DESC LIMIT $offset, $rowsperpage");


    }




?>
<main id="content">
    <section class="pb-8 page-title shadow">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listing</li>
                </ol>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Properties Listing</h1>
            </nav>
        </div>
    </section>
    <section class="pt-6 pb-7">
        <div class="container">
            <div class="row align-items-sm-center">
                <div class="col-md-6">
                    <h2 class="fs-15 text-dark mb-0">We found <span
                            class="text-primary"><?php echo $numrows; ?></span>
                        properties
                        available for
                        you
                    </h2>
                </div>
                <div class="col-md-6 mt-6 mt-md-0">
                    <div class="d-flex justify-content-md-end align-items-center">
                        <div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
                            <label
                                class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                            <form action="" method="get">
                
                                <select  onchange="this.form.submit()" class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby"
                                    data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3"
                                    id="inputGroupSelect01" name="sortby">
                                    <option selected>Price</option>
                                    <option value="1">Price(low to high)</option>
                                    <option value="2">Price(high to low)</option>
                                </select>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pb-9 pb-md-11">
        <div class="container">

                       <?php 

                         foreach($listing as $row) {

                         ?>



            <div class="media p-4 border rounded-lg shadow-hover-1 pr-lg-8 mb-6 flex-column flex-lg-row no-gutters"
                data-animate="fadeInUp">
                <div class="col-lg-4 mr-lg-5 card border-0 hover-change-image bg-hover-overlay">
                    <img src="propertyPhotos/<?php echo $row['image'] ?>" class="card-img"
                        alt="<?php echo $row['name'] ?>">
                    <div class="card-img-overlay p-2 d-flex flex-column">
                        <div>
                            <span class="badge badge-primary">For <?php echo $row['type'] ?></span>
                        </div>

                    </div>
                </div>
                <div class="media-body mt-5 mt-lg-0">
                    <h2 class="my-0">
                        <form action="property.php" method="GET">
                            <input type="hidden" name="property" value="<?php echo $row['id'] ?>">
                            <button type="submit" style="border: none; background: none; padding: 0;"
                                class="fs-16 lh-2 text-dark hover-primary d-block"><?php echo $row['name'] ?></button>
                        </form>
                    </h2>
                    <p class="mb-2 font-weight-500 text-gray-light"><?php echo $row['location'] ?></p>
                    <p class="mb-6 mxw-571 ml-0"><?php
                                                     $dis = $row['description'];
                                                     echo substr($dis,0,200);
                                                         ?></p>
                    <div class="d-lg-flex justify-content-lg-between">

                        <p class="fs-22 font-weight-bold text-heading lh-1 mb-0 pr-lg-3 mb-lg-2 mt-3 mt-lg-0">BDT
                            <?php echo $row['price'] ?>
                        </p>
                    </div>
                </div>
            </div>





            <?php } ?>


            <nav class="pt-4">
                <ul class="pagination rounded-active justify-content-center mb-0">
                <?php

if(isset($_GET['sortby'])) {

    
/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
// show << link to go back to page 1
?>
<li class="page-item"><a class="page-link" href="<?php $_SERVER['PHP_SELF']?>?sortby=<?php echo $_GET['sortby'] ?>&currentpage=1"><i
            class="far fa-angle-double-left"></i></a></li>

<?php
// get previous page num
$prevpage = $currentpage - 1;
// show < link to go back to 1 page
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?sortby=<?php echo $_GET['sortby'] ?>&currentpage=<?php echo $prevpage ?>"><i
            class="far fa-angle-left"></i></a></li>
<?php
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
// if it's a valid page number...
if (($x > 0) && ($x <= $totalpages)) {
// if we're on current page...
if ($x == $currentpage) {
// 'highlight' it but don't make a link

?>
<li class="page-item active"><a class="page-link"><?php echo $x ?></a></li>
<?php
// if not current page...
} else {
// make it a link
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?sortby=<?php echo $_GET['sortby'] ?>&currentpage=<?php echo $x ?>"><?php echo $x ?></a></li>
<?php
} // end else
} // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
// get next page
$nextpage = $currentpage + 1;
// echo forward link for next page 
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?sortby=<?php echo $_GET['sortby'] ?>&currentpage=<?php echo $nextpage ?>"><i
            class="far fa-angle-double-right"></i></a></li>
<?php
// echo forward link for lastpage
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?sortby=<?php echo $_GET['sortby'] ?>&currentpage=<?php echo $totalpages ?>"><i
            class="far fa-angle-right"></i></a></li>
<?php
} // end if
/****** end build pagination links ******/



} else {

    /******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
// show << link to go back to page 1
?>
<li class="page-item"><a class="page-link" href="<?php $_SERVER['PHP_SELF']?>?currentpage=1"><i
            class="far fa-angle-double-left"></i></a></li>

<?php
// get previous page num
$prevpage = $currentpage - 1;
// show < link to go back to 1 page
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?currentpage=<?php echo $prevpage ?>"><i
            class="far fa-angle-left"></i></a></li>
<?php
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
// if it's a valid page number...
if (($x > 0) && ($x <= $totalpages)) {
// if we're on current page...
if ($x == $currentpage) {
// 'highlight' it but don't make a link

?>
<li class="page-item active"><a class="page-link"><?php echo $x ?></a></li>
<?php
// if not current page...
} else {
// make it a link
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?currentpage=<?php echo $x ?>"><?php echo $x ?></a></li>
<?php
} // end else
} // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
// get next page
$nextpage = $currentpage + 1;
// echo forward link for next page 
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?currentpage=<?php echo $nextpage ?>"><i
            class="far fa-angle-double-right"></i></a></li>
<?php
// echo forward link for lastpage
?>
<li class="page-item"><a class="page-link"
        href="<?php $_SERVER['PHP_SELF']?>?currentpage=<?php echo $totalpages ?>"><i
            class="far fa-angle-right"></i></a></li>
<?php
} // end if
/****** end build pagination links ******/




}
            
            ?>



                    <!-- 
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">...</li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-right"></i></a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </section>
</main>
<?php 
    include 'includes/footer.php'
?>