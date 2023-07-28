<?php include_once __DIR__."/../model/post.php";
class PostController extends Post{
    public function add_post($id,$name,$brand,$options,$post_subcategory,$price,$text_area,$imageFolder,$status)
    {
        return $this->add_new_post($id,$name,$brand,$options,$post_subcategory,$price,$text_area,$imageFolder,$status);
    }

    public function getCategoryList()
    {
        return $this->getAllCategory();
    }

    public function getSubCategoryList($id){
        return $this->getAllSubCategory($id);
    }
    // public function getUserInfo($email)
    // {
    //     return $this->getUserId($email);
    // }
    public function getPostList(){
        return $this->getAllPost();
    }
    public function getPost($id){
        return $this->getPostById($id);
    }
}
?>