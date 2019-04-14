<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/7/2019
 * Time: 9:52 AM
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;
    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->dataBinder = $dataBinder;
        $this->template = $template;
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