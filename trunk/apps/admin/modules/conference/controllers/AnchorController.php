<?php
namespace modules\conference\controllers;

use Illuminate\Support\Facades\Input;
use Youxiduo\Base\AllService;
use Youxiduo\System\Model\Anchor;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Helper\MyHelpLx;
use Youxiduo\System\Model\Conference;
use Illuminate\Support\Facades\Paginator;


class AnchorController extends BackendController
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
        $pageSize = 10;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        if(isset($admin['platform']) && $admin['platform']){
            $search['cId'] = $admin['platform'];
        }
        $pageIndex = (int)Input::get('page',1);
        $res = Anchor::getList($search, $pageIndex, $pageSize);
        if(isset($res['data']))
        {
            foreach ($res['data'] as &$i){
                $user = AllService::excute_lion("lion",array('room_ids'=>$i['roomId']),'lion/gonghui/rooms');
                $i['roomInfo'] = array();
                if(isset($user['data']['list']['0'])){
                    $i['roomInfo'] = $user['data']['list']['0'];
                }
            }
            $data['datalist'] = $res['data'];
            $total = $res['count'];
        }
        unset($search['page']);
        unset($search['pageIndex']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(), $total, $pageSize, $search);
        $data['search'] = $search;//回调函数
        $data['genderArr'] = $this->genderArr;
        return $this->display('anchor-list', $data);
    }

    public function getAdd()
    {
        $data = array();
        $input = Input::get();
        $data['name'] = '';
        $data['cId'] = '';
        if (isset($input['id']) && $input['id'] > 0) {
            $res = Anchor::getInfo($input['id']);
            if ($res) {
                $data['data'] = $res;
            }
        }
        return $this->display('anchor-add', $data);
    }

    public function postAdd(){
        $data=Input::all();

        if (empty($data['id'])) {
            $cName = Anchor::getCNameByRoomId($data['roomId']);
            if ($cName) return $this->back('主播已添加');
        } else {
            $temp = Anchor::getInfo($data['id']);
            if ($temp['roomId'] != $data['roomId']) {
                $cName = Anchor::getCNameByRoomId($data['roomId']);
                if ($cName) return $this->back('主播已添加');
            }
        }

        $res = Anchor::saveInfo($data);
        if($res){
         return $this->redirect('conference/anchor/list','操作成功');
        }else{
         return $this->back($res['error']);
        }
    }

    public function postAjaxDel()
    {
        $data = Input::all();
        $res = false;
        if(isset($data['id']) && $data['id']>0){
            $res=Anchor::delete($data['id']);
        }
        if($res){
            echo json_encode(array('success' => 'true','mess'=>$res));
        }else{
            echo json_encode(array('success' => 'false','mess'=>$res));
        }
    }

    public function getJsonSearch()
    {
        $pageSize = 10;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $pageIndex = (int)Input::get('page', 1);
        $res = Conference::getList($search, $pageIndex, $pageSize);
        if ($res['data']) {
            $data['data'] = $res['data'];
            $total = $res['count'];
        }
        unset($search['page']);
        $data['pagelinks'] = MyHelpLx::pager(array(), $total, $pageSize, $search);
        $data['search'] = $input;
        $html = $this->html('pop-conference-list', $data);
        return $this->json(array('html' => $html));
    }

}