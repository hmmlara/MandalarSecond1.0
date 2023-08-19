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

    public function getPostReaction($PostId){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT COUNT(*) as count_react FROM `post_react` WHERE post_id = :post_id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":post_id",$PostId);
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPostFavorite($PostId){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT COUNT(*) as count_favorite FROM `favorite` WHERE post_id = :post_id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":post_id",$PostId);
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
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
    public function getPostByCityId($seller_city_id,$buyer_city_id,$selectedStatus)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="SELECT post.*,seller_city.name as seller_city,buyer_city.name as buyer_city
        FROM `post`
        JOIN user_info AS seller_info ON post.seller_info_id = seller_info.id
        join city as seller_city on seller_city.id=seller_info.city_id
        JOIN user_info AS buyer_info ON post.buyer_info_id = buyer_info.id
        JOIN city as buyer_city on buyer_city.id=buyer_info.city_id
        where seller_info.city_id=:seller_city_id and buyer_info.city_id=:buyer_city_id and post.status=:selectedStatus order by post.id desc";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":seller_city_id",$seller_city_id);
        $statement->bindParam(":buyer_city_id",$buyer_city_id);
        $statement->bindParam(":selectedStatus",$selectedStatus);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deli_command_by_admin($stats,$check){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE post SET status=:stats WHERE id=:check
        ";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":stats",$stats);
        $statement->bindParam(":check",$check);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function takePost(){
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = 'SELECT * FROM `post` WHERE status="take_waiting" or status="go_take"';
        $statement = $this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function sendPost(){
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = 'SELECT * FROM `post` WHERE status="send_waiting" or status="go_send"';
        $statement = $this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_deli_post_by_id($post_id){
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql='SELECT post.*,seller.fname as seller_fname,seller.lname as seller_lname,buyer.fname as buyer_fname,buyer.lname as buyer_lname,seller_info.address as seller_address,buyer_info.address as buyer_address,seller_city.name as seller_city,buyer_city.name as buyer_city FROM `post` join users as seller on seller.user_id=post.seller_id join users as buyer on buyer.user_id=post.buyer_id 
        join user_info as seller_info on seller_info.id=post.seller_info_id join user_info as buyer_info on buyer_info.id=post.buyer_info_id join city as seller_city on seller_city.id=seller_info.city_id join city as buyer_city on buyer_city.id=buyer_info.city_id where post.id=:post_id';
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":post_id",$post_id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deli_status_update_by_btn($status,$post_id){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE post SET status=:status WHERE id=:post_id
        ";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":status",$status);
        $statement->bindParam(":post_id",$post_id);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getList($user_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql='SELECT post.*, users.full_name,users.img
        FROM post 
        JOIN users  ON post.seller_id = users.user_id where seller_id=:seller_id;';
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":seller_id",$user_id);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchPostList($searchinput)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql = "SELECT * FROM `post` WHERE description name like ";
        // $statement = $this->connection->prepare($sql);

        $sql = "SELECT  post.*,users.full_name,users.img from post join users on post.seller_id=users.user_id  WHERE REPLACE(description, ' ', '') LIKE :description";
        $statement = $this->connection->prepare($sql);
        
        $searchInputWithoutSpaces = str_replace(' ', '', $searchinput);
        $params = '%' . $searchInputWithoutSpaces . '%';
        $statement->bindParam(":description", $params);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function create_view_count($post_id,$user_id){
        // 1. Database Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 2. SQL Statement
        $sql = "INSERT INTO `view_count`(`user_id`, `post_id`) VALUES (:user_id,:post_id)";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":post_id", $post_id);

        // 3. Execute
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

// $post_modal=new Post();
?>