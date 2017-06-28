<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/20/2017
 * Time: 1:24 AM
 */
$page_title="News";
include "static/header.php";
include "../classes/news.php";

if (isset($_GET['id'])){
    $id=$_GET['id'];
}
else{
    header('location:inde.php');
}

$new=new news();
$new = $new->GetNewById($id);
if($new->getTitle()==null && $new->getContent()==null&&!$new->getContainImage()){
    header('location:inde.php');

}
session_start();


?>
<section class="mobile-wrapper text-wrap">
    <?php include "nav.php";?>
    <div style="height: 70px"></div>

    <div class="news-page col-xs-12" id="<?php echo $id;?>" >


        <div class="news-img col-xs-12">
            <?php
            if($new->getContainImage()){
                $image= $new->getImageUrl();
            }
            else{
                $image = $new->getDefaultImage();
            }

            ?>
            <img src="<?php echo $image?>" class="img-responsive ">
        </div>




        <div class="news-body col-xs-12">


            <article class="uk-article">

                <h3 class="uk-article-title"><?php echo $new->getTitle();?></h3>

                <p class="uk-article-meta">Written by <a ><?php echo $new->getWriter();?></a> on <?php echo $new->getDate()?> </p>
<hr>
                <p class="uk-text-lead"><?php echo $new->getContent()?></p>


                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                    <div id="likes">
                    </div>
                    <div>
                        <a class="uk-button uk-button-text" ><span id="comments"></span> Commente  &nbsp; <i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                    </div>
                </div>

            </article>









            <hr>

            <span class="comment-header col-xs-6" >Comments :</span>



<section class="comment-section"id="comment-section">










</section>



            <!-- Edit Comment Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit</h4>
                        </div>
                        <div class="modal-body">
                           <textarea id="edit-fild" class="input-lg " style="width: 100%;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submit-comment-change" data-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>





<?php if (isset($_SESSION['id'])){?>
            <!-- Add Comment  -->
<hr class="col-xs-8 col-xs-offset-2">
            <textarea class="input-lg  " id="new-comment-content" style="width: 100%;"></textarea>
            <button class="btn-lg btn-primary add-new-comment">Add Comment</button>


<?php }?>







        </div>




































    </div>























</section>

<?php
include "static/footer.php";