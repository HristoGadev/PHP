<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:17 AM
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

 class HttpHandlerAbstract
{
    /** @var TemplateInterface  */
    private $template;
    protected $dataBinder;

    public function __construct(TemplateInterface $template,DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder=$dataBinder;
    }

    public function render(string $templateName, $data = null)
    {
        $this->template->render($templateName, $data);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}