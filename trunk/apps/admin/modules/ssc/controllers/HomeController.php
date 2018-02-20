<?php
namespace modules\ssc\controllers;

use Illuminate\Support\Facades\Input;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Helper\MyHelpLx;
use Youxiduo\Base\AllService;
use Youxiduo\System\Model\Conference;
use Youxiduo\System\Model\AuthGroup;
use Youxiduo\System\Model\Admin;
use Illuminate\Support\Facades\DB;

class HomeController extends BackendController
{
    public $rule = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );
    public function _initialize()
    {
        $this->current_module = 'ssc';
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
//        $res = Conference::getList($search, $pageIndex, $pageSize);
        $res = AllService::excute_cp('cp',array(),"ssc_get_qicis");
        print_r($res);
        if($res['data'])
        {
            $data['datalist'] = $res['data'];
            $total = $res['count'];
        }
        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数

        return $this->display('qici-list',$data);
    }

    public function getQiciDetail()
    {
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 10;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $pageIndex = (int)Input::get('page',1);
//        $res = Conference::getList($search, $pageIndex, $pageSize);
        $res = AllService::excute_cp('cp',array('qici'=>170012),"ssc_get_qici_detail");
        print_r($res);
        if($res['data'])
        {
            $data['datalist'] = $res['data'];
            $total = $res['count'];
        }
        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数

        return $this->display('qici-detail',$data);
    }

    public function getOne(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $count = (int)Input::get('count',30);
        $qici = Input::get('qici',false);
        $res = AllService::excute_cp('cp',array('qici'=>$qici,'count'=>$count),"get_history_2x");
        if($res['data']){
            asort($res['data']['arr1']);
            asort($res['data']['arr2']);
            $res['data']['str1'] = implode(' ',$res['data']['arr1']);
            $res['data']['str2'] = implode(' ',$res['data']['arr2']);

        }
        $data['data'] = $res['data'];



//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('one',$data);
    }

    public function getOne2(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_2x2");
        if(isset($res['data'][2])){
            $res['data'][0] = array_reverse($res['data'][0]);
            $res['data'][1] = array_reverse($res['data'][1]);
            $res['data'][2] = array_reverse($res['data'][2]);
            $sanxin = array();
            for ($j=0;$j<3;$j++){
                $sanxin[$j] = array();
                foreach ($res['data'][$j] as $v){
                    for ($i=0;$i<3;$i++){
                        $str = substr($v['num'],$i,3);
                        if(!in_array($str,$sanxin[$j])){
                            $sanxin[$j][] = $str;
                        }
                    }
                }
            }
            $res['data']['sanxin'] = $sanxin;
            $search['qici'] = $res['data']['qici'];
        }
        $data['data'] = $res['data'];

//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('one2',$data);
    }

    public function getOne3(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_2x3");
        if(isset($res['data'][2])){
            $res['data'][0] = array_reverse($res['data'][0]);
            $res['data'][1] = array_reverse($res['data'][1]);
            $res['data'][2] = array_reverse($res['data'][2]);
            $sanxin = array();
            for ($j=0;$j<3;$j++){
                $sanxin[$j] = array();
                foreach ($res['data'][$j] as $v){
                    for ($i=0;$i<3;$i++){
                        $str = substr($v['num'],$i,3);
                        if(!in_array($str,$sanxin[$j])){
                            $sanxin[$j][] = $str;
                        }
                    }
                }
            }
            $res['data']['sanxin'] = $sanxin;
            $search['qici'] = $res['data']['qici'];
        }
        $data['data'] = $res['data'];

//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('one3',$data);
    }

    public function getDemo(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $count = (int)Input::get('count',30);
        $qici = Input::get('qici',false);
        $res = AllService::excute_cp('cp',array('qici'=>$qici,'count'=>$count),"get_history_2x");
        if($res['data']){
            $res['data']['str1'] = implode(' ',$res['data']['arr1']);
            $res['data']['str2'] = implode(' ',$res['data']['arr2']);
        }
        $data['data'] = $res['data'];



//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('demo',$data);
    }

    public function postAjaxGetdemo(){
        $data = Input::all();
        $res = AllService::excute_cp('cp',$data,"get_demo");
        $str = "";
        if($res['success']){
          foreach ($res['data'] as $k=>$v){
              $str .= $k.">>>>>>>>
";
              foreach ($v as $k1=>$v1){
                    $str .= $v1['qici']." ".$v1['num']."
";
              }
          }
        }
        $res['str'] = $str;
        echo json_encode($res);
    }
    public function getOne3x(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_3x");
        if($res['data'] && isset($res['data']['arr1'])){
            $res['data']['str1'] = implode(' ',$res['data']['arr1']);
            $res['data']['str2'] = implode(' ',$res['data']['arr2']);
            $res['data']['str3'] = implode(' ',$res['data']['arr3']);
            $res['data']['strAll'] = implode(' ',$res['data']['arrAll']);
            $res['data']['arr1_count'] = count($res['data']['arr1']);
            $res['data']['arr2_count'] = count($res['data']['arr2']);
            $res['data']['arr3_count'] = count($res['data']['arr3']);
            $res['data']['arrAll_count'] = count($res['data']['arrAll']);
        }
        $data['data'] = $res['data'];
        $data['rule'] = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );


