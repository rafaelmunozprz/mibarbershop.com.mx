<?php

namespace App\Config;

class Config
{

    private $DB_Connect;
    private $CONNECTION;
    var $keyCaptcha_public = "";
    var $keyCaptcha_private = "";
    private $SYS_NAME;

    function __construct()
    {
        $this->DB_Connect = array(
            'host' => 'localhost',
            'database' => 'mibarbershop',
            'username' => 'mibarber_shop_admin',
            'password' => 'm1_b4rb3r_5h0p_$?',
        );

        $this->keyCaptcha_public = "";
        $this->keyCaptcha_private = "";

        $this->SYS_NAME = 'mibarbershop';
    }

    public function Route()
    {
        return 'mibarbershop/';
    }

    public function sessionName()
    {
        return $this->SYS_NAME;
    }

    public function getDBConect()
    {
        return $this->DB_Connect;
    }

    public function setDBConect($connect)
    {
        $this->DB_Connect = $connect;
    }

    public function getConnection($DB = false)
    {
        $dbConnect = $this->getDBConect();
        $DB = ($DB) ? $DB : $dbConnect['database'];
        $connection = new \mysqli($dbConnect['host'], $dbConnect['username'], $dbConnect['password'], $DB);
        $connection->set_charset("utf8");
        $this->CONNECTION = $connection;
        return $this->CONNECTION;
    }

    public function SetConnection($connect)
    {
        $this->CONNECTION = $connect;
    }

    function ROOT()
    {
        $rout = $_SERVER['HTTP_HOST'];
        return 'http://' . $rout . '/' . $this->Route();
    }
}
