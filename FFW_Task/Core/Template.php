<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:03 AM
 */

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY="App/Templates/";
    const TEMPLATE_EXTENSION=".php";

    public function render($templateName, $data)
    {
        require_once self::TEMPLATE_DIRECTORY
            . $templateName
            .self::TEMPLATE_EXTENSION;
    }
}