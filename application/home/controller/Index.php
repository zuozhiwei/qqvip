<?php
namespace app\home\controller;
use app\home\model\Sql;
use app\tools\GetSystemID;
class Index
{
    public function index()
    {
        return view('index');
    }

    public function getBusinessList(){
        $sql = new Sql();
        $businessList = $sql -> getBusinessList();
        return json($businessList) ;
    }

    public function addBusiness()
    {
        $getSystemID = new getSystemID();
        return $getSystemID -> getBusinessID();
    }
}
