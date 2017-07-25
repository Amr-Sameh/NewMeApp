<?php
include "static/header.php";
include "../classes/news.php";
?>



<?php
session_start();
$new =new news();
$news=$new->GetAllNews();
$recent_news_num=count($news);
?>
<!--
 # Recent News Slider
 -->
<section class="mobile-wrapper text-wrap">
    <?php include "nav.php";?>
    <div style="height: 70px"></div>
<div id="carousel-example-generic" class="carousel slide recentNews " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
                <?php
                # the defult if no news yet
                if ($recent_news_num==0) {
                    ?>


                    <?php
                }
                    else {


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
                                   <h2 style="background-color: rgba(0,0,0,0.31);color: #eee">No News Yet</h2>
                                </div>
                            </div>

                            <?php
                        }
                            else {
                            $new=array_shift($news);
                            ?>

                                <div class="item active">
                                    <a href="new_page.php?id=<?php echo $new->getId();?>">
                                    <?php
                                    if (!$new->getContainImage()) {
                                        ?>
                                        <img src="<?php echo $new->getDefaultImage();?>" alt="...">
                                        <?php
                                    }

                                    else{
                                        ?>
                                        <img src="<?php echo $new->getCoverImageUrl();?>" alt="...">
                                    <?php }?>
                                    <div class="carousel-caption">
                                        <h2 style="background-color: rgba(0,0,0,0.31);color: #eee"><?php echo substr($new->getTitle(),0,23)."...";?></h2>
                                    </div>
                                    </a>
                                </div>

                            <?php
                            foreach ($news as $new){

                                ?>

                                <div class="item ">
                                    <a href="new_page.php?id=<?php echo $new->getId();?>">
                                    <?php
                                    if (!$new->getContainImage()) {
                                        ?>
                                        <img src="<?php echo $new->getDefaultImage();?>" alt="...">
                                        <?php
                                    }

                                    else{
                                    ?>
                                        <img src="<?php echo $new->getCoverImageUrl();?>" alt="...">
                                        <?php }?>
                                    <div class="carousel-caption">
                                        <br>
                                       <h2 style="background-color: rgba(0,0,0,0.31);color: #eee"><?php echo substr($new->getTitle(),0,23)."...";?></h2>
                                    </div>
                                    </a>
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


<div class="home-body col-xs-12 text-center">
    <div class="home-icon col-xs-4"> <a href="all_news.php" class="col-xs-12" >
          <img src="news.png">
        </a></div>
    <?php if (isset($_SESSION['user_type'])&&$_SESSION['user_type']==0) { ?>
    <div  class="home-icon col-xs-4"> <a href="panel.php" class="col-xs-12">
            <br>
            <span class="icon-content"> <i class="fa fa-cogs" aria-hidden="true"></i>
                Admin</span>
        </a></div>

    <?php }
     if (!isset($_SESSION['id'])){ ?>
    <div  class="home-icon col-xs-4"> <a href="login.php" class="col-xs-12">
           <img src="login.png">
        </a></div>
    <?php  } else { ?>
    <div  class="home-icon col-xs-4"> <a href="logout.php" class="col-xs-12"  >
            <br>
            <span class="icon-content"><i class="fa fa-sign-out" aria-hidden="true"></i>
                Logout</span>
        </a></div>
        <?php } ?>
    <div  class="home-icon col-xs-4"> <a href="faq.php" class="col-xs-12">
           <img src="faq.png">
        </a></div>


    <div  class="home-icon col-xs-4"> <a href="contact.php" class="col-xs-12">
           <img src="contact.png">
        </a></div>



    <div  class="home-icon col-xs-4"> <a href="about.php" class="col-xs-12">
           <img src="about.png">
        </a></div>


    <div  class="home-icon col-xs-4"> <a href="signup.php" class="col-xs-12">
           <img src="newme.png">
        </a></div>






</div>




    <div id="loading">

    <div class="scene">
        <svg
                version="1.1"
                id="dc-spinner"
                xmlns="http://www.w3.org/2000/svg"
                x="0px" y="0px"
                width:"38"
        height:"38"
        viewBox="0 0 38 38"
        preserveAspectRatio="xMinYMin meet"
        >
        <text x="14" y="21" font-family="Monaco" font-size="2px" style="letter-spacing:0.6" fill="white">LOADING
            <animate
                    attributeName="opacity"
                    values="0;1;0" dur="1.8s"
                    repeatCount="indefinite"/>
        </text>
        <path fill="#373a42" d="M20,35c-8.271,0-15-6.729-15-15S11.729,5,20,5s15,6.729,15,15S28.271,35,20,35z M20,5.203
    C11.841,5.203,5.203,11.841,5.203,20c0,8.159,6.638,14.797,14.797,14.797S34.797,28.159,34.797,20
    C34.797,11.841,28.159,5.203,20,5.203z">
        </path>

        <path fill="#373a42" d="M20,33.125c-7.237,0-13.125-5.888-13.125-13.125S12.763,6.875,20,6.875S33.125,12.763,33.125,20
    S27.237,33.125,20,33.125z M20,7.078C12.875,7.078,7.078,12.875,7.078,20c0,7.125,5.797,12.922,12.922,12.922
    S32.922,27.125,32.922,20C32.922,12.875,27.125,7.078,20,7.078z">
        </path>

        <path fill="#2AA198" stroke="#2AA198" stroke-width="0.6027" stroke-miterlimit="10" d="M5.203,20
			c0-8.159,6.638-14.797,14.797-14.797V5C11.729,5,5,11.729,5,20s6.729,15,15,15v-0.203C11.841,34.797,5.203,28.159,5.203,20z">
            <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 20 20"
                    to="360 20 20"
                    calcMode="spline"
                    keySplines="0.4, 0, 0.2, 1"
                    keyTimes="0;1"
                    dur="2s"
                    repeatCount="indefinite" />
        </path>

        <path fill="#859900" stroke="#859900" stroke-width="0.2027" stroke-miterlimit="10" d="M7.078,20
  c0-7.125,5.797-12.922,12.922-12.922V6.875C12.763,6.875,6.875,12.763,6.875,20S12.763,33.125,20,33.125v-0.203
  C12.875,32.922,7.078,27.125,7.078,20z">
            <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 20 20"
                    to="360 20 20"
                    dur="1.8s"
                    repeatCount="indefinite" />
        </path>
        </svg>
    </div>



</div>


</section>

<?php
include "static/footer.php";
?>
<script language="javascript" type="text/javascript">

      window.onload=setTimeout(removeLoader, 3000); //wait for page load PLUS two seconds.

    function removeLoader(){
        document.getElementById("loading").style.display = "none";
        };
</script>
