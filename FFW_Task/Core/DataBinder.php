<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/12/2019
 * Time: 2:25 PM
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function bind($form, $className)
    {
        $classInfo = new \ReflectionClass($className);
        $object = new $className;
        foreach ($form as $key => $value) {
            if ($classInfo->hasProperty($key)) {
                $property = $classInfo->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }
        return $object;
    }
}