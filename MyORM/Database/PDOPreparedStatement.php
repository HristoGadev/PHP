<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:37 PM
 */

namespace Database;


class PDOPreparedStatement implements StatementInterface
{
    private $pdoStatement;
    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement=$PDOStatement;
    }

    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}