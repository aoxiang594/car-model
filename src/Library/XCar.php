<?php
/**
 * Created by PhpStorm.
 * User: aoxiang
 * Date: 2020-04-13
 * Time: 15:24
 */

namespace Aoxiang\CarModel\Library;


class XCar extends Spider
{
    public function getBrandList()
    {
        //https://product.m.360che.com/brandlist.html
        $url       = 'https://a.xcar.com.cn/brand/';
        $response  = $this->get($url)->getHtmlDomResponse();
        $brandList = [];
        foreach ($response->find(".letters-index li a") as $elements) {
            $id = $elements->getAttribute('data-pbid');
            if (!empty($id)) {
                $name  = $elements->find('span.info', 0)->innertext();
                $brand = [
                    'logo'      => '',//is_null($logo) ? "" : $logo->getAttribute('.src'),
                    'name'      => $name,
                    'extend_id' => $id,
                ];
//                var_dump($brand['name']);
                $brandList[] = $brand;
            }
        }
        return $brandList;
    }

    public function getModelList($id)
    {
//        $url       = 'https://product.m.360che.com/index.php?r=m/ajax/filter/index&option=series&id=' . $id . '&brandtype=1&programType=m&version=3.0.0&_=' . time() . rand(100, 999);
//        $response  = $this->get($url)->getHtmlDomResponse();
//        $modelList = [];
//        foreach ($response->find(".state-model li") as $elements) {
//            $model       = [
//                'extend_id' => $elements->find('a', 0)->getAttribute('href'),
//                'name'      => $elements->find('h4', 0)->innertext(),
//                'logo'      => $elements->find('img', 0)->getAttribute('src'),
//            ];
//            $modelList[] = $model;
//        }
//        return $modelList;
    }
}