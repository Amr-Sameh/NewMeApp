<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/21/2017
 * Time: 3:09 AM
 */
include "../classes/news.php";
$n = new news();
print_r($n->GetLikesById(2));