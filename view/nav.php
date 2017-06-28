<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/22/2017
 * Time: 4:51 AM
 */
if (!isset($page_title))
{$page_title='home';}
if(!isset($_SERVER['HTTP_REFERER'])){
    $_SERVER['HTTP_REFERER']=$_SERVER['PHP_SELF'];
}
?>
<nav class=" text-center col-xs-12 nav-bar " style="font-size: 30px;padding: 0">
 <?php if ($page_title!="home" ){?>
  <a <?php echo  "href=javascript:history.go(-1)";?>>  <span class="col-xs-3 " style="cursor: pointer;"><i class="fa fa-arrow-left" aria-hidden="true"></i>
</span></a>
    <?php } else{ ?>
    <span class="col-xs-3"></span>
    <?php }?>
<span class="col-xs-6 page-title" style="font-weight: bold"><?php echo $page_title;?></span>
   <a href="inde.php"> <span class="col-xs-3 home" style="cursor: pointer;"><i class="fa fa-home"></i> </span>
   </a>
</nav>
