<?php
namespace Youxiduo\Base;

use Youxiduo\Base\BaseService;
use Youxiduo\Helper\Utility;
use Illuminate\Support\Facades\Config;
use Youxiduo\Helper\BaseHttp;

class   AllService extends BaseService{


    public static $arr_url = array(
        'duoyou_api_url'  => 'app.duoyou_api_url', 
        'sdk_api_url'  => 'app.sdk_api_url',
        'sdk_appdetail_url'  => 'app.sdk_appdetail_url',
        'sdk_package_url'  => 'app.sdk_package_url',
        'duoyou_account_url'=>'app.duoyou_account_url',
        'duoyou_count_url'=>'app.duoyou_count_url',
        '11080_api_url'=>'app.11080_api_url',
        '8089'  => 'app.8089_api_url',//李陈毅,IOS宁金强
        '8088'  => 'app.8088_api_url',//李陈毅
        '11105'=> 'app.11105_api_url',//慈祥
        '8338'=> 'app.8338_api_url',//刘勇
        '8101'=> 'app.8101_api_url',//宁金强
        'export'=> 'app.export_api_url',//宁金强
        'lion' => 'app.lion_api_url',//闻翰
        'cp' => 'app.cp_api_url',//闻翰
        'jisu' => 'app.jisu_api_url',//闻翰

    );

    public static $arr = array(

        'lion/activity_list' => array("activity_list",'GET'),
        'lion/gonghui/rooms' => array("gonghui/rooms",'GET'),
        'lion/gonghui/rooms_income' => array("gonghui/rooms_income",'GET'),
        'lion/gonghui/vdos' => array("gonghui/vdos",'GET'),
        'lion/user/info' => array("user/info",'GET'),

        'ssc_get_qicis' => array("ssc_get_qicis",'POST'),
        'ssc_get_qici_detail' => array("ssc_get_qici_detail",'POST'),
        'get_cqssc' => array("get_cqssc",'POST'),
        'get_cqssc_history' => array("get_cqssc_history",'GET'),
        'get_cqssc_num' => array("get_cqssc_num",'POST'),
        'get_one' => array("get_one",'POST'),
        'get_history_2x' => array("get_history_2x",'POST'),
        'get_history_2x2' => array("get_history_2x2",'POST'),
        'get_history_2x3' => array("get_history_2x3",'POST'),
        'get_history_2x3_list' => array("get_history_2x3_list",'POST'),
        'get_history_3x' => array("get_history_3x",'POST'),
        'get_history_3x_3x' => array("get_history_3x_3x",'POST'),
        'get_history_2x_list' => array("get_history_2x_list",'POST'),
        'get_history_3x_list' => array("get_history_3x_list",'POST'),
        'get_demo' => array("get_demo",'POST'),
        'ssc_get_qicis' => array("ssc_get_qicis",'POST'),
        'fangan_save' => array("fangan_save",'POST'),
        'fangan_get' => array("fangan_get",'POST'),
        'fangan_getList' => array("fangan_getList",'POST'),



    );
/*
 * $url:$arr_url中键值表示ip
 * $data：传入参数
 * $method：具体地址
 * $isList：默认需要返回数据
 */
    //完成
    public static function excute($url=false,$data=array(),$method="",$isList=true)
    {
        if(!$url)   return array('success'=>false,'error'=>"接口地址不能为空",'data'=>false);
        $res = Utility::loadByHttp(Config::get(self::$arr_url[$url]).self::$arr[$method][0],$data,self::$arr[$method][1]);
        echo Config::get(self::$arr_url[$url]).self::$arr[$method][0];
        print_r($data);
        print_r($res);
        if(!$res)   return array('success'=>false,'error'=>"接口无返回",'data'=>false);
        //整合code
        if(array_key_exists("errorCode",$res)){
            $res['code'] = $res['errorCode'];
        }
        if(isset($res['code'])&&!$res['code']) {
            if($isList){
                if(isset($res['result']))return array('success' => true, 'error' => false, 'data' => $res['result'],'count' => isset($res['totalCount'])?$res['totalCount']:0,'amount' => isset($res['rechargeTotalAmount'])?$res['rechargeTotalAmount']:0,'pay' => isset($res['payTotalAmount'])?$res['payTotalAmount']:0);
            }else{
                return array('success' => true, 'error' => false, 'data' => false);
            }
        }
        return array('success'=>false,'error'=>isset($res['errorDescription'])?$res['errorDescription']:"接口未返回错误信息",'data'=>false);
    }

