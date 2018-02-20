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
final class Conference extends Model implements IModel
{		
    public static function getClassName()
	{
		return __CLASS__;
	}
	
    public static function getList($search,$pageIndex=1,$pageSize=20)
    {
        $tb = self::db();
        if(isset($search['id']) && $search['id']>0) $tb = $tb->where('CONFERENCE.id','=',$search['id']);
        if(isset($search['name']) && !empty($search['name'])) $tb = $tb->where('name','like','%'.$search['name'].'%');
        $count = $tb->count();
        $data = $tb->leftJoin('ANCHOR','CONFERENCE.id','=','ANCHOR.cId')->orderBy('CONFERENCE.id','desc')->groupBy('CONFERENCE.id')->forPage($pageIndex,$pageSize)->select('CONFERENCE.*', self::raw('COUNT(CORE_ANCHOR.cId) as ANCHOR_count'))->get();
        return array('data'=>$data,'count'=>$count);
    }

	public static function getInfo($id)
	{
		$info = self::db()->where('id','=',$id)->first();
		return $info;
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

	public static function getInfoByUserName($username, $id){
        $info = self::db()->where('username','=',$username)->where('id','<>',$id)->first();
        return $info;
    }
}