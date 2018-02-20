<?php
namespace modules\conference\controllers;

use Illuminate\Support\Facades\Input;
use Youxiduo\Base\AllService;
use Youxiduo\System\Model\Anchor;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Helper\MyHelpLx;
use Youxiduo\System\Model\Conference;
use Illuminate\Support\Facades\Paginator;


class VdoController extends BackendController
{
    public $genderArr = array('0'=>'男','1'=>'男','2'=>'女');
    public function _initialize()
    {
        $this->current_module = 'conference';
    }

    public function getList()
    {
        $admin = $this->getSessionData('youxiduo_admin');//管理员信息
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 20;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        if(isset($admin['platform']) && $admin['platform']){
            $search['cId'] = $admin['platform'];
        }
        $pageIndex = ((int)Input::get('page',1) - 1) * $pageSize;
        $post_data = [];
        $post_data['room_id'] = $search['room_id'];
        $post_data['offset'] = $pageIndex;
        if (isset($search['start_time'])) $post_data['start_time'] = strtotime($search['start_time']);
        if (isset($search['stop_time'])) $post_data['stop_time'] = strtotime($search['stop_time']);
        if (isset($search['vdo_id'])) $post_data['vdo_id'] = $search['vdo_id'];

        $res = AllService::excute_lion("lion",$post_data,'lion/gonghui/vdos');
//        dd($post_data,$res);
        $data['total_coin'] = $res['data']['total_coin'];
        $data['total_cash'] = $res['data']['total_cash'];

        if ($res['data']) {
            foreach ($res['data']['list'] as &$value) {
                $value['start_time'] = date("Y-m-d H:i:s", $value['start_time']);
                $value['duration'] = $this->getTimeByUnixTime($value['duration']);
            }
            $data['datalist'] = $res['data']['list'];
        }
        unset($search['page']);
        unset($search['pageIndex']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(), 10000, 20, $search);
        $data['search'] = $search;//回调函数
        $data['genderArr'] = $this->genderArr;
        return $this->display('vdo-list', $data);
    }

    public function formatMilliseconds($milliseconds) {
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
//        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;
        $format = '%u时%02u分%02u秒';
        $time = sprintf($format, $hours, $minutes, $seconds);
        return rtrim($time, '0');
    }

    public function getTimeByUnixTime($unix_time = 0) {
        $times = '';
        $days = floor($unix_time /86400);
        $hours = floor($unix_time % 86400 / 3600);
        $minutes = floor($unix_time % 3600 / 60);
        $seconds = floor($unix_time % 86400 % 60);
        if($days > 0){
            $times .= $days.'天';
        }
        if($hours > 0){
            $times .= $hours.'时';
        }
        if($minutes > 0){
            $times .= $minutes.'分';
        }
        if($seconds > 0){
            $times .= $seconds.'秒';
        }
        return $times;
    }


}