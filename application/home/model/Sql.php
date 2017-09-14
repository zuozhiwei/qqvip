<?php
namespace app\home\model;

use think\Model;

class Sql extends Model
{
    /**
     * 获取业务列表
     * @return  业务列表
     */
    public function getBusinessList()
    {
        return db('business') -> select();
    }

    /**
     * 添加业务
     * @param string $businessID          业务id
     * @param string $businessName        业务名称
     * @param string $businessDescription 业务描述
     * @param string $businessPrice       业务价格
     */
    public function addBusiness($businessID,$businessName,$businessDescription,$businessPrice)
    {
        $insertData = [
            'id' => $businessID,
            'name' => $businessName,
            'description' => $businessDescription,
            'price' => $businessPrice
        ];
        db('business') -> insert($insertData);
    }

    /**
     * 删除业务项
     * @param  string $businessID 业务id
     * @return [type]             [description]
     */
    public function delBusiness($businessID)
    {
        db('business') -> where('id',$businessID) -> delete();
    }

    public function checkBusinessID($businessID)
    {
        return db('business') -> where('id',$businessID) -> find();

    }

}
