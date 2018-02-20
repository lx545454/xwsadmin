<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Youxiduo\Base\AllService;

use Youxiduo\System\AuthService;
use Youxiduo\System\Model\Conference;

class IndexController extends Controller
{

    public function getIndex(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数

        $res = AllService::excute_cp('cp',array('test'=>"test"),"ssc_get_qicis");
        foreach ($res['data'] as $k=>&$v){
            if($k==0){
                $v['cur'] = '1';
            }else{
                $v['cur'] = '0';
            }
            $v['arr'] = array();
            $i = 0;
            while (true){
                $v['arr'][] = substr($v['number'],$i,1);
                if($i==8){
                    break;
                }
                $i+=2;
            }
        }

        $data['data'] = $res['data'];

//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数
        return View::make('index',$data);

    }


	public function postDo()
	{
		$email = Input::get('email');
		$pwd   = Input::get('pwd');
		$remember = false;
		$admin = AuthService::doLogin($email,$pwd,$remember);
		if($admin===false){
			return $this->redirect('login','账号或密码错误');
		}elseif(is_array($admin)){
            $platform = isset($admin['platform']) ? $admin['platform'] : "";
            if($platform){
                $res = Conference::getInfo($platform);
                if($res && isset($res['isOpen'])){
                    if($res['isOpen'] != 1){
                        return $this->redirect('login','公会['.$res['name'].']被禁用');
                    }
                }else{
                    return $this->redirect('login','公会['.$res['name'].']已经不存在');
                }
            }
			if(isset($admin['cookie'])){
				return $this->redirect('common/home/index','登录成功')->withCookie($admin['cookie']);
			}						
			return $this->redirect('common/home/index','登录成功');
		}
		return $this->redirect('login','账号或密码错误');		
	}
	
	public function getLogout()
	{
// 		$cookie = AuthService::doLogout();
		return $this->redirect('login');
	}
	
    /**
	 * 跳转
	 * @param string $route 路由URI
	 * @param string $tips 提示信息
	 */
	protected function redirect($route,$tips='')
	{
		if($tips){
			return Redirect::to($route)->with('global_tips',$tips);
		}
		return Redirect::to($route);
	}
}