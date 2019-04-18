<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:00 AM
 */

namespace Core;


interface TemplateInterface
{
        public function render($templateName,$data);
}