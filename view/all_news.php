<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/19/2017
 * Time: 9:10 PM
 */
$page_title="News";

include "static/header.php";
include "../classes/news.php";
?>
    <section class="mobile-wrapper text-wrap">
        <?php include "nav.php";?>
        <div style="height: 70px"></div>
        <div class="all-news-page col-xs-12">
        <div class="all-news col-xs-12">

<?php

$new =new news();


$news=$new->GetAllNews();
$news_num=count($news);
foreach ($news as $new) {
    ?>
<a href="new_page.php?id=<?php echo $new->getId();?>" id="">
<div class="single-new col-xs-12 ">
    <div class="single-new-img col-xs-4">
        <img src="<?php if($new->getContainImage()){ echo $new->getImageUrl();}else{echo $new->getDefaultImage();} ?>" class="img-responsive ">
    </div>
    <div class="single-new-title col-xs-8 ">
        <h3 class="text-capitalize"><?php echo substr($new->getTitle(),0,10)."...";?></h3>
    </div>
    <div class="single-new-content col-xs-8 ">
        <p><?php echo substr($new->getContent(),0,50). " ..." ?></p>
    </div>

</div>
</a>

    <hr class="news-separator col-xs-8 col-xs-offset-2">





                         <?php }













?>
</div>
        </div>
    </section>
    <?php

include "static/footer.php";
