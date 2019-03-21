<?php
spl_autoload_register();
try{
    $author=readline();
    $title=readline();
    $price=readline();

    $bookInfo=readline();
    $book=new Book($title,$author,$price);
    echo "OK\n";
    if($bookInfo==='STANDARD'){
        printf($book);
    }else if($bookInfo==='GOLD'){
        $goldenBook=new GoldenEditionBook($title,$author,$price);

        printf($goldenBook);
    }else{
        throw new Exception("Type is not valid!\n");

    }
   }catch (Exception $ex){
    echo $ex->getMessage();
}
//$authorSecondName=explode(' ',$author)[1]var_dump($book->setAuthor($author));