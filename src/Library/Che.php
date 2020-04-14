<?php
/**
 * Created by PhpStorm.
 * User: aoxiang
 * Date: 2020-04-13
 * Time: 13:34.
 */

namespace Aoxiang\CarModel\Library;

class Che extends Spider
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBrandList()
    {
        //https://product.m.360che.com/brandlist.html
        $url = 'https://product.m.360che.com/brandlist.html';
        $response = $this->get($url)->getHtmlDomResponse();
        $brandList = [];
        foreach ($response->find('.brands-list li') as $elements) {
            $id = $elements->getAttribute('data-brandid');
            if (!empty($id)) {
                $logo = $elements->find('img', 0);
                $name = $elements->find('figcaption', 0);
                $name = is_null($name) ? $elements->find('a', 0)->innertext() : $name->innertext();
                $brand = [
                    'logo' => is_null($logo) ? '' : $logo->getAttribute('.src'),
                    'name' => $name,
                    'extend_id' => $id,
                    'index' => strtoupper(substr($this->pinyin->abbr($name), 0, 1)),
                ];
//                var_dump($brand['name']);
                $brandList[] = $brand;
            }
        }

        return $brandList;
    }

    public function getModelList($id)
    {
        $url = 'https://product.m.360che.com/index.php?r=m/ajax/filter/index&option=series&id='.$id.'&brandtype=1&programType=m&version=3.0.0&_='.time().rand(100, 999);
        $response = $this->get($url)->getHtmlDomResponse();
        $modelList = [];

        foreach ($response->find('.state-model li') as $elements) {
            $name = $elements->find('h4', 0)->innertext();
            $model = [
                'extend_id' => $elements->find('a', 0)->getAttribute('href'),
                'name' => $name,
                'logo' => $elements->find('img', 0)->getAttribute('src'),
                'index' => strtoupper(substr($this->pinyin->abbr($name), 0, 1)),
            ];
            $modelList[] = $model;
        }

        return $modelList;
    }
}
