<?php
namespace app\home\controller;
use app\home\model\Sql;
use app\tools\GetSystemID;

/**
 * index类
 */
class Index
{
    /**
     * index方法
     * @return index页面
     */
    public function index()
    {
        return view('index');
    }

    /**
     * 获取业务列表
     * @return json
     *         {"data":[{"id":"1","name":"qq会员","description":"每月十元","pice":"10"}]}
     */
    public function getBusinessList(){
        $sql = new Sql();
        $businessList = $sql -> getBusinessList();
        $data = [
            'info' => 'success',
            'data' => $businessList
        ];
        return json($data) ;
    }

    public function addBusiness()
    {
        if (is_array($_GET) && count($_GET) > 0) {
            $businessName = $_GET['businessName'];
            $businessDescription = $_GET['businessDescription'];
            $businessPrice = $_GET['businessPrice'];
        }

        if (is_array($_POST) && count($_POST) > 0) {
            $businessName = $_POST['businessName'];
            $businessDescription = $_POST['businessDescription'];
            $businessPrice = $_POST['businessPrice'];
        }

        $getSystemID = new getSystemID();
        $businessID = $getSystemID -> getBusinessID();
        $sql = new Sql();
        $sql -> addBusiness($businessID,$businessName,$businessDescription,$businessPrice);
        $data = [
            'info' => 'success',
            'data' => []
        ];
    }
}
