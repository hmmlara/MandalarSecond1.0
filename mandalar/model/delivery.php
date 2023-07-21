<?php
include_once __DIR__."/../vendor/db.php";

class Delivery{
    private $connection="";
    public function createDeliveryAccount($name,$phone,$password,$nrc,$new_deli_profile_img_name,$new_front_nrc_image_name,$new_back_nrc_image_name,$city)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="INSERT INTO `delivery`( `name`, `nrc`, `phone`, `password`, `city_id`, `photo`, `nrc_front`, `nrc_back`) VALUES(:name, :nrc, :phone, :password, :city_id, :photo, :nrc_front, :nrc_back)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":name",$name);
        $statement->bindParam(":nrc",$nrc);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":password",$password);
        $statement->bindParam(":city_id",$city);
        $statement->bindParam(":photo",$new_deli_profile_img_name);
        $statement->bindParam(":nrc_front",$new_front_nrc_image_name);
        $statement->bindParam(":nrc_back",$new_back_nrc_image_name);
        $statement->execute();

        //3.execute
        if($statement->execute())
        {
            return true;
        }else
        {
            return false;
        }
    }

    //get All user
    // public function getAllUser()
    // {
    //      //1.DataBase Connect
    //      $this->connection=Database::connect();
    //      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    //      //2.sql Statement
    //      $sql="select * from users";
    //      $statement=$this->connection->prepare($sql);
 
    //      //3.execute
    //      $statement->execute();
    //      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    //      return $result;
    // }
    // public function getUserId($email)
    // {
    //     //1.DataBase Connect
    //     $this->connection=Database::connect();
    //     $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     //2.sql Statement
    //     $sql="select user_id from users where email=:email";
    //     $statement=$this->connection->prepare($sql);

    //     $statement->bindParam(":email",$email);

    //     //3.execute
    //     $statement->execute();
    //     $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }
}
?>