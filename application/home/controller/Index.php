<?php
namespace app\home\controller;
use app\home\model\Sql;
use app\tools\GetSystemID;
use app\tools\APIJson;

header('Access-Control-Allow-Origin:*');
header('Content-Type:text/html; charset=utf-8');

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
        $apiJson = new APIJson();
        return $apiJson ->generateAPIJson("200","success",$businessList,"");
    }

    /**
     * 添加业务项
     * [get]或[post]参数：
     *                  businessName 业务名称
     *                  businessDescription  业务描述
     *                  businessPrice    业务价格
     */
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
        return $apiJson ->generateAPIJson("200","success","","");

        return json($data);
    }

    /**
     * 删除业务项
     * @return json info=‘success’ 删除成功
     *                   ='noExist' id不存在
     */
    public function delBusiness()
    {
        if (is_array($_GET) && count($_GET) > 0) {
            $businessID = $_GET['businessID'];
        }

        if (is_array($_POST) && count($_POST) > 0) {
            $businessID = $_POST['businessID'];
        }

        $sql = new Sql();

        //检查业务id是否存在
        $businessIDExist = $sql -> checkBusinessID($businessID);
        if (empty($businessIDExist)){
            $data = [
                'info' => 'noExist',
                'data' => []
            ];
            return json($data);
        }

        $sql -> delBusiness($businessID);
        $data = [
            'info' => 'success',
            'data' => []
        ];
        return json($data);
    }
}
