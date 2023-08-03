<?php
include_once __DIR__."/../vendor/db.php";

class User{

    private $connection="";

    public function UserDetail($userid,$update_fname,$update_lname,$update_bio,$filename)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        //2.sql Statement
        $sql="UPDATE users SET fname=:user_fname,lname=:user_lname,
        img=:image,bio=:bio WHERE user_id=:user_id";
         $statement=$this->connection->prepare($sql);


        $statement->bindParam(":user_fname",$update_fname);
        $statement->bindParam(":user_lname",$update_lname);
        $statement->bindParam(":user_id",$userid);
        $statement->bindParam(":bio",$update_bio,);
        $statement->bindParam(":image",$filename,);

        //3.execute
        if($statement->execute())
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function UserAllInfo($user_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="select * from users where user_id=:user_id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":user_id",$user_id);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;

    }

    public function updateNrc($nrcNumber,$user_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="UPDATE `users` SET `nrc`=:nrc WHERE user_id=:user_id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":user_id",$user_id);
        $statement->bindParam(":nrc",$nrcNumber);

        //3.execute
        if($statement->execute())
        {
            return true;
        }else
        {
            return false;
        }

    }
}


?>