<?php 
    include 'includes/header.php';

    $sale = $data->getData("SELECT * FROM listing WHERE type = 'SALE' AND status = 'Approved' ORDER BY id DESC");
    $rent = $data->getData("SELECT * FROM listing WHERE type = 'RENT' AND status = 'Approved' ORDER BY id DESC");

    if(isset($_POST["fav"]) AND isset($_SESSION["SellerUserid"]) ){
        $sqlQuery = "SELECT * FROM fav WHERE user_id='".$_SESSION["SellerUserid"]."' AND pid = '".$_POST["pid"]."' ";
             $isUserExist = $data->getData($sqlQuery);	
			if($isUserExist == NULL) {
                $sqlQuery = "INSERT INTO fav (user_id, pid) 
                VALUES ('".$_SESSION["SellerUserid"]."', '".$_POST["pid"]."')";
                   $data->setData($sqlQuery);	
			}
      
      }

      if(isset($_POST["fav"]) AND isset($_SESSION["BuyerUserid"]) ){
        $sqlQuery = "SELECT * FROM fav WHERE user_id='".$_SESSION["BuyerUserid"]."' AND pid = '".$_POST["pid"]."' ";
              $isUserExist = $data->getData($sqlQuery);	
              if($isUserExist == NULL) {
                $sqlQuery = "INSERT INTO fav (user_id, pid) 
                VALUES ('".$_SESSION["BuyerUserid"]."', '".$_POST["pid"]."')";
                   $data->setData($sqlQuery);	
			}
      
      }

      if(isset($_POST["fav"]) AND isset($_SESSION["adminUserid"]) ){
        $sqlQuery = "SELECT * FROM fav WHERE user_id='".$_SESSION["adminUserid"]."' AND pid = '".$_POST["pid"]."' ";
              $isUserExist = $data->getData($sqlQuery);	
              if($isUserExist == NULL) {
                $sqlQuery = "INSERT INTO fav (user_id, pid) 
                VALUES ('".$_SESSION["adminUserid"]."', '".$_POST["pid"]."')";
                   $data->setData($sqlQuery);	
			}
      
      }


?>

<style>
    /*search box css start here*/
    .search-sec {
        padding: 2rem;
    }

    .search-slt {
        display: block;
        width: 100%;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius: 0;
    }

    .wrn-btn {
        width: 100%;
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        height: calc(3rem + 4px) !important;
        border-radius: 0;
    }

    @media (min-width: 992px) {
        .search-sec {
            position: relative;
            top: -114px;
            background: rgba(26, 70, 104, 0.51);
        }
    }

    @media (max-width: 992px) {
        .search-sec {
            background: #1A4668;
        }

    }
