<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/22/2017
 * Time: 11:10 PM
 */
session_start();
include "static/header.php";
include "../classes/news.php";
include "../classes/message.php";
if (!isset($_SESSION['user_type']) ||$_SESSION['user_type']!=0 ){
    header('location:index.php');
}


#################################################################
if(isset($_POST['btn-AddNewNews'])){
    $content=$_POST['content'];
    $title=$_POST['title'];
    $new = new news();
    $image=false;
if(is_uploaded_file($_FILES['image']['tmp_name'])){
    $image=true;
}
    $id=$new->addnews($title,$content,$_SESSION['name'],$image);
    if(is_uploaded_file($_FILES['image']['tmp_name'])){


        $image_ex=substr($_FILES["image"]["name"], strrpos($_FILES["image"]["name"], ".") + 1);

        $uploadfile=$_FILES["image"]["tmp_name"];
        $folder="upload/";
        move_uploaded_file($_FILES["image"]["tmp_name"], $folder.$id.'.'.$image_ex);
        $new->updateimage($id.'.'.$image_ex);
    }

 if(is_uploaded_file($_FILES['cov_image']['tmp_name'])){


     $image_ex=substr($_FILES["cov_image"]["name"], strrpos($_FILES["cov_image"]["name"], ".") + 1);

     $uploadfile=$_FILES["cov_image"]["tmp_name"];
     $folder="upload/";
     move_uploaded_file($_FILES["cov_image"]["tmp_name"], $folder.$id.'_cov.'.$image_ex);
     $new->updatecoverimage($id.'_cov.'.$image_ex);
 }

}

else if(isset($_POST['btn-EditNews'])){
    $new= new news();
    $content=$_POST['content'];
    $title=$_POST['title'];
    $id= $_POST['id'];
    $new = new news();
    $image=null;
    $cover=null;
    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $image_ex=substr($_FILES["image"]["name"], strrpos($_FILES["image"]["name"], ".") + 1);

        $uploadfile=$_FILES["image"]["tmp_name"];
        $folder="upload/";
        move_uploaded_file($_FILES["image"]["tmp_name"], $folder.$id.'.'.$image_ex);
        $image=$id.'.'.$image_ex;
    }
    if(is_uploaded_file($_FILES['cov_image']['tmp_name'])){
        $image_ex=substr($_FILES["cov_image"]["name"], strrpos($_FILES["cov_image"]["name"], ".") + 1);

        $uploadfile=$_FILES["cov_image"]["tmp_name"];
        $folder="upload/";
        move_uploaded_file($_FILES["cov_image"]["tmp_name"], $folder.$id.'_cov.'.$image_ex);
        $cover=$id.'_cov.'.$image_ex;
    }
   $new->editnews($title,$content,$image,$id,$cover);


}

else if(isset($_POST['btn-AddFaq'])){
    $db = new database();
    $qustion=$_POST['question'];
    $answer=$_POST['answer'];
    $query="INSERT INTO `faq`(`qustion`, `answer`) VALUES ('$qustion','$answer')";
    $db->excute_query($query);

    header('location:panel.php?action=ViewFaq');
}
else if(isset($_POST['btn-EditFaq'])){
    $db = new database();
    $qustion=$_POST['question'];
    $answer=$_POST['answer'];
    $id=$_POST['id'];
    $query="UPDATE `faq` SET `qustion`='$qustion',`answer`='$answer' WHERE `id`='$id'";
    $db->excute_query($query);

    header('location:panel.php?action=ViewFaq');
}
















##################################################################
else if(!isset($_GET['action'])){

    $_GET['action']="";
}

else if($_GET['action']=="delete"){

    if(!isset($_GET['id'])){
        header('location:'.$_SERVER['HTTP_REFERER']);

    }
    $new = new news();
$new->deletenews($_GET['id']);
header('location:'.$_SERVER['HTTP_REFERER']);
}

