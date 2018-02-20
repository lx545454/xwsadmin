<?php
namespace modules\common\controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

use Youxiduo\Base\AllService;
use Yxd\Modules\Core\BackendController;
use Youxiduo\System\AuthService;
use Youxiduo\System\Model\Admin;
use Youxiduo\System\Model\AuthGroup;
use Youxiduo\Helper\MyHelpLx;


class HomeController extends BackendController
{
    public function _initialize()
	{
		$this->current_module = 'common';
	}
	
	public function getIndex()
	{
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 1;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $search['page'] = Input::get('page',1);
        $search['pageSize'] = (int)Input::get('pageSize',$pageSize);
        $res = AllService::excute_cp('cp',$search,"fangan_getList");
        if($res['data'])
        {
            $data['datalist'] = $res['data'];
        }


        return $this->display('qici-one',$data);
	}

    public function getList()
    {
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 10;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $search['page'] = Input::get('page',1);
        $search['pageSize'] = (int)Input::get('pageSize',$pageSize);
        $res = AllService::excute_cp('cp',$search,"fangan_getList");
//        print_r($res);die;
        if($res['data'])
        {
            $data['datalist'] = $res['data'];
        }

        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数

        return $this->display('qici-list',$data);
    }

    public function getAdd()
    {
        $data = array();
        $input = Input::get();
        if (isset($input['id']) && $input['id'] > 0) {
            $res = AllService::excute_cp( 'cp',$input,'fangan_get');
            if ($res) {
                $data['data'] = $res['data'];
            }
        }
        return $this->display('add', $data);
    }

    public function postAdd(){
        $data=array_filter(Input::all());
        $res = AllService::excute_cp( 'cp',$data,'fangan_save');
        if($res){
            return $this->redirect('common/home/list','操作成功');
        }else{
            return $this->back($res['error']);
        }
    }
	public function getEditProfile()
	{
		$admin_id = $this->current_user['id'];
		$data = array();
		$data['admininfo'] = Admin::getInfoById($admin_id);
		$groups = AuthGroup::getNameList();		
		$data['groups'] = $groups;
		$data['is_super'] = AuthService::verifyNodeAuth('admin/admin/modify-pwd');
		return $this->display('profile',$data);
	}
	
	public function postEditProfile()
	{
	    $input = Input::only('username','authorname','realname','password');
	    $input['id'] = $this->current_user['id'];
		if($input['id']){
			unset($input['username']);
		}
		if(empty($input['password'])){
			unset($input['password']);
		}
		if(isset($input['username'])&&$input['username']){
			$exists = Admin::getInfoByUsername($input['username']);
			if($exists){
				return $this->back('账号名已经存在');
			}
		}

		$result = Admin::saveInfo($input);
		if($result){
			return $this->redirect('common/home/edit-profile','账号保存成功');
		}else{
			return $this->back('账号保存成功');
		}
	}
}