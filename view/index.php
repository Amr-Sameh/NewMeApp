<?php
include "static/header.php";
include "../classes/news.php";
?>
</head>
<body>


<?php
$new =new news();
$new1 =new news();
$new2 =new news();
$new->setContainImage(True);
$new->setTitle("first");
$new->setImageUrl("https://www.w3schools.com/css/trolltunga.jpg");
$new1->setContainImage(true);
$new1->setTitle("second");
$new1->setImageUrl("https://www.w3schools.com/css/trolltunga.jpg");
$new2->setContainImage(True);
$new2->setTitle("third");
$new2->setImageUrl("https://www.w3schools.com/css/trolltunga.jpg");

$news=array($new,$new1,$new2);
$recent_news_num=count($news);

?>
<!--
 # Recent News Slider
 -->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
                <?php
                # the defult if no news yet
                if ($recent_news_num==0) {
                    ?>

                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                    <?php
                }
                    else {

                        echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                        for ( $i=1;$i<$recent_news_num;$i++)
                            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" ></li>';

                    }


                    ?>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
                 <?php
                        # the defult if no news yet
                        if ($recent_news_num==0) {
                            ?>

                            <div class="item active">
                                <img src="http://static1.squarespace.com/static/55df7cb6e4b0ce4422bb2a5f/t/5664d384e4b078c56b57b7b9/1449448326336/2eaf03_10e686a1b2b146218710ee3e6d7c37be.gif_srz_980_317_85_22_0.50_1.20_0.00_gif_srz.gif?format=1500w" alt="...">
                                <div class="carousel-caption">
                                   <h2>No News Yet</h2>
                                </div>
                            </div>

                            <?php
                        }
                            else {
                            $new=array_shift($news);
                            ?>
                                <div class="item active">
                                    <?php
                                    if (!$new->getContainImage()) {
                                        ?>
                                        <img src="<?php echo $new->getDefaultImage();?>" alt="...">
                                        <?php
                                    }

                                    else{
                                        ?>
                                        <img src="<?php echo $new->getImageUrl();?>" alt="...">
                                    <?php }?>
                                    <div class="carousel-caption">
                                        <h2><?php echo $new->getTitle();?></h2>
                                    </div>
                                </div>
                            <?php
                            foreach ($news as $new){

                                ?>

                                <div class="item ">
                                    <?php
                                    if (!$new->getContainImage()) {
                                        ?>
                                        <img src="<?php echo $new->getDefaultImage();?>" alt="...">
                                        <?php
                                    }

                                    else{
                                    ?>
                                        <img src="<?php echo $new->getImageUrl();?>" alt="...">
                                        <?php }?>
                                    <div class="carousel-caption">
                                       <h2><?php echo $new->getTitle();?></h2>
                                    </div>
                                </div>
                                <?php




                            }

                            }
                            ?>










    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!--End Of Recent News Slider-->




<?php
include "static/footer.php";