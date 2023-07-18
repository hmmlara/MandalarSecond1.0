<?php 
include_once __DIR__."/../model/register.php";
class RegisterController extends Register{
    public function registerUser($image,$fname,$lname,$email,$password)
    {
        return $this->createUserAccount($image,$fname,$lname,$email,$password);
    }

    public function getUserList()
    {
        return $this->getAllUser();
    }
    public function getUserInfo($email)
    {
        return $this->getUserId($email);
    }
}
?>