else if($_GET['action']=="DeleteFaq"){
    if(!isset($_GET['id'])){
        header('location:'.$_SERVER['HTTP_REFERER']);

    }
    $db=new database();
    $id=$_GET['id'];
    $query="DELETE FROM `faq` WHERE `id`='$id'";
    $db->excute_query($query);
    header('location:'.$_SERVER['HTTP_REFERER']);

}












$page_title="Admin";
?>

<section class="mobile-wrapper text-wrap">
    <?php include "nav.php";?>
    <div style="height: 70px"></div>









    <?php

#####################################
########      News Part     #########
#####################################
   if ($_GET['action']=="AddNews"){
?>


<div class="add-news text-center">


<h3 class="add-news-header col-xs-6 col-xs-offset-3">Add News</h3>
    <form method="POST" enctype="multipart/form-data">
    <input type="text" autocomplete="off" name="title" class="add-news-title text-center col-xs-8 col-xs-offset-2 input-lg" placeholder="Title">

    <textarea autocomplete="off"  rows="20" name="content"placeholder="Content" class="text-center text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px"></textarea>


        <div  class="upload-part col-lg-12 " >

            <div class="fileUpload btn btn-primary col-lg-6 col-lg-offset-3  col-xs-8 col-xs-offset-2" style="margin-bottom: 30px" >
                <span>Add Image <i class="fa fa-camera" aria-hidden="true"></i></span>
                <input   type="file" id="image" name="image" class=" image   input-lg input-lg col-lg-7 col-lg-offset-7 upload col-xs-8" accept="image/*"  >

            </div>
            <span id="filename" class="text-center text-danger col-xs-12" style="font-weight: bolder" ></span>

        </div>
        <div  class="upload-part col-lg-12 " >

            <div class="fileUpload btn btn-primary col-lg-6 col-lg-offset-3  col-xs-8 col-xs-offset-2" style="margin-bottom: 30px" >
                <span>Add Cover Image <i class="fa fa-camera" aria-hidden="true"></i></span>
                <input   type="file" id="cov_image" name="cov_image" class=" image   input-lg input-lg col-lg-7 col-lg-offset-7 upload col-xs-8" accept="image/*"  >

            </div>
            <span id="filename" class="text-center text-danger col-xs-12" style="font-weight: bolder" ></span>

        </div>
        <img src=""id="cover_show"  class="col-xs-12" style="display: block">
     <hr class="col-xs-offset-2 col-xs-8" >

        <button name="btn-AddNewNews" type="submit" class="btn-lg btn-primary">Add News <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </button>

    </form>

</div>




<?php }?>
<!---------------------------------------------------------------------------------->


<?php

    ?>
<?php

############################
###### Admin View News #####
############################
 if ($_GET['action']=="ViewNews") {    ?>


    <div class="all-news col-xs-12">
        <br>
        <br>
        <a href="panel.php?action=AddNews"  class="btn-lg btn-primary">Add News <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </a>
        <br>
        <br>
        <br>
        <?php

        $new = new news();


        $news = $new->GetAllNews();
        $news_num = count($news);
        foreach ($news as $new) {
            ?>
            <a href="new_page.php?id=<?php echo $new->getId(); ?>" id="">
                <div class="single-new col-xs-12 ">
                    <div class="single-new-img col-xs-4">
                        <img src="<?php if ($new->getContainImage()) {
                            echo $new->getCoverImageUrl();
                        } else {
                            echo $new->getDefaultImage();
                        } ?>" class="img-responsive ">
                    </div>
                    <div class="single-new-title col-xs-8 ">
                        <h3 class="text-capitalize"><?php echo substr($new->getTitle(), 0, 10) . "..."; ?></h3>
                    </div>
                    <div class="single-new-content col-xs-8 ">
                        <p><?php echo substr($new->getContent(), 0, 50) . " ..." ?></p>
                    </div>

                </div>
            </a>


            <div class="col-xs-12 text-center" style="margin-bottom: 8px;">
                <a class="delete-news" href="<?php echo "panel.php?action=delete&id=" . $new->getID(); ?>"><i
                        class="fa fa-trash-o" aria-hidden="true"></i> delete</a>&nbsp;
                | &nbsp;&nbsp;
                <a class="edit-news" href="<?php echo "panel.php?action=EditNews&id=" . $new->getID(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a>
            </div>


            <hr class="news-separator col-xs-8 col-xs-offset-2">


        <?php }


        ?>
    </div>


    <?php
}
###########################################################################
?>




