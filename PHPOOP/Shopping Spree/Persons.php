<?php
class Persons{
    private $name;
    private $money;
    private $bag;

    /**
     * Person constructor.
     * @param $name
     * @param $money
     */
    public function __construct($name, $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bag=[];
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
    private function setName($name)
    {
        if(empty($name)){

            throw new Exception('Name cannot be empty');
        }

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    private function setMoney($money)
    {
        if(empty($money)||$money<=0){
            throw new Exception('Money cannot be negative');
        }
        $this->money = $money;
    }

    /**
     * @return array
     */
    public function getBag()
    {
        return $this->bag;
    }

    /**
     * @param array $bag
     */
    public function setBag($bag)
    {
        if(empty($bag)){
            echo 'Nothing bought';
        }
        $this->bag = $bag;
    }

    function buyProduct(Product $product){

       if($product->getCost()>$this->getMoney()) {
           throw  new Exception($this->getName()." can't afford ". $product->getName().PHP_EOL);
       }
        array_push($this->bag,$product);
        $this->money -= $product->getCost();
       $this->getName().' bought '.$product->getName().PHP_EOL;
    }


}