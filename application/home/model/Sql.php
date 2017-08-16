<?php
namespace app\home\model;

use think\Model;

class Sql extends Model
{
    public function getBusinessList()
    {
        return db('business') -> select();
    }

}