<?php
########################
##### Edit News  #######
########################
  if ($_GET['action']=="EditNews"){
      if (!isset($_GET['id'])){
          header('location:panel.php?action=ViewNews');
      }
    $id=$_GET['id'];
    $new = new  news();
    $new = $new->GetNewById($id);
?>



    <div class="add-news text-center">


        <h3 class="add-news-header col-xs-6 col-xs-offset-3">Edit News</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" autocomplete="off" name="title" class="add-news-title text-center col-xs-8 col-xs-offset-2 input-lg" placeholder="Title" value="<?php echo $new->getTitle();?>">

            <textarea autocomplete="off"  rows="20" name="content"placeholder="Content" class=" text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px">
                <?php  echo $new->getContent();?>
            </textarea>


            <div class="news-img col-xs-12">
                <?php
                if($new->getContainImage()){
                    $image= $new->getImageUrl();
                    echo '  <img src="'.$image.'" class="img-responsive ">';
                }
                else{
                   echo "<h3 class='col-xs-12 text-danger text-center'>No Image </h3>";
                }

                ?>

            </div>
            <div  class="upload-part col-lg-12 " >

                <div class="fileUpload btn btn-primary col-lg-6 col-lg-offset-3  col-xs-8 col-xs-offset-2" style="margin-bottom: 30px" >
                    <span>Change Image <i class="fa fa-camera" aria-hidden="true"></i></span>
                    <input   type="file" id="image" name="image" class=" image   input-lg input-lg col-lg-7 col-lg-offset-7 upload col-xs-8" accept="image/*"  >

                </div>
                <span id="filename" class="text-center text-danger col-xs-12" style="font-weight: bolder" ></span>
            </div>



            <div class="news-img col-xs-12">
                <?php
                if($new->getContainImage()){
                    $image= $new->getCoverImageUrl();
                    echo '  <img src="'.$image.'" class="img-responsive ">';
                }
                else{
                    echo "<h3 class='col-xs-12 text-danger text-center'>No Image </h3>";
                }

                ?>

            </div>

            <div  class="upload-part col-lg-12 " >

                <div class="fileUpload btn btn-primary col-lg-6 col-lg-offset-3  col-xs-8 col-xs-offset-2" style="margin-bottom: 30px" >
                    <span>Change CovImage <i class="fa fa-camera" aria-hidden="true"></i></span>
                    <input   type="file" id="cov_image" name="cov_image" class=" image   input-lg input-lg col-lg-7 col-lg-offset-7 upload col-xs-8" accept="image/*"  >

                </div>
                <span id="filename" class="text-center text-danger col-xs-12" style="font-weight: bolder" ></span>
            </div>
            <hr class="col-xs-offset-2 col-xs-8" >
            <input value="<?php echo $id;?>" hidden name="id">
            <button name="btn-EditNews" type="submit" class="btn-lg btn-primary">Edit News <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>

            </button>

        </form>

    </div>







    <?php
    }
#######################################################################################




