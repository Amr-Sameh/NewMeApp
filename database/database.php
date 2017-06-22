<?php

/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/21/2017
 * Time: 2:55 AM
 */
class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "cia";
    private $database_connection;
    private $dsn = 'mysql:host=localhost;dbname=newmeapp';
    private  static  $instance;
    private $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    public function __construct()
    {
        try {
            $this->database_connection = new PDO($this->dsn, $this->username, $this->password, $this->option);
            $this->database_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die('failed to connect to DataBase' . $e->getMessage());
        }
    }
    public  static function  get_instrance(){
        if(!self::$instance){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function excute_query($query){
        $value=$this->database_connection->prepare($query);
        $value->execute();
        return $value;
    }
}