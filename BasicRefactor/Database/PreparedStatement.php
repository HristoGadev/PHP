<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/4/2019
 * Time: 2:50 PM
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(array $params=[]):ResultSetInterface;
}