########################
#####  View Faq   ######
########################
if ($_GET['action']=="ViewFaq") {
    $db=new database();
    $query="SELECT * FROM `faq`";
    $data =$db->excute_query($query)->fetchAll();
    ?>

<br>
    <a href="panel.php?action=AddFaq"  class="btn-lg btn-primary">Add FAQ <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<br>
    <br>
    <?php foreach ($data as $faq){?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $faq['qustion']?></h3>
            </div>
            <div class="panel-body">
                <?php echo $faq['answer']?>        </div>
        </div>

        <div class="col-xs-12 text-center" style="margin-bottom: 8px;">
            <a class="delete-news" href="<?php echo "panel.php?action=DeleteFaq&id=" .$faq['id']; ?>"><i
                        class="fa fa-trash-o" aria-hidden="true"></i> delete</a>&nbsp;
            | &nbsp;&nbsp;
            <a class="edit-news" href="<?php echo "panel.php?action=EditFaq&id=" .$faq['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a>
        </div>
        <br>
        <br>
        <?php
    }
    ?>






    <?php
}
################################################################################################
    ?>




<?php
######################
#####  Add Faq  ######
######################
if ($_GET['action']=="AddFaq") {


?>
    <h3 class="add-news-header col-xs-6 col-xs-offset-3">ADD FAQ</h3>

<form method="post">

    <textarea autocomplete="off"  rows="10" name="question" placeholder="question" class="text-center text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px"></textarea>
    <textarea autocomplete="off"  rows="20" name="answer" placeholder="answer" class="text-center text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px"></textarea>
    <button name="btn-AddFaq" type="submit" class="btn-lg btn-primary col-xs-6 col-xs-offset-3">Add FAQ <i class="fa fa-plus-circle" aria-hidden="true"></i>


</form>





<?php
}
#######################################################################333
?>







    <?php
    ######################
    #####  Edit Faq  ######
    ######################
    if ($_GET['action']=="EditFaq") {
$db = new database();
$id=$_GET['id'];
$query="SELECT * FROM `faq` WHERE `id`='$id' LIMIT 1";
$data=$db->excute_query($query)->fetch();

        ?>
        <h3 class="add-news-header col-xs-6 col-xs-offset-3">Edit FAQ</h3>

        <form method="post">

            <textarea autocomplete="off"  rows="10" name="question" placeholder="question" class="text-center text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px"><?php echo $data['qustion']; ?></textarea>
            <textarea autocomplete="off"  rows="20" name="answer" placeholder="answer" class="text-center text-warning input-lg col-xs-offset-2 col-xs-8" style="margin-top: 15px;margin-bottom: 15px"><?php echo $data['answer']; ?></textarea>
<input name="id" value="<?php echo $data['id']; ?>" hidden>
            <button name="btn-EditFaq" type="submit" class="btn-lg btn-primary col-xs-6 col-xs-offset-3">Edit FAQ <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>


        </form>





        <?php
    }
    ##########################################################################


##################
### Contact us ###
##################
          if ($_GET['action']=="ContactUs") {
              ?>

<div class="col-xs-12 last-msg-contenier" id="last-msg-contenier" >


</div>

















              <?php
          }
?>

































    <?php

##########################
######  Main Panel  ######
##########################
if ($_GET['action']=="") {
    ?>
<div class="text-center">
    <div  class="home-icon col-xs-4"> <a href="panel.php?action=ViewNews" class="col-xs-12">
            <br>
            <span class="icon-content"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                Manage News</span>
        </a></div>
    <div  class="home-icon col-xs-4"> <a href="panel.php?action=ViewFaq" class="col-xs-12">
            <br>
            <span class="icon-content"> <i class="fa fa-question-circle" aria-hidden="true"></i>
                Manage FAQ</span>
        </a></div>
    <div  class="home-icon col-xs-4"> <a href="panel.php?action=ContactUs" class="col-xs-12">
            <br>
            <span class="icon-content"> <i class="fa fa-question-circle" aria-hidden="true"></i>
                Contact Us</span>
        </a></div>



</div>
    <?php
}
#######################################################################################
?>

































</section>


<?php

include "static/footer.php";
?>
<script>

        $('#image').change(function () {
            var name = document.getElementById('image').value;
            $('#filename').html(name.substr(12, name.length));

        });
        $('#cov_image').change(function (event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#cover_show").attr('src',tmppath);

        });
        $(document).ready(function () {

            $('#cover_show').Jcrop();

        });

</script>
