<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/27/2017
 * Time: 10:49 AM
 */
session_start();
$page_title="Contact";
include "static/header.php";
if (isset($_SESSION['id'])) {
    if (isset($_GET['id'])) {
        if ($_SESSION['user_type'] != 0) {
            header('location:index.php');
        }
    }
    if ($_SESSION['user_type'] == 0) {
        if (!isset($_GET['id'])) {
             header('location:index.php');
        }

    }
}

?>
<section class="mobile-wrapper text-wrap">
    <?php include "nav.php";?>
    <div style="height: 70px"></div>

    <?php
    if (!isset($_SESSION['id'])){
        header('location:login.php');
    }
    ?>


    <div class="contact-body">
        <?php
        if ($_SESSION['user_type']==0) {
            include "../classes/user.php";
            $user = new user();
            $name = $user->msgname($_GET['id']);
            ?>
            <h3 class="message-header col-xs-12 text-center"><?php echo $name[0];?></h3>

            <textarea class="col-xs-12 input-lg" id="new-msg-content"></textarea>
            <button class="btn-primary btn-lg send-msg" style="float: right;margin-top: 8px;margin-bottom: 8px">Send
            </button>
            <div class="messages-section" id="<?php echo $_GET['id'] ?>"></div>
            <div class="message-container col-xs-12" id="message-container">

            </div>
            <?php
        }
        else {

            ?>

            <h3 class="message-header col-xs-12 text-center">Contact Us</h3>

            <textarea class="col-xs-12 input-lg" id="new-msg-content"></textarea>
            <button class="btn-primary btn-lg usend-msg" style="float: right;margin-top: 8px;margin-bottom: 8px">Send
            </button>
            <div class="umessages-section" ></div>
            <div class="message-container col-xs-12" id="message-container">

            </div>

            <?php
        }
            ?>
    </div>















</section>

<?php
include "static/footer.php";