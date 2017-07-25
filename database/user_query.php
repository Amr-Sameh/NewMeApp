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
        $query="SELECT * FROM `users` WHERE `user_name`= :name AND `pass`= :pass LIMIT 1";
        $count= $this->db->excute_query($query,array('name'=>$user,'pass'=>$pass))->rowCount();
        if ($count==0){
            return false;
        }
        else{
            return $this->db->excute_query($query,array('name'=>$user,'pass'=>$pass))->fetch();
        }
    }

    public function getusername($id){
        $query="SELECT `name` FROM `users` WHERE `id`= :id  LIMIT 1";
        return $this->db->excute_query($query,array('id'=>$id))->fetch();

    }
    public function rej($user,$name,$pass,$phone,$email,$gender){
        $query="INSERT INTO `users`(`user_name`, `name`, `pass`, `phone`, `email`, `gender`, `user_type`) VALUES (:user,:name,:pass,:phone,:mail,:gender,'1')";
         $this->db->excute_query($query,array('user'=>$user,'name'=>$name,'pass'=>$pass,'phone'=>$phone,'mail'=>$email,'gender'=>$gender));
    }
    public function checkusername($uswername){
        $query="SELECT * FROM `users` WHERE `user_name`= :user";
       $count= $this->db->excute_query($query,array('user'=>$uswername))->rowCount();
       if ($count>0){
           return false;
       }
       return true;
    }


}