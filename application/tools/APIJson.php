<?php
/**
 * Created by PhpStorm.
 * User: zzw
 * Date: 9/18/17
 * Time: 5:29 PM
 */

namespace app\tools;


class APIJson
{
    function  generateAPIJson($code,$info,$data,$location)
    {

        return json(
            [
                "code" => $code,
                "info" => $info,
                "data" => $data,
                "location" =>$location
            ]);
    }

}