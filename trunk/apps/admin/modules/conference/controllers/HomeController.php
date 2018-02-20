<?php
namespace modules\conference\controllers;

use Illuminate\Support\Facades\Input;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Helper\MyHelpLx;
use Youxiduo\System\Model\Conference;
use Youxiduo\System\Model\AuthGroup;
use Youxiduo\System\Model\Admin;


class HomeController extends BackendController
{
    public function _initialize()
    {
        $this->current_module = 'conference';
    }

    public function getList()
    {
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 10;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $pageIndex = (int)Input::get('page',1);
        $res = Conference::getList($search, $pageIndex, $pageSize);
        if($res['data'])
        {
            $data['datalist'] = $res['data'];
            $total = $res['count'];
        }
        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数

        return $this->display('conference-list',$data);
    }

    public function getAdd(){
        $data=array();
        $input = Input::get();
        if(isset($input['id']) && $input['id'] > 0){
            $res = Conference::getInfo($input['id']);
            if($res){
                $data['data'] = $res;
            }
            $userRes = Admin::getInfoByUserName($res['userName']);
            if(isset($userRes['id'])){
                $data['userInfo'] = $userRes;print_r($userRes);
            }
        }
        return $this->display('conference-add',$data);
    }

   public function postAdd(){
      $data=Input::all();
      $userRes = Conference::getInfoByUserName($data['userName'], $data['id']);
      if ($userRes) {
          return $this->back('用户名已存在');
      }
      //保存公会
       $params = array(
           'id' => $data['id'],
           'name' => $data['name'],
           'userName' => $data['userName'],
           'openPassword' => $data['openPassword'],
       );
      if(!$data['id']){
          $params['isOpen'] = 1;
      }

      $res = Conference::saveInfo($params);
      if(!is_numeric($res)){
          return $this->back('添加公会失败');
      }
      if(!$data['id']){
          //保存权限
          $group = array(
              'group_id' => Input::get("group_id",''),
              'group_name' => Input::get('name',''),
              'plat_name' => Input::get('name',''),
              'platform' => $res,
              'menus_nodes' => '{"menus":{"common":{"module_name":"common","module_icon":"","module_alias":"\u9996\u9875","default_url":"common\/home\/index","child_menu":[{"name":"\u4e2a\u4eba\u9996\u9875","url":"common\/home\/index"}]},"conference":{"module_name":"conference","module_icon":"core","module_alias":"\u516c\u4f1a\u6a21\u5757","default_url":"conference\/home\/list","child_menu":[{"name":"\u4e3b\u64ad\u5217\u8868","url":"conference\/anchor\/list"},{"name":"\u6536\u76ca\u5217\u8868","url":"conference\/earnings\/list"}]}},"nodes":["common\/home\/index","common\/home\/index","conference\/anchor\/list","conference\/earnings\/list","conference\/*"]}',
          );
          $group_id = AuthGroup::saveInfo($group);
          if(!is_numeric($group_id)){
              return $this->back('添加权限失败');
          }
          $data['password'] = md5($data['openPassword']);
      }
          //保存用户
       if(Input::get("user_name")!=Input::get("userName")||Input::get("user_password")!=Input::get('openPassword')){
          //获取用户信息
           $admin = array(
               'id' => Input::get('userId',''),
               'username' => Input::get('userName'),
               'password' => Input::get('openPassword'),
               'platform' => $res
           );
           if(!$data['id']){
               $admin['group_id'] = $group_id;
           }
           $result = Admin::saveInfo($admin);
       }


     if($res){
         return $this->redirect('conference/home/list','操作成功');
     }else{
         return $this->back($res['error']);
     }
   }

    public function postAjaxOpen()
    {
        $data = Input::all();
        $res=Conference::saveInfo($data);
        if($res){
            echo json_encode(array('success' => 'true','mess'=>$res));
        }else{
            echo json_encode(array('success' => 'false','mess'=>$res));
        }
    }
    
}