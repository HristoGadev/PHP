<?php
spl_autoload_register();

$inputPeople=splitInput();
$people=[];
for($i=0; $i<count($inputPeople)-1; $i+=2){
    try{
        $personName=$inputPeople[$i];
        $money=$inputPeople[$i+1];
        $people[$personName]=new Persons($personName,$money);
    }catch (Exception $ex){
        echo  $ex->getMessage();
    }

}

$inputProducts = splitInput();
$products=[];
for($i=0; $i<count($inputPeople)-1; $i+=2) {

    $productName = $inputProducts[$i];
    $cost = $inputProducts[$i+1];
    $products[$productName] = new Product($productName, $cost);
}

$text=readline();
while($text!='END'){
    $input=explode(' ',$text);

    $name=$input[0];
    $product=$input[1];
    try{
       $people[$name]->buyProduct($products[$product]);
    }catch (Exception $ex){
        echo $ex->getMessage();
    }
    $input=readline();

}




function splitInput(){
    return preg_split('/[;=]/',readline(),-1,PREG_SPLIT_NO_EMPTY);
}