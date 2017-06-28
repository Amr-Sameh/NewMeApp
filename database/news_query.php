<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/21/2017
 * Time: 2:58 AM
 */
include_once '../database/database.php' ;

class news_query
{
    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }

    public function GetNewById($id){
        $query="SELECT * FROM `news` WHERE `id`='$id'";
        return $this->db->excute_query($query)->fetch();

    }

    public function getallnews(){
        $query="SELECT * FROM `news` ORDER BY `id` DESC";
        return $this->db->excute_query($query)->fetchAll();
    }
    public function getrecentthree(){
        $query="SELECT * FROM `news`  ORDER BY `id` DESC  LIMIT 3 ";
        return $this->db->excute_query($query)->fetchAll();
    }

public function GetLikesById($id){
    $query="SELECT `user_id` FROM `likes` WHERE `news_id`='$id'";
    return $this->db->excute_query($query)->fetchAll();
}
public function GetCommentsById($id){
    $query="SELECT * FROM `comments` WHERE `news_id`='$id'";
    return $this->db->excute_query($query)->fetchAll();
}
    public function like ($user_id,$id){
    $query="INSERT INTO `likes` (`user_id`, `news_id`) VALUES ('$user_id', '$id')";
        $this->db->excute_query($query);
    }
    public function dislike ($user_id,$id){
        $query="DELETE FROM `likes` WHERE `user_id`=$user_id AND `news_id`='$id'";
        $this->db->excute_query($query);
    }
    public function deletecomment($comment_id){
        $query="DELETE FROM `comments` WHERE `id`=$comment_id ";
        $this->db->excute_query($query);
    }

    public function editcomment($comment_id,$content){
        $query="UPDATE `comments` SET `content`='$content' WHERE `id`='$comment_id'";
        $this->db->excute_query($query);
    }
    public function addcomment($news_id,$content,$user_id,$name){
        date_default_timezone_set('Asia/Kuwait');
        $date=date('Y-m-d');
        $query="INSERT INTO `comments`( `news_id`, `user_id`, `name`, `date`, `content`) VALUES ('$news_id','$user_id','$name','$date','$content')";
        $this->db->excute_query($query);
    }
    public function addnews($title,$content,$name,$image){
        date_default_timezone_set('Asia/Kuwait');
        $date=date('Y-m-d');


        $query="INSERT INTO `news`( `contain_image`,`title`,`content`,`date`,`writer`) VALUES ('$image','$title','$content','$date','$name')";
        $this->db->excute_query($query);
        $query="SELECT `id` FROM `news` ORDER BY `id` DESC LIMIT 1";
       return $this->db->excute_query($query)->fetch()[0];

    }
    public function updateimage($image){
        $id=substr($image,0,strpos($image,"."));
        $link='upload/'.$image;
        $query="UPDATE `news` SET `image_url`='$link' WHERE `id`='$id'";
        $this->db->excute_query($query);
    }

public function deletenews($id){
    $query="DELETE FROM `news`  WHERE `id`='$id'";
    $this->db->excute_query($query);
}

    public function editnews($title,$content,$image,$id){

    $contain_image=true;
        $link='upload/'.$image;
    if ($image==null){
        $contain_image=false;
        $query="UPDATE `news` SET `title`='$title',`content`='$content',`id`='$id' WHERE `id`='$id'";
    }
    else{
        $query="UPDATE `news` SET `contain_image`='$contain_image',`image_url`='$link',`title`='$title',`content`='$content',`id`='$id' WHERE `id`='$id'";

    }

        $this->db->excute_query($query);
    }






}