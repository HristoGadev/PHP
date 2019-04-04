<?php
spl_autoload_register();

/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/4/2019
 * Time: 11:57 AM
 */

class Run
{
    private const END="End";

    function readData(){
        $input=readline();

        while ($input!=self::END){

            $animalArgs=explode(" ",$input);
            $animal=Animal_factory::getAnimal($animalArgs);

            $foodArgs=explode(" ",readline());
            $food=Food_factory::getFood($foodArgs);

            echo $animal->makeSound();
            try{
                $animal->eat($food);
                echo $animal;
            }catch (Exception $ex){
                echo $ex->getMessage();
            }

            $input=readline();
        }
    }
}

$run=new Run();
$run->readData();