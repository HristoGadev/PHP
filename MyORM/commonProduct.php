<?php
session_start();
spl_autoload_register();
$template=new \Core\Template();
$productHttpHandler=new \App\Http\ProductHttpHandler($template,new \Core\DataBinder());


$dbInfo=parse_ini_file('Config/db.ini');
$pdo=new PDO($dbInfo['dsn'],$dbInfo['username'],$dbInfo['password']);
$db=new \Database\PDODatabase($pdo);

$productRepository=new \App\Repository\ProductRepository($db);
$productService=new \App\Service\ProductService($productRepository);
