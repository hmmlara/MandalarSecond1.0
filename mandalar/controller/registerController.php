<?php include_once __DIR__."/../model/register.php";
class RegisterController extends CreateUser{
    public function registerUser($fname,$lname,$email,$password)
    {
        return $this->createUserAccount($fname,$lname,$email,$password);
    }
}
?>