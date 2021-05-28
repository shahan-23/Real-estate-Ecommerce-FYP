<?php 
    include 'includes/header.php';

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    if(isset($_POST["fav"]) AND isset($_SESSION["SellerUserid"]) ){
        $sqlQuery = "SELECT * FROM fav WHERE user_id='".$_SESSION["SellerUserid"]."' AND pid = '".$_GET["property"]."' ";
             $isUserExist = $data->getData($sqlQuery);	
			if($isUserExist == NULL) {
                $sqlQuery = "INSERT INTO fav (user_id, pid) 
                VALUES ('".$_SESSION["SellerUserid"]."', '".$_GET["property"]."')";
                   $data->setData($sqlQuery);	
			}
      
      }

      if(isset($_POST["fav"]) AND isset($_SESSION["BuyerUserid"]) ){
        $sqlQuery = "SELECT * FROM fav WHERE user_id='".$_SESSION["BuyerUserid"]."' AND pid = '".$_GET["property"]."' ";
              $isUserExist = $data->getData($sqlQuery);	
              if($isUserExist == NULL) {
                $sqlQuery = "INSERT INTO fav (user_id, pid) 
                VALUES ('".$_SESSION["BuyerUserid"]."', '".$_GET["property"]."')";
                   $data->setData($sqlQuery);	
			}
      
      }

      if(isset($_SESSION['adminUserid'])){
        $list = $data->getData("SELECT * FROM listing WHERE id = '".$_GET['property']."' LIMIT 1");
      } else {
        $list = $data->getData("SELECT * FROM listing WHERE id = '".$_GET['property']."' AND status = 'Approved' LIMIT 1");
      }


    if($list != NULL) {
    foreach ($list as $row) 
?>
    <main id="content">
    
        <section class="pb-7 shadow-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb py-3">
                        <li class="breadcrumb-item fs-12 letter-spacing-087">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item fs-12 letter-spacing-087">
                            <a href="listing.php">Listing</a>
                        </li>
                        <li class="breadcrumb-item fs-12 letter-spacing-087 active"><?php echo $row['name'] ?></li>
                    </ol>
                </nav>
                <div class="d-md-flex justify-content-md-between mb-1">
                    <ul class="list-inline d-sm-flex align-items-sm-center mb-0">
                        <li class="list-inline-item badge badge-primary mr-3">For <?php echo $row['type'] ?></li>
                        <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>
                        <?php echo time_elapsed_string($row['date']); ?>
                        </li>
                    </ul>

                </div>
                <div class="d-md-flex justify-content-md-between mb-6">
                    <div>
                        <h2 class="fs-35 font-weight-600 lh-15 text-heading"><?php echo $row['name'] ?></h2>
                        <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i><?php echo $row['location'] ?></p>

                    </div>
                    <div class="mt-2 text-md-right">
                        <p class="fs-22 text-heading font-weight-bold mb-0">BDT <?php echo $row['price'] ?></p>
                        <form action="" method="post">
                                      <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                                         <button type="submit" name="fav" style="border: none; background: none; padding: 0;" class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="Mark as favorite"><i class="fas fa-heart"></i></button>
                                    </form>
                                </li>
                    </div>
                </div>
                <div class="galleries position-relative">
                    <div class="tab-content p-0 shadow-none">
                        <div class="tab-pane fade show active">
                            <div class="slick-slider dots-white arrow-inner">
                                <div class="box">
                                    <div class="item item-size-3-2">
                                        <div class="card p-0">
                                            <a href="propertyPhotos/<?php echo $row['image'] ?>" class="card-img"
                                                style="background-image:url('propertyPhotos/<?php echo $row['image'] ?>')">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="primary-content bg-gray-01 pt-7 pb-12">
            <div class="container">
                <div class="row">
                    <article class="col-lg-8">
                        <section class="pb-8 px-6 pt-5 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-2">Description</h4>
                            <p class="mb-0 lh-214"><?php echo $row['description'] ?></p>
                        </section>
                        <section class="mt-2 pb-6 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Location</h4>
                            <style>
                                iframe{
                                    width: 100%;
                                }
                            </style>
                            <?php
                            $map_link = htmlspecialchars_decode($row['map_link']);
                             echo $map_link ?>
                        </section>
      
                    </article>
                    <?php    $user = $data->getData("SELECT * FROM users WHERE id = '".$row['user_id']."' LIMIT 1");
                              foreach ($user as $row) {?>
                    <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 py-4 text-center">
                                    <a href="#"
                                        class="fs-16 lh-214 text-dark mb-0 font-weight-500 hover-primary"> <?php echo $row['name'] ?></a>
                                    <p class="mb-0"> <?php echo $row['type'] ?></p>
                                    <a href="mailto:<?php echo $row['email'] ?>"
                                        class="text-body"><?php echo $row['email'] ?></a> <br>
                                        <a href="tel:<?php echo $row['phone'] ?>"
                                        class="text-body"><?php echo $row['phone'] ?></a>
                                      
                              
                                   <?php
                                    if(isset($_SESSION['BuyerUserid'])){
                                        ?>
                                    <form action="inbox.php" method="GET">
                                        <input type="hidden" name="chat" value="<?php echo $row['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none">Chat</button>
                                     </form>
                                        <?php
                                    } elseif(isset($_SESSION['SellerUserid'])){
                                        ?>
                                        <a class="btn btn-primary btn-lg btn-block shadow-none" data-toggle="modal" href="#login-register-modal">Login as a Buyer</a>
                                        <?php 
                                    } else {
                                        ?>
                                        <a class="btn btn-primary btn-lg btn-block shadow-none" data-toggle="modal" href="#login-register-modal">Chat</a>
                                        <?php 
                                    }
                                    ?>
                                      <!-- <form action="inbox.php" method="GET">
                                        <input type="hidden" name="chat" value="<?php echo $row['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none">Chat</button>
                                     </form> -->
                                </div>
                            </div>
                       
             
                        </div>
                    </aside>

                    <?php  }?>
                </div>
            </div>
        </div>
        
    </main>
    <?php 
    }
    include 'includes/footer.php';
?>