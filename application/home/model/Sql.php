<?php
namespace app\home\model;

use think\Model;

class Sql extends Model
{
    public function getBusinessList()
    {
        return db('business') -> select();
    }

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

}
