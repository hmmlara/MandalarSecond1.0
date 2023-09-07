<?php
include_once __DIR__."/../model/user.php";

class UserController extends User{

    public function UpdateUser($userid, $update_fname, $update_lname, $update_bio, $filename,$fullname)
    {
        return $this->UserDetail($userid, $update_fname, $update_lname, $update_bio, $filename,$fullname);
    }

    public function UpdateAmount($userid,$newAmount)
    {
        return $this->UpdateUserAmount($userid,$newAmount);
    }

    public function UserInfo($user_id)
    {
        return $this->UserAllInfo($user_id);
    }

    public function updateUserNRC($nrcNumber,$user_id)
    {
        return $this->updateNrc($nrcNumber,$user_id);
    }

    public function enterKpay($userid,$amount,$kpay_name,$kpay_phone,$kpay_img)
    {
        return $this->enterWallet($userid,$amount,$kpay_name,$kpay_phone,$kpay_img);
    }

    public function getAllUser(){
        return $this->takeAllUser();
    }

    public function updateMoney($user_id,$money){
        return $this->updateLatestMoney($user_id,$money);
    }
    
}

?>