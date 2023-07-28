<?php
include_once __DIR__."/../vendor/db.php";

class Search{
    private $connection="";

    public function searchUser($searchValue)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="select * from users where fname LIKE '%" . $searchValue . "%' or lname LIKE '%" . $searchValue . "%'";
        $statement = $this->connection->prepare($sql);

        //$statement->bindParam(":mydata",$usersearch);

        //3.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>