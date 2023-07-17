<?php include_once __DIR__."/../model/register.php";
class RegisterController extends CreateUser{
    public function registerUser($image,$fname,$lname,$email,$password)
    {
        return $this->createUserAccount($image,$fname,$lname,$email,$password);
    }

    public function getUserList()
    {
        return $this->getAllUser();
    }
}
?>