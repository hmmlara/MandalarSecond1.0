<?php include_once __DIR__."/../model/delivery.php";
class DeliveryController extends Delivery{
    public function registerDelivery($name,$phone,$password,$nrc,$new_deli_profile_img_name,$new_front_nrc_image_name,$new_back_nrc_image_name,$city)
    {
        return $this->createDeliveryAccount($name,$phone,$password,$nrc,$new_deli_profile_img_name,$new_front_nrc_image_name,$new_back_nrc_image_name,$city);
    }

    public function getDeliveryList()
    {
        return $this->getAllDelivery();
    }

    public function getDeliveryListById($deli_city){
        return $this->takeDeliveryListById($deli_city);
    }
    // public function getUserInfo($email)
    // {
    //     return $this->getUserId($email);
    // }
}
?>