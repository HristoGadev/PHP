<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 12:27 PM
 */

namespace Database;


interface ResultSetInterface
{
    public function fetch($className):\Generator;
}