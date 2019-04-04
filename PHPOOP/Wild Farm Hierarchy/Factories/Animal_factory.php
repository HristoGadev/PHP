<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/3/2019
 * Time: 2:56 PM
 */
spl_autoload_register();
class Animal_factory
{
    static function getAnimal($args, Food $food)
    {
        $animalType = $args[0];
        $animalName = $args[1];
        $animalWeight = floatval($args[2]);
        $animalLivingRegion = $args[3];
        $foodEaten = $food->getQuantity();
        switch (strtolower($animalType)) {
            case 'cat':
                $catBreed = $args[4];
                $animal = new Cat($animalType, $animalName, $animalWeight, $animalLivingRegion, $catBreed, $foodEaten);
                break;
            case 'tiger':
                $animal = new Tiger($animalType, $animalName, $animalWeight, $animalLivingRegion, $foodEaten);
                break;
            case 'mouse':
                $animal = new Mouse($animalType, $animalName, $animalWeight, $animalLivingRegion, $foodEaten);
                break;
            case 'zebra':
                $animal = new Zebra($animalType, $animalName, $animalWeight, $animalLivingRegion, $foodEaten);
                break;

        }
        return $animal;
    }
}