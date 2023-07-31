<?php
include_once __DIR__."/../vendor/db.php";

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
    function createComment($postId,$userId,$content,$ParentcommentId)
    {
        $sql = "INSERT INTO 
        `$this->table`( `post_id`, `user_id`, `content`, `parent_com_id`)
         VALUES (:post_id, :user_id , :content, :parent_cm_id )";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':post_id',$postId);
        $statement->bindParam(':user_id',$userId);
        $statement->bindParam(':content',$content);
        $statement->bindParam(':parent_cm_id',$ParentcommentId);
        if($statement->execute()){
            echo "Comment Created Successfully";
        }
        else{
            echo "Comment Created Err";
        }
    }

}