</style>
<main id="content">
    <section>
        <div class="slick-slider mx-0 custom-arrow-center"
            data-slick-options='{"slidesToShow": 1, "autoplay":true, "infinite": true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":1,"arrows":false,"dots":false}},{"breakpoint": 992,"settings": {"slidesToShow":1,"arrows":false,"dots":false}},{"breakpoint": 768,"settings": {"slidesToShow": 1,"arrows":false,"dots":false}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":false}}]}'>

            <div class="box px-0 d-flex flex-column">
                <div class="bg-cover d-flex align-items-center custom-vh-02"
                    style="background-image: url('images/bg-slider-01.jpg')">
                </div>
            </div>
            <div class="box px-0 d-flex flex-column">
                <div class="bg-cover d-flex align-items-center custom-vh-02"
                    style="background-image: url('images/bg-slider-02.jpg')">
                </div>
            </div>
            <div class="box px-0 d-flex flex-column">
                <div class="bg-cover d-flex align-items-center custom-vh-02"
                    style="background-image: url('images/bg-slider-03.jpg')">
                </div>
            </div>
        </div>
    </section>
    <section class="search-sec">
        <div class="container">
        <form action="search.php" method="get">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-9">
                                <div class="position-relative w-100">

                                    <input type="text" class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 rounded-right-md-0 pr-8 bg-white placeholder-muted"
                                        placeholder="Enter city or location" name="search">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <input type="submit" class="btn btn-primary fs-16 font-weight-600 rounded-left-md-0 rounded-lg wrn-btn" value="Search"> 
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- <div class="container">
        <div class="row py-8" data-animate="zoomIn">
            <div class="col-lg-12 col-md-6 d-md-block">

                <div class="mxw-1000 position-relative z-index-2">
                    <form action="search.php" method="get">

                        <div class="d-flex">
                            <div class="position-relative w-100">

                                <input type="text"
                                    class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 rounded-right-md-0 pr-8 bg-white placeholder-muted"
                                    placeholder="Enter city or location" name="search">
                            </div>

                            <button type="submit"
                                class="btn btn-primary fs-16 font-weight-600 rounded-left-md-0 rounded-lg">
                                Search
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div> -->
    <!-- <section class="d-flex flex-column">
        <div style="background-image: url('images/bg-home.jpg')"
            class="bg-cover d-flex align-items-center custom-vh-50 py-lg-17 py-11 bg-cover">
            <div class="container mt-lg-9 col-md-7">

                <div class="mxw-1000 position-relative z-index-2">
                <form action="search.php" method="get">
                    
                    <div class="d-flex">
                        <div class="position-relative w-100">

                            <input type="text"
                                class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 rounded-right-md-0 pr-8 bg-white placeholder-muted"
                                placeholder="Enter city or location" name="search">
                        </div>

                        <button type="submit"
                            class="btn btn-primary fs-16 font-weight-600 rounded-left-md-0 rounded-lg">
                            Search
                        </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section> -->

    <section class="pt-lg-12 pb-lg-10 py-11">
        <div class="container container-xxl">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-heading">Some latest Properties For Sale</h2>
                    <span class="heading-divider"></span>
                    <p class="mb-6">Click 'See all properties' to see more</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="listing.php" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See
                        all properties
                        <i class="far fa-long-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>


                <?php foreach($sale as $row) {?>

                <div class="box pb-7 pt-2">
                    <div class="card shadow-hover-2">
                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                            <img src="propertyPhotos/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                        </div>
                        <div class="card-body pt-3">
                            <h2 class="card-title fs-16 lh-2 mb-0">
                                <form action="property.php" method="GET">
                                    <input type="hidden" name="property" value="<?php echo $row['id'] ?>">
                                    <button type="submit" style="border: none; background: none; padding: 0;"
                                        class="text-dark hover-primary"><?php echo $row['name'] ?></button>
                                </form>
                            </h2>



                            <p class="card-text font-weight-500 text-gray-light mb-2">
                                <?php
                               $dis = $row['description'];
                            echo substr($dis,0,100);
                            ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                            <p class="fs-17 font-weight-bold text-heading mb-0">BDT <?php echo $row['price'] ?></p>
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item">
                                    <form action="" method="post">
                                        <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                                        <button type="submit" name="fav"
                                            style="border: none; background: none; padding: 0;"
                                            class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                            data-toggle="tooltip" title="Mark as favorite"><i
                                                class="fas fa-heart"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <?php }?>



            </div>


        </div>
    </section>


    <section class="pt-lg-12 pb-lg-10 py-11">
        <div class="container container-xxl">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-heading">Some latest Properties For Rent</h2>
                    <span class="heading-divider"></span>
                    <p class="mb-6">Click 'See all properties' to see more</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="listing.php" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See
                        all properties
                        <i class="far fa-long-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>

                <?php foreach($rent as $row) {?>

                <div class="box pb-7 pt-2">
                    <div class="card shadow-hover-2">
                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                            <img src="propertyPhotos/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                        </div>
                        <div class="card-body pt-3">
                            <h2 class="card-title fs-16 lh-2 mb-0">
                                <form action="property.php" method="GET">
                                    <input type="hidden" name="property" value="<?php echo $row['id'] ?>">
                                    <button type="submit" style="border: none; background: none; padding: 0;"
                                        class="text-dark hover-primary"><?php echo $row['name'] ?></button>
                                </form>
                            </h2>



                            <p class="card-text font-weight-500 text-gray-light mb-2">
                                <?php
                               $dis = $row['description'];
                            echo substr($dis,0,100);
                            ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                            <p class="fs-17 font-weight-bold text-heading mb-0">BDT <?php echo $row['price'] ?></p>
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item">
                                    <form action="" method="post">
                                        <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                                        <button type="submit" name="fav"
                                            style="border: none; background: none; padding: 0;"
                                            class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                            data-toggle="tooltip" title="Mark as favorite"><i
                                                class="fas fa-heart"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>



            </div>
        </div>
    </section>

    <section id="about" class="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
        <div class="container container-xxl">
            <h2 class="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
                About Us</h2>
            <span class="heading-divider mx-auto"></span>

        </div>
    </section>
    <section class="bg-accent bg-patten-04 pb-13">
        <div class="container">
            <div class="card border-0 mt-n13 z-index-3 mb-12">
                <div class="card-body p-6 px-lg-14 py-lg-13">
                    <p class="letter-spacing-263 text-uppercase text-primary mb-6 font-weight-500 text-center">
                        Roof Site
                    </p>
                    <h2 class="text-heading mb-4 fs-22 fs-md-16 text-center lh-16 px-6">Welcome to our website. Here, we
                        bring the customers and the sellers together in one platform to do real-estate business. Our
                        platform is based on the mother company, "Banani Property Development LTD".

                    </h2>
                    <p class="text-center px-lg-11 fs-15 lh-17 mb-11">
                        <strong>Office</strong> <br>
                        Golden Plaza, (3rd Floor) <br>
                        Plot No. 34, Road No. 46 <br>
                        Gulshan Circle-2 <br>
                        Dhaka-1212. <br>
                    </p>
                </div>
            </div>
            <h2 id="services" class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Our services</h2>
            <p class="mxw-751 text-center mb-1 px-8">This website is targeted for the people of Bangladesh. Our goal is
                to to bring the buyers and sellers come to a common online platform. This platform is an e-commerce site
                for buying, selling or renting land properties, apartments or houses.</p>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="#" class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="https://img.icons8.com/fluent/48/000000/google-maps-new.png" />
                            </div>
                            <div class="card-body px-0 pt-2 pb-0 text-center">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Find Budget Friendly Houses
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="#" class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="https://img.icons8.com/color/48/000000/staff-skin-type-7.png" />
                            </div>
                            <div class="card-body px-0 pt-2 pb-0 text-center">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">We Have Agents With
                                    Experience</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="#" class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="https://img.icons8.com/nolan/48/building.png" />
                            </div>
                            <div class="card-body px-0 pt-2 text-center pb-0">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Buy Or Rent Sales Properties
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="#" class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="https://img.icons8.com/officel/48 /000000/home.png" />
                            </div>
                            <div class="card-body px-0 pt-2 text-center pb-0">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Find New Homes On The Go
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-8">
                <div class="col-md-4 mb-6 mb-lg-0">
                    <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                        <div class="card-img-top d-flex align-items-end justify-content-center">
                            <span class="text-primary fs-90 lh-1"><img
                                    src="https://img.icons8.com/cute-clipart/64/000000/easy.png" />
                            </span>
                        </div>
                        <div class="card-body px-0 pt-6 pb-0 text-center">
                            <h4 class="card-title fs-18 lh-17 text-dark mb-2">Convenience</h4>
                            <p class="card-text px-2">
                                Our goal is to build a convenient and easy to use e-commerce site so that the people of
                                Bangladesh can easily access and use it without any complexity.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-6 mb-lg-0">
                    <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                        <div class="card-img-top d-flex align-items-end justify-content-center">
                            <span class="text-primary fs-90 lh-1">
                                <img src="https://img.icons8.com/cute-clipart/64/000000/ok-hand.png" />
                            </span>
                        </div>
                        <div class="card-body px-0 pt-6 pb-0 text-center">
                            <h4 class="card-title fs-18 lh-17 text-dark mb-2">Hand-pick</h4>
                            <p class="card-text px-2">
                                People can browse and search for their desired houses. While searching they can sort
                                according to location, price range, apartment arrangement, property type etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-6 mb-lg-0">
                    <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                        <div class="card-img-top d-flex align-items-end justify-content-center">
                            <span class="text-primary fs-90 lh-1">
                                <img src="https://img.icons8.com/cute-clipart/64/000000/cyber-security.png" />
                            </span>
                        </div>
                        <div class="card-body px-0 pt-6 text-center pb-0">
                            <h4 class="card-title fs-18 lh-17 text-dark mb-2">Security</h4>
                            <p class="card-text px-2">
                                Sellers and buyers need to provide their Voter ID number during registration for user
                                authentication. Thus providing a secured marketplace for both buyers and sellers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="bg-accent bg-patten-04 pb-13 mt-10">
        <div class="container">
            <div class="card border-0 mt-n13 z-index-3 pb-8 pt-10">
                <div class="card-body p-0">
                    <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16">We're always eager to hear from
                        you!</h2>
                    <form class="mxw-751 px-md-5">
                        <div class="form-group">
                            <input type="text" placeholder="First Name" class="form-control form-control-lg border-0"
                                name="first-name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input placeholder="Your Email" class="form-control form-control-lg border-0"
                                        type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Phone" name="phone"
                                        class="form-control form-control-lg border-0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-6">
                            <textarea class="form-control border-0" placeholder="Message" name="message"
                                rows="5"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary px-9">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


    <section class="bg-accent pb-13">

        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                    <div class="card bg-transparent border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">

                        <div class="card-body px-0 pt-2 pb-0 text-center">
                            <h4 class="card-title fs-16 lh-186 text-dark hover-primary">COMMUNICATION</h4>
                        </div>
                        <div class="card-body px-0 pt-3 pb-0">
                            <p class="card-text mb-0">
                                For General Queries, Including Property Sales and Rents, Please Email Us At:
                            </p>

                            <a href="mailto:bananiproperty-bd@gmail.com"
                                class="d-block text-body hover-primary text-decoration-none">bananiproperty-bd@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                    <div class="card bg-transparent border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">

                        <div class="card-body px-0 pt-2 pb-0 text-center">
                            <h4 class="card-title fs-16 lh-186 text-dark hover-primary">TECHNICAL SUPPORT</h4>
                        </div>
                        <div class="card-body px-0 pt-3 pb-0">
                            <p class="card-text mb-0">
                                We Are Ready To Help! If You Have Any Queries Or Issues, Contact Us For Support:
                            </p>
                            <a href="tel:+88 0288 33406"
                                class="d-block text-heading lh-2 hover-primary text-decoration-none">+88 0288 33406</a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                    <div class="card bg-transparent border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">

                        <div class="card-body px-0 pt-2 pb-0 text-center">
                            <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Office visit</h4>
                        </div>
                        <div class="card-body px-0 pt-3 pb-0">
                            <p class="card-text mb-0">
                                For Any Assistance And Dealings, Please Visit Our Office At:
                            </p>

                            <div class="d-block text-body hover-primary text-decoration-none">Golden Plaza, (3rd
                                Floor)Plot No. 34, Road No. 46, Gulshan Circle-2, Dhaka-1212.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- <div id="compare" class="compare">
            <button
                class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
            </button>
            <div class="list-group list-group-no-border bg-dark py-3">
                <a href="#" class="list-group-item bg-transparent text-white fs-22 text-center py-0">
                    <i class="far fa-bars"></i>
                </a>
                <div class="list-group-item card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay">
                        <img src="images\compare-01.jpg" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay">
                        <img src="images\compare-02.jpg" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay ">
                        <img src="images\compare-03.jpg" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item bg-transparent">
                    <a href="compare-details.html"
                        class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
                        Compare
                    </a>
                </div>
            </div>
        </div> -->
</main>
<?php 
 include 'includes/footer.php'
?>