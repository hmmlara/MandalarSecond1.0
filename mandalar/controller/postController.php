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
    public function getFreezeMoney($id){
        return $this->takeFreezeMoney($id);
    }
    
// buyer update post
    public function updateBuyer($user_id,$buyer_info_id,$status,$post_id,$buy_date){
        return $this->newBuyer($user_id,$buyer_info_id,$status,$post_id,$buy_date);
    }
    public function updateSeller($seller_info_id,$status,$post_id){
        return $this->newSeller($seller_info_id,$status,$post_id);
    }
    public function favorite_post_list($user_id){
        return $this->favoritePostListById($user_id);
    }
    
    // seller
    public function getSellerPost($user_id){
        return $this->getSellerPostById($user_id);
    }
}
?>