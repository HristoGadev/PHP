<?php
spl_autoload_register();

    $numbersInput = explode(' ', readline());
    $smarthPhone = new Smartphone();
try {
    foreach ($numbersInput as $number) {
        echo $smarthPhone->calling($number);
    }
}catch (Exception $ex){
    echo $ex->getMessage();
    }

    $urlsInput = explode(' ', readline());
    try{
        foreach ($urlsInput as $url) {
             echo $smarthPhone->browsing($url);
        }
    }catch (Exception $ex){
    echo $ex->getMessage();


}