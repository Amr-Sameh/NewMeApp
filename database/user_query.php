<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/24/2017
 * Time: 5:28 AM
 */
include_once '../database/database.php' ;

class user_query
{
    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }
    public function login($user,$pass){
        $query="SELECT * FROM `users` WHERE `user_name`='$user'AND `pass`='$pass' LIMIT 1";
        $count= $this->db->excute_query($query)->rowCount();
        if ($count==0){
            return false;
        }
        else{
            return $this->db->excute_query($query)->fetch();
        }
    }


}