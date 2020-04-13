<?php
/**
 * Created by PhpStorm.
 * User: aoxiang
 * Date: 2020-04-13
 * Time: 13:36
 */

namespace Aoxiang\CarModel;


use Aoxiang\CarModel\Library\Che;
use Aoxiang\CarModel\Library\XCar;

class CarModel
{

    public function __construct()
    {

    }

    static public function getBrandList()
    {
        $service = new Che();
        return $service->getBrandList();
    }

    static public function getModelList(int $brandId)
    {
        $service = new Che();
        return $service->getModelList($brandId);
    }
}