//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('one3x',$data);
    }

    public function getOne3x3x(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_3x_3x");
//        print_r($res);
        if($res['data'] && isset($res['data']['arr1'])){
            foreach ($res['data']['arr1'] as $k=>&$v){
                $v['stra'] = implode(' ',$v['a']);
                $v['strb'] = implode(' ',$v['b']);
            }
            foreach ($res['data']['arr2'] as $k=>&$v){
                $v['stra'] = implode(' ',$v['a']);
                $v['strb'] = implode(' ',$v['b']);
            }
            foreach ($res['data']['arr3'] as $k=>&$v){
                $v['stra'] = implode(' ',$v['a']);
                $v['strb'] = implode(' ',$v['b']);
            }
        }
        $data['data'] = $res['data'];
        $data['rule'] = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );


//        print_r($res);
//        print_r($data);die;
        $data['search'] = $search;//回调函数

        return $this->display('one3x-3x',$data);
    }

    public function getOne3x7x(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_3x");
        if($res['data'] && isset($res['data']['arr1'])){
            $res['data']['str1'] = implode(' ',$res['data']['arr1_7']);
            $res['data']['str2'] = implode(' ',$res['data']['arr2_7']);
            $res['data']['str3'] = implode(' ',$res['data']['arr3_7']);
            $res['data']['strAll'] = implode(' ',$res['data']['arrAll_7']);
            $res['data']['arr1_count'] = count($res['data']['arr1_7']);
            $res['data']['arr2_count'] = count($res['data']['arr2_7']);
            $res['data']['arr3_count'] = count($res['data']['arr3_7']);
            $res['data']['arrAll_count'] = count($res['data']['arrAll_7']);
        }
        $data['data'] = $res['data'];
        $data['rule'] = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );


//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('one3x-7x',$data);
    }

    public function getXlist(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_2x_list");
        $data['rule'] = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );
        if($res['success']){
            $data['data'] = $res['data'];
            $data['zong'] = count($res['data']);
            $data['bili'] = substr($data['data']['dui']/$data['zong']*100,0,5);
        }


