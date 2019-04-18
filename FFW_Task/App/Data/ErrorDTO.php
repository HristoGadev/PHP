<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/12/2019
 * Time: 1:53 PM
 */

namespace App\Data;


class ErrorDTO
{
    private $message;

    /**
     * ErrorDTO constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }


    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }



}