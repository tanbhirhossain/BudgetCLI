<?php 

include_once 'src/Menu.php';
include_once 'src/Category.php';
include_once 'src/Income.php';
include_once 'src/Expense.php';
include_once 'src/App.php';

$app = new App();

while(true){

    $app->displayMenu();
    $choice = readLine("Enter your Choice: ");
    $app->handleUserInput($choice);
}


if($choice==5){
    $category = new Category();
    $category = $category->getCategories();

    printf("************* View Category *************\n\n");
    foreach($category as $key=>$cat){
        printf($key.". ".$cat."\n");
    }
}