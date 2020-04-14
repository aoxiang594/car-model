<?php
/**
 * Created by PhpStorm.
 * User: aoxiang
 * Date: 2020-04-13
 * Time: 13:39
 */

namespace Aoxiang\CarModel\Library;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;
use Sunra\PhpSimple\HtmlDomParser;

class Spider
{
    protected $response;

    protected $guzzleOptions = [];

    protected $pinyin;

    public function __construct()
    {
        $this->pinyin = new Pinyin();
    }

    protected function get($url, array $query = [])
    {
        try {

            if (empty($query)) {
                $this->response = $this->getHttpClient()->get($url)->getBody()->getContents();
            } else {
                $this->response = $this->getHttpClient()->get($url, [
                    'query' => $query,
                ])->getBody()->getContents();
            }


            return $this;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    protected function post($url, array $query = [])
    {
        try {
            $this->response = $this->getHttpClient()->post($url, [
                'form_params' => $query,
            ])->getBody()->getContents();

            return $this;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    protected function getJsonResponse()
    {
        try {
            $response = json_decode($this->response, true);
            if (is_array($response)) {
                return $response;
            } else {
                //解析非json，肯定出毛病了
                throw new \Exception('返回数据非JSON格式');
            }

            return $response;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**通过simple_html_dom解析后的数据
     * @return mixed
     * @throws \Exception
     */
    protected function getHtmlDomResponse()
    {
        try {
            $response = HtmlDomParser::str_get_html($this->response);

            return $response;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    protected function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    protected function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    protected function getResponse()
    {
        return $this->response;
    }
}