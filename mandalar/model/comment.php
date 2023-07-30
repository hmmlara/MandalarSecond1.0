<?php
class Comment
{
    private $connection = "";
    private $table = '';
    function __construct()
    {
        //1.DataBase Connect
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table = 'comment';
    }
    function createComment(){
        $sql = "";
    }

}