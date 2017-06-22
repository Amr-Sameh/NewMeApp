<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/21/2017
 * Time: 1:17 AM
 */
if($_SERVER['REQUEST_METHOD']=='POST'){

if (isset($_POST['action'])){

session_start();


  /*===================
   * news page        =
   * ==================
   */
    if ($_POST['action'] == 'GetNewsDetail' && isset($_POST['id'])) {
include "../classes/news.php";
        $new=new news();
        $id=$_POST['id'];
        $user_like_news=$new->GetLikesById($id);
        $likes_num=count($user_like_news);
        $comment_table=$new->GetCommentsById($id);
        $comments_num=count($comment_table);




        $like_section='';
        if (!isset($_SESSION['id'])){
            $like_section='  <a class="uk-button uk-button-text"  ><span >'.$likes_num.'</span> Like &nbsp; <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>    </a>';
        }

        else if(!checklike($user_like_news,$_SESSION['id'])){
            $like_section='  <a class="uk-button uk-button-text" id="like" ><span >'.$likes_num.'</span> Like &nbsp; <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>    </a>';

        }

        else{
            $like_section=' <a class="uk-button uk-button-text " id="dislike"style="color: #0f6ecd" ><span >'.$likes_num.'</span> Liked &nbsp; <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>    </a>';

        }



        $comments_section=$like_section.'^&*'.$comments_num.'^&*';
foreach ($comment_table as $value) {

    $comments_section .= '  <div class="well well-lg comment col-xs-12 text-wrap" id="comment'.$value['id'].'" >';
    $comments_section .= '  <h3 class="text-left " style="font-size: 16px;padding-bottom: 0;margin-bottom: 0">' . $value['name'] . '</h3>';
    $comments_section .= '  <span class="comment-date">' . $value['date'] . '</span>';
    $comments_section .= '<p id="content'.$value['id'].'"> ' . $value['content'] . '</p>';


    if(isset($_SESSION['id'])&&$value['user_id']==$_SESSION['id'] ||(isset($_SESSION['user_type']) &&$_SESSION['user_type']==0 )){
        $comments_section .=  '<span class="delete-comment"  id="delete'.$value['id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i> delete</span>&nbsp;
      | &nbsp;&nbsp;
      <span class="edit-comment" id="edit'.$value['id'].'" name="'.$value['content'].'" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i> edit</span>';
    }
    $comments_section .= '</div>';

}
      echo $comments_section;
      exit();
    }


    else if ($_POST['action'] == 'Like' && isset($_POST['id'])) {
        include "../classes/news.php";
        $new = new news();
        $id = $_POST['id'];
        $new->like($_SESSION['id'],$id);
        echo "ok";
    exit();
    }

    else if ($_POST['action'] == 'Dislike' && isset($_POST['id'])) {
        include "../classes/news.php";
        $new = new news();
        $id = $_POST['id'];
        $new->dislike($_SESSION['id'],$id);
        echo "ok";
        exit();
    }



    else if ($_POST['action'] == 'DeleteComment' && isset($_POST['comment_id'])) {
        include "../classes/news.php";
        $new = new news();
        $id = $_POST['comment_id'];
        $new->deletecomment($id);
        echo "ok";
        exit();
    }


    else if ($_POST['action'] == 'EditComment' && isset($_POST['comment_id'])) {
        include "../classes/news.php";
        $new = new news();
        $id = $_POST['comment_id'];
        $new->editcomment($id,$_POST['content']);
        echo "ok";
        exit();
    }


    else if ($_POST['action'] == 'AddComment' &&isset($_SESSION['id'])) {
        include "../classes/news.php";
        $new = new news();
        $id =$_SESSION['id'];
        $name=$_SESSION['name'];
        $new->addcomment($_POST['news_id'],$_POST['content'],$id,$name);
        echo "ok";
        exit();
    }











































}}


function checklike($user_likes,$id){
    $flag= false;
    foreach ($user_likes as $like){
        if ($like[0]==$id){
            $flag=true;
        }
    }
    return $flag;
}