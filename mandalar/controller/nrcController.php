<?php
include_once __DIR__."/../model/nrc.php";

class NrcController extends NRC{
    public function enterNrc($userid,$nrcNumber,$frontfilename,$backfilename){
        return $this->Nrc($userid,$nrcNumber,$frontfilename,$backfilename);
    }

    public function getAll()
    {
        return $this->getNrcUser();
    }
}

?>