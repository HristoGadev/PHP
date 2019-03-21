<?php
class Person{
    private $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function sayHello(){
        return $this->name.' '.'says "Hello"!';
    }
}
$inputName=readline();
$person=new Person($inputName);
echo ($person->sayHello());