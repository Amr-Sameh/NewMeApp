<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/24/2017
 * Time: 5:25 AM
 */
include_once "../database/user_query.php";
class user
{
    private $user_query;
    private $id;
    private $user_name;
    private $name;
    private $pass;
    private $user_type;

    public function __construct()
    {
        $this->user_query= new user_query();
    }


    public function login($user,$pass){
       $data= $this->user_query->login($user,$pass);
       if ($data == false){
           return $data;
       }
       else{
           $user =new user();
           $user->setId($data['id']);
           $user->setName($data['name']);
           $user->setPass($data['pass']);
           $user->setUserName($data['user_name']);
           $user->setUserType($data['user_type']);
           return $user;
       }
    }


    public function msgname($id){
      return  $this->user_query->getusername($id);
    }
    public function rej($user,$name,$pass,$phone,$email,$gender){
        $this->user_query->rej($user,$name,$pass,$phone,$email,$gender);
    }

    public function checkusername($uswername){
      return  $this->user_query->checkusername($uswername);
    }
























    ########################################################################################################################

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }


    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
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
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }


}