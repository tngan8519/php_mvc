<?php
class DB{
    public $con;
    protected $servername=DB_HOST;
    protected $username=DB_USER;
    protected $password=DB_PASS;
    protected $dbname=DB_NAME;

    function __construct(){
        //connect database
        $this->con = mysqli_connect($this->servername,$this->username,$this->password);
        //select database
        mysqli_select_db($this->con,$this->dbname);
    }
}