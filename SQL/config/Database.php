<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/1/2019
 * Time: 11:34 AM
 */

class Database
{
    private $host='localhost';
    private $db_name='eshop';
    private $username='root';
    private $password='';
    private $conn;

    function getConnection(){
        $this->conn=null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .
                $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}

