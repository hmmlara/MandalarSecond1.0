<?php 
include_once __DIR__."/../vendor/db.php";
class Category{
    public $connection = "";
    function __construct(){
        $this->connection = Database::connect();
        // $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION);

    }
    function getCategory(){
        $sql = "SELECT * FROM `category`";
        $statement = $this->connection->prepare($sql);
        $statement->executes;
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

$category_model = new Category();

