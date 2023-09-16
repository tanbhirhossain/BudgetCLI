<?php 

class App{
    
    public $incomes = [];
    public $expenses = [];
    public $menu = [];

    public function __construct(){
        $this->menu = new Menu();
        $this->loadData();
    }

    //Store Data

    public function saveData(){
        //Income
        $incomeData = json_encode($this->incomes, JSON_PRETTY_PRINT);
        file_put_contents('data/incomes.json', $incomeData);

        //Expense
        $expenseData = json_encode($this->expenses, JSON_PRETTY_PRINT);
        file_put_contents('data/expenses.json', $expenseData);

    }
    public function displayMenu(){
        $this->menu->displayMainMenu();
    }

    public function loadData(){
        $incomeData = file_get_contents('data/incomes.json');
        $this->incomes = json_decode($incomeData, true) ?? [];

        $expenseData = file_get_contents('data/expenses.json');
        $this->expenses = json_decode($expenseData, true) ?? [];

    }

    public function handleUserInput($choice){
        switch($choice){
            case 1:
                $this->addIncome();
                exit();

            case 2:
                $this->addExpense();
                exit();

            case 3:
                $this->viewIncome();
                break;
            case 4: 
                $this->ViewExpense();
                break;
                
        }
    }

    public function addIncome(){
        $amount = readline("Enter Amount Value :");
        printf("\n***************** Select Category *****************\n");
        $getCat = new Category;
        $getCat = $getCat->getCategories();

        foreach($getCat as $key=>$category){
            printf("$key. $category\n");
        }

        $category = readLine("Enter Category Number :");
        $income = new Income($amount, $category);
        $this->incomes[] = $income;
        $this->saveData();
        printf("-------------------------\n");
        printf("Income added Successfully!\n");
        printf("-------------------------\n");

    }

    public function addExpense(){
        $amount = readline("Enter Amount Value :");
        printf("\n***************** Select Category *****************\n");
        $getCat = new Category;
        $getCat = $getCat->getCategories();

        foreach($getCat as $key=>$category){
            printf("$key. $category\n");
        }

        $category = readLine("Enter Category Number :");
        $expense = new Income($amount, $category);
        $this->expenses[] = $expense;
        $this->saveData();
        printf("-------------------------\n");
        printf("Expense added Successfully!\n");
        printf("-------------------------\n");

    }

    public function viewIncome(){
        if (empty($this->incomes)) {
            printf("No income records found.\n");
        } else {
            printf("=== Income Records ===\n");

            $total = 0;
            foreach ($this->incomes as $income) {
                printf("%s",$income['amount']."\n");
                $total+=$income['amount'];
            }
            printf("Total Income is : %s\n\n", $total);
        }
       
    }

    public function viewExpense(){
        if (empty($this->expenses)) {
            printf("No Expense records found.\n");
        } else {
            printf("=== Expense Records ===\n");

            $total = 0;
            foreach ($this->expenses as $exp) {
                printf("%s",$exp['amount']."\n");
                $total+=$exp['amount'];
            }
            printf("Total Expense is : %s\n\n", $total);
        }
       
    }


}