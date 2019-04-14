<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:36 PM
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    private $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function querry(string $querry): StatementInterface
    {
         $stmt=$this->pdo->prepare($querry);

         return new PDOPreparedStatement($stmt);


    }
}