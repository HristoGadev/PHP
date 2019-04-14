<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:25 PM
 */

namespace Database;


interface StatementInterface
{
    public function execute(array $params=[]):ResultSetInterface;
}