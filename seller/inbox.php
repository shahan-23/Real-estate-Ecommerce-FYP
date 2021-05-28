<?php 
    include 'includes/header.php';


if(isset($_GET['chat'])){

    $read_status = $data->getNumRows("SELECT * FROM chat WHERE sender_id = '".$_GET["chat"]."' AND receiver_id = '".$_SESSION["BuyerUserid"]."' AND status = 'unread'");
    if($read_status != NULL){
        $data->setData("UPDATE chat SET status = 'read' WHERE sender_id = '".$_GET["chat"]."' AND receiver_id = '".$_SESSION["BuyerUserid"]."'");
    }
}



    
if(isset($_POST["Send"])){
            
            $sqlQuery = "INSERT INTO chat (sender_id, receiver_id, chat) 
             VALUES ('".$_SESSION["BuyerUserid"]."', '".$_GET["chat"]."', '".$_POST["chat"]."')";
            $data->setData($sqlQuery);	

  }

if(isset($_GET['chat'])){
    $chat = $data->getData("SELECT * FROM chat WHERE (sender_id = '".$_SESSION["BuyerUserid"]."' AND receiver_id = '".$_GET["chat"]."') OR (receiver_id = '".$_SESSION["BuyerUserid"]."' AND sender_id = '".$_GET["chat"]."') ORDER BY datetime ASC");  
} else {
    $chat = ''; 
}

    $chatings = $data->getData("SELECT * FROM chat WHERE sender_id = '".$_SESSION["BuyerUserid"]."' OR receiver_id = '".$_SESSION["BuyerUserid"]."' ORDER BY datetime DESC");
        foreach($chatings as $chatings){
            foreach($data->getData("SELECT * FROM users") as $users){
                // print_r($users);
                    if(($users['id'] == $chatings['sender_id']) OR ($users['id'] == $chatings['receiver_id'])){
                        // $chatwithusers[] = $users['id'];
                        $chatwithusers[] = $users;
                        // array_push($users, $users);

                    }
            }
        }

        $chatwithusers = array_unique($chatwithusers, SORT_REGULAR); // Array is now (1, 2, 3)
        // $chatwithusers = array_diff($chatwithusers , $_SESSION["BuyerUserid"]);



?>
<style>
.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media .avatar {
    flex-shrink: 0
}

.avatar {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border-radius: 100%;
    background-color: #f5f6f7;
    color: #8b95a5;
    text-transform: uppercase
}

.media-chat .media-body {
    -webkit-box-flex: initial;
    flex: initial;
    display: table
}

.media-body {
    min-width: 0
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color: #9b9b9b
}

.media>* {
    margin: 0 8px
}

.media-chat .media-body p.meta {
    background-color: transparent !important;
    padding: 0;
    opacity: .8
}

.media-meta-day {
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-bottom: 0;
    color: #8b95a5;
    opacity: .8;
    font-weight: 400
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-meta-day::before {
    margin-right: 16px
}

.media-meta-day::before,
.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    margin-left: 16px
}

.media-chat.media-chat-reverse {
    padding-right: 12px;
    padding-left: 64px;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: reverse;
    flex-direction: row-reverse
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-chat.media-chat-reverse .media-body p {
    float: right;
    clear: right;
    background-color: #48b0f7;
    color: #fff
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px
}

.border-light {
    border-color: #f1f2f3 !important
}

.bt-1 {
    border-top: 1px solid #ebebeb !important
}

.publisher {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 12px 20px;
    background-color: #f9fafb
}

.publisher>*:first-child {
    margin-left: 0
}

.publisher>* {
    margin: 0 8px
}

.publisher-input {
    -webkit-box-flex: 1;
    flex-grow: 1;
    border: none;
    outline: none !important;
    background-color: transparent
}

button,
input,
optgroup,
select,
textarea {
    font-family: Roboto, sans-serif;
    font-weight: 300
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #8b95a5;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group {
    position: relative;
    overflow: hidden
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #cac7c7;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group input[type="file"] {
    position: absolute;
    opacity: 0;
    z-index: -1;
    width: 20px
}

.text-info {
    color: #48b0f7 !important
}

.chat-users {
    background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}

.scroll {
    max-height:550px !important;
    overflow-y: auto !important;
    }
.scroll-chat {
    height:550px !important;
    overflow-y: auto !important;

    }
.right{
    position: absolute;
    right: 2rem;
}

    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 


}
</style>
<main id="content">
    <section class="pb-8 page-title shadow">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                </ol>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Chat with Sellers</h1>
            </nav>
        </div>
    </section>
    <section class="pt-8 pb-11 bg-gray-01">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xxl-4 mb-6">

<div class="table-responsive ">
    <table id="example1" class="table table-hover bg-white border rounded-lg scroll">

        <tbody>
        <?php
           
         foreach ($chatwithusers as $row) {    
            if($row['id'] != $_SESSION["BuyerUserid"]){

                $status = $data->getNumRows("SELECT * FROM chat WHERE sender_id = '".$row['id']."' AND receiver_id = '".$_SESSION["BuyerUserid"]."' AND status = 'unread'");    

                ?>
            <tr class="shadow-hover-xs-2 bg-hover-white">
                <td class="align-middle pt-6 pb-4 px-6">
                    <h5 class="fs-16 mb-0 lh-18">
                    <form action="" method="get">
                        <input type="hidden" name="chat" value="<?php echo $row['id'] ?>">
                    <input type="submit" class=" <?php if($_GET['chat'] == $row['id']) echo 'text-primary';?> chat-users" value="<?php echo $row['name'] ?>">
                    <?php
                        if($status != NULL){
                    ?>
                    <span class="right badge badge-danger"><?php echo $status; ?></span>
                    <?php } ?>

                    </form>

                    </h5>
                </td>
            </tr>
                <?php

            } } ?>



        </tbody>
    </table>
</div>

</div>
                <div class="col-sm-6 col-xxl-8 mb-6">
                <div class="card card-bordered">

                <?php if($chat != ''){ ?>

                    <div class="ps-container ps-theme-default ps-active-y scroll-chat" id="chat-content">
                        <?php

                         foreach ($chat as $row) {
                        ?>

        
                        <div class="media media-chat <?php if($row['sender_id'] == $_SESSION["BuyerUserid"]){ echo 'media-chat-reverse';} ?>">
                            <div class="media-body ">
                                <p><?php echo $row['chat'] ?></p>
                                <p class="meta"><time><?php echo $row['datetime'] ?></time></p>
                            </div>
                        </div>

                        <?php
                      }  ?>

                    </div>

                    <form action="" method="post">
                        <div class="publisher bt-1 border-light">
                            <input class="publisher-input" type="text" name="chat" placeholder="Write something">
                            <button class="publisher-btn text-info" type="submit" name="Send"><i class="fa fa-paper-plane"></i></button>

                        </div>
                    </form>

                    <?php }?>

                </div>
            </div>

            </div>
        </div>
    </section>
</main>
<?php 
    include 'includes/footer.php'
?>