<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/27/2017
 * Time: 10:55 PM
 */
include_once "../database/message_query.php";
class message
{
private $message_query;
    public  function __construct()
    {
        $this->message_query = new message_query();
    }

    public function getmessage($from,$to)
    {
        return $this->message_query->getmessage($from,$to);
    }


    public function sendmessage($from, $to, $content)
    {
        $this->message_query->sendmessage($from, $to, $content);
    }


    public function getsendusers(){
       return $this->message_query->getsendusers();

    }



    public function GetLastMessageAdminAndUser($id){
        return $this->message_query->GetLastMessageAdminAndUser($id);
    }

    }