//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('xlist',$data);
    }

    public function getXlist2x3(){
        $data = $search = $input = array();
        $data['data'] = array();
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $res = AllService::excute_cp('cp',$search,"get_history_2x3_list");
        $data['rule'] = array(
            0 => '无',
            1 => '对',
            2 => '不对',
        );
        if($res['success']){
            $data['data'] = $res['data'];
            $data['zong'] = count($res['data']);
            $data['bili1'] = substr($data['data']['dui']/$data['zong']*100,0,5);
            $data['bili2'] = substr($data['data']['duix3']/$data['zong']*100,0,5);
        }


//        print_r($res);
//        print_r($data);
        $data['search'] = $search;//回调函数

        return $this->display('xlist2x3',$data);
    }


    public function getReport(){
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 100;
        $total = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $pageIndex = (int)Input::get('page',1);
//        $res = Conference::getList($search, $pageIndex, $pageSize);
        $res = AllService::excute_cp('cp',array('appkey'=>'32d1e322ab35f21b','caipiaoid'=>'73'),"get_cqssc");
//        print_r($res);
        if(isset($res['data']['result']['list'][0]))
        {

            foreach ($res['data']['result']['list'] as $k=>&$v){
                if(!(strpos($v['number'],'0')===false) || !(strpos($v['number'],'5')===false)){
                    $v['has0'] = 1;
                }
                if(!(strpos($v['number'],'1')===false) || !(strpos($v['number'],'6')===false)){
                    $v['has1'] = 1;
                }
                if(!(strpos($v['number'],'2')===false) || !(strpos($v['number'],'7')===false)){
                    $v['has2'] = 1;
                }
                if(!(strpos($v['number'],'3')===false) || !(strpos($v['number'],'8')===false)){
                    $v['has3'] = 1;
                }
                if(!(strpos($v['number'],'4')===false) || !(strpos($v['number'],'9')===false)){
                    $v['has4'] = 1;
                }
            }

            foreach ($res['data']['result']['list'] as $k=>&$v){
                if(!isset($res['data']['result']['list'][$k+1])){
                    continue;
                }
                $sha = 0;
                $numArr1 = explode(' ',$v['number']);
                $numArr0 = explode(' ',$res['data']['result']['list'][$k+1]['number']);
                //杀号
                foreach ($numArr0 as $i=>$j){
                    $a01 =array();
                    $a01[] = ($j+3)%10;
                    $a01[] = ($j+4)%10;
                    $a01[] = ($j+5)%10;
                    $a01[] = ($j+6)%10;
                    $a01[] = ($j+7)%10;
                    if(in_array($numArr1[$i],$a01)){
                        $sha++;
                    }
                }
                $v['sha'] = $sha;
                //和尾
                if(($numArr0[2]+$numArr0[3]+$numArr0[4])%10==($numArr1[2]+$numArr1[3]+$numArr1[4])%10){
                    $v['hewei'] = "同";
                }else{
                    $v['hewei'] = "不同";
                }

            }
            //二星

            foreach ($res['data']['result']['list'] as $k=>&$v){
                $wanqian_=$qianbai_=$baishi_=$shige="";
                if(!isset($res['data']['result']['list'][$k+7])){
                    continue;
                }
                $arr = array();
                $a1 = explode(' ',$v['number']);
                $a2 = explode(' ',$res['data']['result']['list'][$k+1]['number']);
                $a3 = explode(' ',$res['data']['result']['list'][$k+2]['number']);
                $a4 = explode(' ',$res['data']['result']['list'][$k+3]['number']);
                $a5 = explode(' ',$res['data']['result']['list'][$k+4]['number']);
                $a6 = explode(' ',$res['data']['result']['list'][$k+5]['number']);
                $a7 = explode(' ',$res['data']['result']['list'][$k+6]['number']);
                $a8 = explode(' ',$res['data']['result']['list'][$k+7]['number']);
                $wanqian = array(
                    $a1[0].$a1[1],
                    $a2[0].$a2[1],
                    $a3[0].$a3[1],
                    $a4[0].$a4[1],
                    $a5[0].$a5[1],
                    $a6[0].$a6[1],
                    $a7[0].$a7[1],
                    $a8[0].$a8[1]
                );
                $wanqian_ = "";
                for($i=0;$i<100;$i++){
                    if($i<10){
                        $i='0'.$i;
                    }
                    if(!in_array($i,$wanqian)){
                        $wanqian_ .= $i." ";
                    }

                }
                $v['wanqian'] = $wanqian_;

                $qianbai = array(
                    $a1[1].$a1[2],$a2[1].$a2[2],$a3[1].$a3[2],$a4[1].$a4[2],$a5[1].$a5[2],$a6[1].$a6[2],$a7[1].$a7[2],$a8[1].$a8[2]

                );
                $qianbai_ = "";
                for($i=0;$i<100;$i++){
                    if($i<10){
                        $i='0'.$i;
                    }
                    if(!in_array($i,$qianbai)){
                        $qianbai_ .= $i." ";
                    }
                }
                $v['qianbai'] = $qianbai_;

                $baishi = array(
                    $a1[2].$a1[3],$a2[2].$a2[3],$a3[2].$a3[3],$a4[2].$a4[3],$a5[2].$a5[3],$a6[2].$a6[3],$a7[2].$a7[3],$a8[2].$a8[3]
                );
                $baishi_ = "";
                for($i=0;$i<100;$i++){
                    if($i<10){
                        $i='0'.$i;
                    }
                    if(!in_array($i,$baishi)){
                        $baishi_ .= $i." ";
                    }
                }
                $v['baishi'] = $baishi_;

                $shige = array(
                    $a1[3].$a1[4],$a2[3].$a2[4],$a3[3].$a3[4],$a4[3].$a4[4],$a5[3].$a5[4],$a6[3].$a6[4],$a7[3].$a7[4],$a8[3].$a8[4]

                );
                $shige_ = "";
                for($i=0;$i<100;$i++){
                    if($i<10){
                        $i='0'.$i;
                    }
                    if(!in_array($i,$shige)){
                        $shige_ .= $i." ";
                    }
                }
                $v['shige'] = $shige_;

                if(isset($res['data']['result']['list'][$k-1])){
                    $lastnum = str_replace(' ','',$res['data']['result']['list'][$k-1]['number']);
                    $wq = substr($lastnum,0,2);
                    $qb = substr($lastnum,1,2);
                    $bs = substr($lastnum,2,2);
                    $sg = substr($lastnum,3,2);
                    if(!in_array($wq,$wanqian)){
                        $v['zai1'] = 1;
                    }else{
                        $v['zai1'] = 2;
                    }
                    if(!in_array($qb,$qianbai)){
                        $v['zai2'] = 1;
                    }else{
                        $v['zai2'] = 2;
                    }
                    if(!in_array($bs,$baishi)){
                        $v['zai3'] = 1;
                    }else{
                        $v['zai3'] = 2;
                    }
                    if(!in_array($sg,$shige)){
                        $v['zai4'] = 1;
                    }else{
                        $v['zai4'] = 2;
                    }
                }
            }

            $data['datalist'] = $res['data']['result']['list'];
            $total = $res['count'];
        }
        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数
        $data['rule'] = $this->rule;//回调函数
//        print_r($data['datalist'][3]);die;

        return $this->display('report',$data);
    }

    public function getReport2(){
        $data = $search = $input = array();
        $data['datalist'] = array();
        $pageSize = 100;
        $total = 0;
        $data['yes'] = 0;
        $data['no'] = 0;
        $input = Input::get();
        $search = array_filter($input);//array_filter去空函数
        $pageIndex = (int)Input::get('page',1);
//        $res = Conference::getList($search, $pageIndex, $pageSize);
//        $res = AllService::excute_cp('cp',array('APPKEY'=>'32d1e322ab35f21b','caipiaoid'=>'73'),"get_cqssc");
//        print_r($res);
        $res =  AllService::excute_cp('cp',array('pageSize'=>100),"get_cqssc_num");
        $numHistory =  AllService::excute_cp('cp',array('pageSize'=>40000,'skip'=>1000),"get_cqssc_num");
        $numsArr = explode(' ',$numHistory['data']['nums']);
//        print_r($numHistory);die;
        if(isset($res['data']['numArr'][0]))
        {
            foreach ($res['data']['numArr'] as $k=>&$v){
                $num1 = str_replace(' ','',$v['num']);
                if(in_array($num1,$numsArr)){
                    $v['isornot'] = "对";
                    $data['yes']++;
                }else{
                    $v['isornot'] = "不对";
                    $data['no']++;

                }

            }
            $data['datalist'] = $res['data']['numArr'];
            $total = 1000;
        }
        unset($search['page']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(),$total,$pageSize,$search);
        $data['search'] = $search;//回调函数

        return $this->display('report2',$data);
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