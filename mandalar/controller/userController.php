<?php
include_once __DIR__."/../model/user.php";

class UserController extends User{

    public function UpdateUser($userid,$update_fname,$update_lname,$update_bio,$filename)
    {
        return $this->UserDetail($userid,$update_fname,$update_lname,$update_bio,$filename);
    }

    public function UserInfo($user_id)
    {
        return $this->UserAllInfo($user_id);
    }

    public function updateUserNRC($nrcNumber,$user_id)
    {
        return $this->updateNrc($nrcNumber,$user_id);
    }
}

?>