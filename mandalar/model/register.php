<?php
include_once __DIR__."/../vendor/db.php";

class CreateUser{
    private $connection="";
    public function createUserAccount($fname,$lname,$email,$password)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="INSERT INTO users(fname,lname,email,password) VALUES(:first_name,:last_name,:user_email,:user_password)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":first_name",$fname);
        $statement->bindParam(":last_name",$lname);
        $statement->bindParam(":user_email",$email);
        $statement->bindParam(":user_password",$password);
        // $statement->bindParam(":image",$filename,);

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