<?php
include_once __DIR__."/../model/kpay.php";

class kpayController extends Kpay
{
    public function getAllTrans()
    {
        return $this->getTrans();
    }

    public function UpdateStatus($checking_id)
    {
        return $this->UpdateKpayStatus($checking_id);
    }
    
    public function deleteKpay($checking_id)
    {
        return $this->reject_money($checking_id);
    }

    public function getTransfarhistory($user_id)
    {
        return $this->gethistory($user_id);
    }
}


?>