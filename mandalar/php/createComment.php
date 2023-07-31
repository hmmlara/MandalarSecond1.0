<?php
include_once __DIR__ . "/../model/comment.php";
$commentModal = new Comment();
if (isset($_POST['post_id']) && isset($_POST['user_id']) && isset($_POST['content']) && isset($_POST['parent_comment_id'])) {
    $postId = $_POST['post_id'];
    $usetId = $_POST['user_id'];
    $content = $_POST['content'];
    $parentCommentId = $_POST['parent_comment_id'];
   echo $commentModal->createComment($postId,$usetId,$content,$parentCommentId);
}