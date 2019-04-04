<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/1/2019
 * Time: 11:32 AM
 */

class Category
{
    private $conn;
    private $table_name='categories';
    public $id;
    public $name;

     function __construct($db)
     {
         $this->conn=$db;
     }
    function read(){
        //select all data
        $query = 'SELECT id, name FROM  categories
                ORDER BY name';

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }
    function readName(){

        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }


}