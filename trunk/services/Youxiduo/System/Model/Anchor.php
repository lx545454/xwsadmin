<?php
/**
 * @package Youxiduo
 * @category Android
 * @link http://dev.youxiduo.com
 * @copyright Copyright (c) 2008 Youxiduo.com
 * @license http://www.youxiduo.com/license
 * @since 4.0.0
 *
 */
namespace Youxiduo\System\Model;

use Youxiduo\Base\Model;
use Youxiduo\Base\IModel;

use Youxiduo\Helper\Utility;
/**
 * 组权限模型类
 */
final class Anchor extends Model implements IModel
{
    public static function getClassName()
    {
        return __CLASS__;
    }

    public static function getList($search,$pageIndex=1,$pageSize=20)
    {
        if ($pageSize === 0) {
            $pageSize = 20;
        }
        $tb = self::db()->leftJoin('CONFERENCE','ANCHOR.cId','=','CONFERENCE.id');
        if(isset($search['id']) && $search['id']>0) $tb = $tb->where('ANCHOR.id','=',$search['id']);
        if(isset($search['roomId']) && $search['roomId']>0) $tb = $tb->where('roomId','=',$search['roomId']);
        if(isset($search['cId']) && $search['cId'] > 0) $tb = $tb->where('cId','=',$search['cId']);
        if(isset($search['name']) && strlen($search['name'])>0) $tb = $tb->where('CONFERENCE.name','=',$search['name']);
        $count = $tb->count();
        $data = $tb->select(array('*','ANCHOR.id'))->orderBy('ANCHOR.roomId','desc')->forPage($pageIndex,$pageSize)->get();
//        dd(self::getQueryLog());
        return array('data'=>$data,'count'=>$count);
    }


    public static function getInfo($id)
    {
        $info = self::db()->select(array('*','ANCHOR.id'))->leftJoin('CONFERENCE','ANCHOR.cId','=','CONFERENCE.id')->where('ANCHOR.id','=',$id)->first();
        return $info;
    }

    public static function getNameList()
    {
        $groups = self::db()->orderBy('id','asc')->lists('name','id');

        return array('0'=>'无') + $groups;
    }

    public static function saveInfo($data)
    {
        if(isset($data['id']) && $data['id']){
            $id = $data['id'];
            unset($data['id']);
            self::db()->where('id','=',$id)->update($data);
            return $id;
        }else{
            return self::db()->insertGetId($data);
        }
    }

    public static function getInfoByUserName($username)
    {
        $info = self::db()->where('username','=',$username)->first();
        return $info;
    }

    public static function delete($id)
    {
        return self::db()->where('id','=',$id)->delete();
    }

    public static function getCNameByRoomId($id)
    {
        $res = self::db()->select('CONFERENCE.name')->leftJoin('CONFERENCE','ANCHOR.cId','=','CONFERENCE.id')->where('ANCHOR.roomId','=',$id)->first();
        return isset($res['name']) ? $res['name'] : '' ;
    }

}