    public static function excute2($url=false,$data=array(),$method="",$isList=true)
    {
        $res = BaseHttp::http(Config::get(self::$arr_url[$url]).self::$arr[$method][0],$data,self::$arr[$method][1]);
//        echo Config::get(self::$arr_url[$url]).self::$arr[$method][0];
//        print_r($data);
//        print_r($res);
        if(!$res){
            return array('success'=>false,'error'=>"接口无返回",'data'=>false);
        }
        //整合code
        if(array_key_exists("errorCode",$res)){
            $res['code'] = $res['errorCode'];
        }
        if(isset($res['code'])&&!$res['code']) {
            if($isList){
                    return array('success' => true, 'error' => false, 'data' => $res['result'],'count' => isset($res['totalCount'])?$res['totalCount']:0,'more' => isset($res['more'])?$res['more']:array());
            }else{
                return array('success' => true, 'error' => false, 'data' => false);
            }
        }
        return array('success'=>false,'error'=>isset($res['errorDescription'])?$res['errorDescription']:"接口未返回错误信息",'data'=>false);
    }

    public static function excute_lion($url=false,$data=array(),$method="",$isList=true)
    {
        if(!$url)   return array('success'=>false,'error'=>"接口地址不能为空",'data'=>false);
        $res = Utility::loadByHttp(Config::get(self::$arr_url[$url]).self::$arr[$method][0],$data,self::$arr[$method][1]);
//        echo Config::get(self::$arr_url[$url]).self::$arr[$method][0];
//        print_r($data);
//        print_r($res);
        if(!$res)   return array('success'=>false,'error'=>"接口无返回",'data'=>false);
        if(isset($res['error'])&&!$res['error']) {
            if($isList){
                if(isset($res['data']))return array('success' => true, 'error' => false, 'data' => $res['data'],'count' => isset($res['totalCount'])?$res['totalCount']:0,'amount' => isset($res['rechargeTotalAmount'])?$res['rechargeTotalAmount']:0);
            }else{
                return array('success' => true, 'error' => false, 'data' => false);
            }
        }
        return array('success'=>false,'error'=>isset($res['errorDescription'])?$res['errorDescription']:"接口未返回错误信息",'data'=>false);
    }

    public static function excute_cp($url=false,$data=array(),$method="",$isList=true)
    {
        if(!$url)   return array('success'=>false,'error'=>"接口地址不能为空",'data'=>false);
        $res = Utility::loadByHttp(Config::get(self::$arr_url[$url]).self::$arr[$method][0],$data,self::$arr[$method][1]);
//        echo Config::get(self::$arr_url[$url]).self::$arr[$method][0];
//        print_r($data);
//        print_r($res);
        if(!$res)   return array('success'=>false,'error'=>"接口无返回",'data'=>false);
        if(isset($res['error_code'])&&!$res['error_code']) {
            if($isList){
                if(isset($res['data']))return array('success' => true, 'error' => false, 'data' => $res['data'],'count' => isset($res['totalCount'])?$res['totalCount']:0,'amount' => isset($res['rechargeTotalAmount'])?$res['rechargeTotalAmount']:0);
            }else{
                return array('success' => true, 'error' => false, 'data' => false);
            }
        }
        return array('success'=>false,'error'=>isset($res['errorDescription'])?$res['errorDescription']:"接口未返回错误信息",'data'=>false);
    }

  }