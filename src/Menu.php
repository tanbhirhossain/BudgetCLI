<?php 

class Menu{
    public function displayMainMenu(){
        printf("What do you want?\n\n");
        printf("----------------------------\n\n");
        printf("1. Add Income\n");
        printf("2. Add Expense\n");
        printf("3. View Income\n");
        printf("4. View Expense\n");
        printf("5. View Category\n\n");
    }

    public function getUserInput(){
        return readLine("Enter your choice : ");
    }
}