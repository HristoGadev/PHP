<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 3:59 PM
 */

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY="App/Templates/";
    const TEMPLATE_EXTENSION=".php";

    public function render(string $templateName, $data)
    {
        require_once self::TEMPLATE_DIRECTORY
            . $templateName
            .self::TEMPLATE_EXTENSION;
    }
}