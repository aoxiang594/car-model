##卡车型号库

## 

![StyleCI build status](https://github.styleci.io/repos/255239423/shield) 


github地址[https://github.com/aoxiang594/car-model](https://github.com/aoxiang594/car-model)



#### 使用方法

通过composer安装

```shell
composer require aoxiang/car-model
```

#### Usage
```php
use Aoxiang\CarModel\CarModel;
//获取品牌列表
$list = CarModel::getBrandList();
//Array
//(
//    [0] => Array
//        (
//            [logo] => https://img4.kcimg.cn/imgser/20181206052211b63b2587aa7a.png_120x80.jpg
//            [name] => 奔驰
//            [extend_id] => 19
//            [index] => B
//        )
//
//    [1] => Array
//        (
//            [logo] => https://img4.kcimg.cn/imgser/20181206052024e23824fad7a2.png_120x80.jpg
//            [name] => 北奔重卡
//            [extend_id] => 9
//            [index] => B
//        )
//
//    [2] => Array
//        (
//            [logo] => https://img4.kcimg.cn/imgser/20181206052059b959361198e4.png_120x80.jpg
//            [name] => 北汽黑豹
//            [extend_id] => 382
//            [index] => B
//        )
//)
//获取型号列表
$list = CardMode::getModelList(19);


// Array
// (
//     [0] => Array
//         (
//             [extend_id] => /s29/7424_64_index.html
//             [name] => 奔驰Accelo载货车
//             [logo] => https://img4.kcimg.cn/imgser/6/6474/6474241.jpg_270x180.jpg
//             [index] => B
//         )

//     [1] => Array
//         (
//             [extend_id] => /s29/7423_64_index.html
//             [name] => 奔驰Econic载货车
//             [logo] => https://img4.kcimg.cn/imgser/6/6474/6474230.jpg_270x180.jpg
//             [index] => B
//         )

//     [2] => Array
//         (
//             [extend_id] => /s0/82_66_index.html
//             [name] => 奔驰Actros牵引车
//             [logo] => https://img4.kcimg.cn/imgser/0/66/66822.jpg_270x180.jpg
//             [index] => B
//         )

//     [3] => Array
//         (
//             [extend_id] => /s12/3169_66_index.html
//             [name] => 奔驰新Actros牵引车
//             [logo] => https://img4.kcimg.cn/imgser/6/6631/6631695.jpg_270x180.jpg
//             [index] => B
//         )

//     [4] => Array
//         (
//             [extend_id] => /s28/7142_66_index.html
//             [name] => 奔驰新Arocs牵引车
//             [logo] => https://img4.kcimg.cn/imgser/6/6671/6671420.jpg_270x180.jpg
//             [index] => B
//         )

//     [5] => Array
//         (
//             [extend_id] => /s0/82_64_index.html
//             [name] => 奔驰Actros载货车
//             [logo] => https://img4.kcimg.cn/imgser/0/64/64822.jpg_270x180.jpg
//             [index] => B
//         )
// )
```


#### 待办
- [x] 卡车之家，数据来源[https://product.m.360che.com/brandlist.html](https://product.m.360che.com/brandlist.html)
- [ ] 汽车之家
