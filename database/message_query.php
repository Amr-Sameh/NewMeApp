<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/27/2017
 * Time: 10:55 PM
 */
include_once '../database/database.php' ;

class message_query
{
    private $db;

    public function __construct()
    {
        $this->db = new database();
    }

    public function getmessage($from, $to)
    {
        $query = "SELECT * FROM `messages` WHERE (`sender`='$from' AND `receiver`='$to') OR (`sender`='$to' AND `receiver`='$from')ORDER BY `date` DESC";
        return $this->db->excute_query($query)->fetchAll();
    }


    public function sendmessage($from, $to, $content)
    {

        date_default_timezone_set('Asia/Kuwait');
        $date = date('Y-m-d h:i:s');
        $content = str_replace("'","''",$content);
        $query = "INSERT INTO `messages`( `sender`, `receiver`, `date`, `content`, `seen`) VALUES ('$from','$to','$date','$content','0')";
        $this->db->excute_query($query);

    }


}