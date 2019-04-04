<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/3/2019
 * Time: 2:56 PM
 */

class Food_factory
{
   static function getFood($args)
    {
        $typeFood = $args[0];
        $quantity = $args[1];
        switch (strtolower($typeFood)) {
            case 'vegetable' :
                $food=new Vegetable($quantity);
                break;
            case 'meat' :
                $food=new Meat($quantity);
                break;
            default:
                return null;
        }
        return $food;
    }
}