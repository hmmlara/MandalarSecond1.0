<?php
include_once __DIR__."/../vendor/db.php";

class follow{
private $connection="";

public function getFollow()
{
    //1.DataBase Connect
    $this->connection=Database::connect();
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="Select * From follow";
    $statement=$this->connection->prepare($sql);

    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function follow($from_id,$to_id)
{

    //1.DataBase Connect
    $this->connection=Database::connect();
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO follow( `from_id`, `to_id`, `follow`) VALUES (:from_id,:to_id,1)";
    $statement=$this->connection->prepare($sql);

    $statement->bindParam(":from_id",$from_id);
    $statement->bindParam(":to_id",$to_id);
    // $statement->bindParam(":follow",1);

    //3.execute
    if($statement->execute())
    {
        return true;
    }else
    {
        return false;
    }
}

public function followUser($from_id,$to_id)
{
    //1.DataBase Connect
    $this->connection=Database::connect();
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT CASE WHEN EXISTS (
        SELECT * FROM follow 
        WHERE from_id = $from_id AND to_id = $to_id
    ) THEN TRUE ELSE FALSE END AS follow_exists";
    $statement=$this->connection->prepare($sql);

    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


public function deletefollowing($id)
{
     //1.DataBase Connect
     $this->connection=Database::connect();
     $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="DELETE  FROM `follow` WHERE id=:id";
    $statement=$this->connection->prepare($sql);

    $statement->bindParam(":id",$id, PDO::PARAM_INT);

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