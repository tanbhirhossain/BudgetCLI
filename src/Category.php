<?php 

class Category{
    public $categories = [
        1 => "Sales",
        2 => "Donation",
        3 => "Phone Bill",
        4 => "Acomodation"
    ];

    public function __construct(){
       
    }

    public function getCategories(){
        return $this->categories;
    }
    
 
}