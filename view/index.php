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
$new->setContent("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?
");
$new1->setContainImage(true);
$new1->setTitle("second");
$new1->setImageUrl("https://www.w3schools.com/css/trolltunga.jpg");
$new2->setContainImage(True);
$new2->setTitle("third");
$new2->setImageUrl("data:image/jpeg;base64,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");

$news=array($new,$new1,$new2);
$recent_news_num=count($news);

?>
<!--
 # Recent News Slider
 -->
<section class="mobile-wrapper">
<div id="carousel-example-generic" class="carousel slide recentNews " data-ride="carousel">
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














</section>

<?php
include "static/footer.php";