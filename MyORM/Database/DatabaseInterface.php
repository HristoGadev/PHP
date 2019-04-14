<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:23 PM
 */

namespace Database;


interface DatabaseInterface
{
       public function querry(string $querry):StatementInterface;
}