<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:38 PM
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function fetch($className):\Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)) {
            yield $row;
        }
    }

    public function fetchPictures()
    {
        while ($row = $this->pdoStatement->fetchAll()) {
          return   $row;
        }
    }
}