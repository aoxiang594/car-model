<?php
/**
 * Created by PhpStorm.
 * User: aoxiang
 * Date: 2020-04-13
 * Time: 13:36.
 */

namespace Aoxiang\CarModel;

use Aoxiang\CarModel\Library\Che;

class CarModel
{
    public function __construct()
    {
    }

    public static function getBrandList()
    {
        $service = new Che();

        return $service->getBrandList();
    }

    public static function getModelList(int $brandId)
    {
        $service = new Che();

        return $service->getModelList($brandId);
    }
}
