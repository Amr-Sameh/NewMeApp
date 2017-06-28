<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/21/2017
 * Time: 3:09 AM
 */
//include "../classes/message.php";
include "static/header.php";
//$n =new message_query();
session_start();
print_r($_SESSION);
echo '<br>';
//print_r($n->login("admin","admin"));
//print_r($n->getmessage(1,2));
date_default_timezone_set('Asia/Kuwait');
$date=date('Y-m-d h:i:s');
echo "<br>".$date;
?>












<button class="btn-lg" onclick="getmessages()"> a</button>


<?php
include "static/footer.php";