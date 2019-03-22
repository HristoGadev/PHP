<?php


class Smartphone implements ICall,IBrowse
{

    function browsing($url): string
    {
       if(preg_match_all('/[0-9]/',$url)){
           throw new Exception("Invalid URL!\n");
       }
       return "Browsing... $url !\n";
    }

    function calling($number): string
    {
        if(preg_match_all('/[^0-9]/',$number)){
           throw new Exception("Invalid number!\n");
        }
        return "Calling... $number !\n";
    }
}