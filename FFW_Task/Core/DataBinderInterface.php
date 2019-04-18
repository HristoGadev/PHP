<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/12/2019
 * Time: 2:24 PM
 */

namespace Core;


interface DataBinderInterface
{
        public function bind($form,$className);
}