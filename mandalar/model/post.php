<?php
include_once __DIR__ . "/../vendor/db.php";

class Post
{
    private $connection = "";
    public function add_new_post($id, $name, $brand, $options, $post_subcategory, $price, $text_area, $imageFolder, $status)
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
        $statement->bindParam(":status", $status);

        // 3. Execute
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllPost()
    {
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = "SELECT post.*,users.fname,users.lname,users.img as user_img FROM `post` join users on post.seller_id=users.user_id ORDER BY post.post_date DESC";
        $statement = $this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //get All Categories
    public function getAllCategory()
    {
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = "select * from category";
        $statement = $this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllSubCategory($id)

    {
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = "select * from sub_category where category_id=:id";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(":id", $id);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPostByFlitter($flitteringData)
    {
        $flitteringObj = get_object_vars($flitteringData);
        // $category = ($flitteringData['category'] == null)? "" : $flitteringData['$category'] ;
        $subCategory = ($flitteringObj['subCategory'] == null) ? '>=0' : "=" . $flitteringObj['subCategory'];
        $minPrice = $flitteringObj['min-price'];
        $maxPrice = $flitteringObj['max-price'];
        $newUsed = ($flitteringObj['new-used'] == null) ? '(new_used = "used" or new_used = "new")' : ' new_used = ' . '"' . $flitteringObj['new-used'] . '"';
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = 'SELECT post.*,users.* FROM `post` join users on post.seller_id = users.user_id WHERE sub_category_id ' . $subCategory . ' and price BETWEEN ' . $minPrice . ' AND ' . $maxPrice . 'And' . $newUsed;
        $statement = $this->connection->prepare($sql);

        // $statement->bindParam(":id",$flitteringData);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPostById($id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="SELECT post.*,users.fname,users.lname,users.img as user_img,category.name as cate_name,sub_category.name as sub_name FROM `post` join users on post.seller_id=users.user_id join sub_category on sub_category.id=post.sub_category_id join category on sub_category.category_id=category.id where post.id=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function takeFreezeMoney($id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="SELECT * FROM `post` WHERE buyer_id=:id AND status != 'sold_out'";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
// buyer update post
    public function newBuyer($user_id,$buyer_info_id,$status,$post_id,$buy_date){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE post SET  buyer_id = :buyer_id, buyer_info_id = :buyer_info_id, status=:status,buy_date=:buy_date WHERE id=:id
        ";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":buyer_id",$user_id);
        $statement->bindParam(":buyer_info_id",$buyer_info_id);
        $statement->bindParam(":status",$status);
        $statement->bindParam(":id",$post_id);
        $statement->bindParam(":buy_date",$buy_date);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    // seller update post
    public function newSeller($seller_info_id,$status,$post_id,){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE post SET   seller_info_id = :seller_info_id, status=:status WHERE id=:id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":seller_info_id",$seller_info_id);
        $statement->bindParam(":status",$status);
        $statement->bindParam(":id",$post_id);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    // favorite
    public function favoritePostListById($user_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="SELECT favorite.*, post.*,users.fname,users.lname,users.img as user_img FROM `favorite` join post on post.id=favorite.post_id join users on users.user_id=post.seller_id WHERE favorite.user_id=:user_id ORDER BY post.post_date DESC";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":user_id",$user_id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getSellerPostById($user_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="SELECT * FROM `post` WHERE seller_id=:user_id and status='seller_waiting' limit 1";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":user_id",$user_id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>