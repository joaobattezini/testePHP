<?php
/**
 * Created by PhpStorm.
 * User: elisandroboeno
 * Date: 22/06/2018
 * Time: 01:06
 */
include 'dbConfig.php';

class Mysql extends dbConfig    {

    public $connectionString;
    public $dataSet;
    private $sqlQuery;

    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passCode;

    function __construct(){
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;

        $dbPara = new dbConfig();
        $this -> databaseName = $dbPara -> dbName;
        $this -> hostName = $dbPara -> serverName;
        $this -> userName = $dbPara -> userName;
        $this -> passCode = $dbPara ->passCode;
        $dbPara = NULL;
    }

    function dbConnect()    {
        // print_r($this);
        $this -> connectionString = mysqli_connect($this -> hostName,$this -> userName,$this -> passCode);
        mysqli_select_db($this -> connectionString, $this -> databaseName);
        if (!$this -> connectionString) {
            echo "Não foi possível conectar ao banco MySQL."; exit;
        }
        return $this -> connectionString;
    }

    function dbDisconnect() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = NULL;
        $this -> hostName = NULL;
        $this -> userName = NULL;
        $this -> passCode = NULL;
    }

    function rollback(){
        return $this -> connectionString.mysqli_rollback();
    }

    function selectAll($tableName)  {
        dbConnect;
        $this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;
        $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery);
        return $this -> dataSet;
    }

    function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
        $this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
        if($valueType == 'int') {
            $this -> sqlQuery .= $value;
        }
        else if($valueType == 'char')   {
            $this -> sqlQuery .= "'".$value."'";
        }
        $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery);
        $this -> sqlQuery = NULL;
        return $this -> dataSet;
        #return $this -> sqlQuery;
    }

    function insertInto($tableName,$values) {
        $i = NULL;
        print_r($values);
        $this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
        $i = 0;
        while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL)    {
            if($values[$i]["type"] == "char")   {
                $this -> sqlQuery .= "'";
                $this -> sqlQuery .= $values[$i]["val"];
                $this -> sqlQuery .= "'";
            }
            else if($values[$i]["type"] == 'int')   {
                $this -> sqlQuery .= $values[$i]["val"];
            }
            $i++;
            if($values[$i]["val"] != NULL)  {
                $this -> sqlQuery .= ',';
            }
        }
        $this -> sqlQuery .= ')';
        echo $this -> sqlQuery;
        mysqli_query($this -> connectionString, $this -> sqlQuery);
//        mysql_query($this -> sqlQuery,$this ->connectionString);
        return $this -> sqlQuery;
        #$this -> sqlQuery = NULL;
    }

    function selectFreeRun($query)  {
        $this -> dataSet = mysqli_query($this -> connectionString, $query);
        return $this -> dataSet;
    }

    function freeRun($query)    {
//        return mysqli_query($query,$this -> connectionString);
        return mysqli_query($this -> connectionString, $query);
    }

    function getInsertedId(){
        return mysqli_insert_id($this -> connectionString);
    } 

    // function inserteReturnId($query){
    //     $ret = mysqli_query($this -> connectionString, $query)
    //     if($ret)
    //         return mysqli_insert_id($this -> connectionString);
    //     else
    //         return $ret;

    // }
}
?>