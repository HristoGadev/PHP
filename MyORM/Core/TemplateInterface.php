<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 3:57 PM
 */

namespace Core;


interface TemplateInterface
{
       public function render(string $templateName, $data);
}