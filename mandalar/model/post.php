<?php
include_once __DIR__."/../vendor/db.php";

class Post{
    private $connection="";
    public function add_new_post($id, $name, $brand, $options, $post_subcategory, $price, $text_area, $imageFolder,$status)
{
    // 1. Database Connect
    $this->connection = Database::connect();
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. SQL Statement
    $sql = "INSERT INTO `post`(`seller_id`,  `sub_category_id`, `item`, `brand`, `photo_folder`, `price`, `description`, `new_used`,`status`) VALUES 
    (:seller_id, :sub_category_id, :item, :brand, :photo_folder, :price, :description, :new_used, :status)";
    
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(":seller_id", $id);
    $statement->bindParam(":sub_category_id", $post_subcategory);
    $statement->bindParam(":item", $name);
    $statement->bindParam(":brand", $brand);
    $statement->bindParam(":photo_folder", $imageFolder);
    $statement->bindParam(":price", $price);
    $statement->bindParam(":description", $text_area);
    $statement->bindParam(":new_used", $options);
    $statement->bindParam(":status",$status);

    // 3. Execute
    if ($statement->execute()) {
        return true;
    } else {
        return false;
    }
}


    //get All Categories
    public function getAllCategory()
    {
         //1.DataBase Connect
         $this->connection=Database::connect();
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
         //2.sql Statement
         $sql="select * from category";
         $statement=$this->connection->prepare($sql);
 
         //3.execute
         $statement->execute();
         $result=$statement->fetchAll(PDO::FETCH_ASSOC);
         return $result;
    }
    public function getAllSubCategory($id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="select * from sub_category where category_id=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPostByFlitter($flitteringData)
    {
        $flitteringObj =  get_object_vars($flitteringData);
        // $category = ($flitteringData['category'] == null)? "" : $flitteringData['$category'] ;
        $subCategory = ($flitteringObj['subCategory'] == null)? '>=0' : "=".$flitteringObj['subCategory'];
        $minPrice = $flitteringObj['min-price'];
        $maxPrice = $flitteringObj['max-price'];
        $newUsed = ($flitteringObj['new-used'] == null)? '(new_used = "used" or new_used = "new")': 'new_used = '.$flitteringObj['new-used'];
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql='SELECT * FROM `post` WHERE sub_category_id '. $subCategory.' and price BETWEEN '.$minPrice.' AND '.$maxPrice.'
        And'.$newUsed ;
        $statement=$this->connection->prepare($sql);

        // $statement->bindParam(":id",$flitteringData);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>