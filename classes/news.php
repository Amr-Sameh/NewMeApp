<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/18/2017
 * Time: 11:10 PM
 */
class news
{
    private $contain_image;
    private $contain_video;
    private $image_url;
    private $video_url;
    private $title;
    private $content;
    private $date;
    private  $default_image="http://static1.squarespace.com/static/55df7cb6e4b0ce4422bb2a5f/t/5664d384e4b078c56b57b7b9/1449448326336/2eaf03_10e686a1b2b146218710ee3e6d7c37be.gif_srz_980_317_85_22_0.50_1.20_0.00_gif_srz.gif?format=1500w";

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