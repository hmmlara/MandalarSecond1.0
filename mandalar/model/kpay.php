<?php
include_once __DIR__."/../vendor/db.php";

class Kpay{
    private $connection="";

    public function getTrans()
    {
    //1.DataBase Connect
    $this->connection=Database::connect();
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="Select * From money_check";
    $statement=$this->connection->prepare($sql);

    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }

    public function UpdateKpayStatus($checking_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE `money_check` SET `status`=1 WHERE id=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$checking_id);

        if($statement->execute())
        {
            return true;
        }else{
            return false;
        }
    }

    public function reject_money($checking_id)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="DELETE FROM `money_check` WHERE  id=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$checking_id);

        if($statement->execute())
        {
            return true;
        }else{
            return false;
        }
    }
}
?>