<?php

class Expense{
    public $amount;
    public $category;

    public function __construct($amount, $category){
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getCategory(){
        return $this->category;
    }
}