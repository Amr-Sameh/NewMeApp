<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/18/2017
 * Time: 11:10 PM
 */
include_once "../database/news_query.php";

class news
{
    private $news_query;
    private $contain_image;
    private $contain_video;
    private $image_url;
    private $video_url;
    private $title;
    private $content;
    private $date;
    private  $default_image="http://static1.squarespace.com/static/55df7cb6e4b0ce4422bb2a5f/t/5664d384e4b078c56b57b7b9/1449448326336/2eaf03_10e686a1b2b146218710ee3e6d7c37be.gif_srz_980_317_85_22_0.50_1.20_0.00_gif_srz.gif?format=1500w";
    private $id;
    private $writer;



    public  function __construct()
    {
        $this->news_query = new news_query();
    }




    public function GetNewById($id){

        $data= $this->news_query->GetNewById($id);
        $result = new news();
        $result->setDate($data['date']);
        $result->setContent($data['content']);
        $result->setTitle($data['title']);
        $result->setContainImage($data['contain_image']);
        $result->setContainVideo($data['contain_video']);
        $result->setImageUrl($data['image_url']);
        $result->setVideoUrl($data['video_url']);
        $result->setWriter($data['writer']);
        return $result;
    }

    public function GetAllNews(){

        $datalist= $this->news_query->getallnews();
        $news=array();
        foreach ($datalist as $data) {
            $result = new news();
            $result->setDate($data['date']);
            $result->setContent($data['content']);
            $result->setTitle($data['title']);
            $result->setContainImage($data['contain_image']);
            $result->setContainVideo($data['contain_video']);
            $result->setImageUrl($data['image_url']);
            $result->setVideoUrl($data['video_url']);
            $result->setWriter($data['writer']);
            $result->setId($data['id']);
            array_push($news,$result);
        }
        return $news;
    }
public function getrecentthree(){
    $datalist= $this->news_query->getrecentthree();
    $news=array();
    foreach ($datalist as $data) {
        $result = new news();
        $result->setDate($data['date']);
        $result->setContent($data['content']);
        $result->setTitle($data['title']);
        $result->setContainImage($data['contain_image']);
        $result->setContainVideo($data['contain_video']);
        $result->setImageUrl($data['image_url']);
        $result->setVideoUrl($data['video_url']);
        $result->setWriter($data['writer']);
        $result->setId($data['id']);
        array_push($news,$result);
    }
    return $news;
}

    public function addnews($title,$content,$name,$image)
    {
        return  $this->news_query->addnews($title,$content,$name,$image);

    }
    public function updateimage($image){
        $this->news_query-> updateimage($image);
    }

    public function deletenews($id){

        $this->news_query-> deletenews($id);
    }
    public function editnews($title,$content,$image,$id)
    {
        $this->news_query->editnews($title,$content,$image,$id);
    }

        public function GetLikesById($id)
    {
      return  $this->news_query->GetLikesById($id);
    }

    public function GetCommentsById($id)
    {
        return  $this->news_query->GetCommentsById($id);

    }

    public function like ($user_id,$id){
        $this->news_query->like($user_id,$id);
    }
    public function dislike ($user_id,$id){
        $this->news_query->dislike($user_id,$id);
    }



    public function deletecomment($comment_id)
    {
        $this->news_query->deletecomment($comment_id);
    }


    public function editcomment($comment_id,$content)
    {
        $this->news_query->editcomment($comment_id,$content);
    }
    public function addcomment($news_id,$content,$user_id,$user_name)
    {
        $this->news_query->addcomment($news_id,$content,$user_id,$user_name);
    }






















        /**
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * @param mixed $writer
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDefaultImage()
    {
        return $this->default_image;
    }

    /**
     * @return mixed
     */
    public function getContainImage()
    {
        return $this->contain_image;
    }

    /**
     * @param mixed $contain_image
     */
    public function setContainImage($contain_image)
    {
        $this->contain_image = $contain_image;
    }

    /**
     * @return mixed
     */
    public function getContainVideo()
    {
        return $this->contain_video;
    }

    /**
     * @param mixed $contain_video
     */
    public function setContainVideo($contain_video)
    {
        $this->contain_video = $contain_video;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
    }

    /**
     * @return mixed
     */
    public function getVideoUrl()
    {
        return $this->video_url;
    }

    /**
     * @param mixed $video_url
     */
    public function setVideoUrl($video_url)
    {
        $this->video_url = $video_url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }





}