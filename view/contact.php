<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/27/2017
 * Time: 10:49 AM
 */
include "static/header.php";

?>
<section class="mobile-wrapper text-wrap">
    <?php include "nav.php";?>
    <div style="height: 70px"></div>




    <div class="contact-body">

        <h3 class="message-header col-xs-12 text-center" >Amr Sameh</h3>

            <textarea class="col-xs-12 input-lg" id="new-msg-content"></textarea>
        <button class="btn-primary btn-lg send-msg" style="float: right;margin-top: 8px;margin-bottom: 8px" >Send</button>
 <div class="messages-section" id="<?php echo $_GET['id']?>"></div>
        <div class="message-container col-xs-12" id="message-container">

        </div>
    </div>















</section>

<?php
include "static/footer.php";