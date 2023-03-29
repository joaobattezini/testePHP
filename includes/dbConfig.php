<?php

class dbConfig
{
    public $conection;
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;

    function __construct() {
        // $this -> serverName = 'sql655.main-hosting.eu';
        $this -> serverName = '212.1.211.1';
        $this -> dbName = 'u226798429_agral';
        $this -> userName = 'u226798429_agral';
        $this -> passCode = 'AgralCloud.2022';
    }
}

?>