<?php
namespace app\tools;

/**
 * get the systemID,especially the table primary key
 */
class GetSystemID
{
    public function getNow()
    {
        $nowTime = date("YmdHis").rand(100,999);
        return $nowTime;
    }

    public function getBusinessID()
    {
        $businessID = "b-".$this -> getNow();
        return $businessID;
    }
}


?>
