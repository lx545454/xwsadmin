<?php
namespace modules\conference\controllers;

use Illuminate\Support\Facades\Input;
use Youxiduo\Base\AllService;
use Youxiduo\System\Model\Anchor;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Helper\MyHelpLx;


class EarningsController extends BackendController
{
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
            $roomId = '';
            foreach ($res['data'] as $i){
                $roomId .= $i['roomId'] . ',';
            }
            $roomId = rtrim($roomId, ',');
            if ($roomId) {
                $resData = AllService::excute_lion("lion",array('room_ids'=>$roomId),'lion/gonghui/rooms_income');

                foreach ($resData['data']['list'] as $key => &$value) {
                    $value['duration'] = $this->getTimeByUnixTime($value['duration']);
                    $value['name'] = Anchor::getCNameByRoomId($value['room_id']);
                }

                if(isset($resData['data']['list'])){
                    $data['datalist'] = $resData['data']['list'];
                }
            }

            $total = $res['count'];
            $totalRes = Anchor::getList($search, 1, $total);
            $totalRoomId = '';
            foreach ($totalRes['data'] as $it){
                $totalRoomId .= $it['roomId'] . ',';
            }
            $totalRoomId = rtrim($totalRoomId, ',');
            if ($totalRoomId) {
                $totalResData = AllService::excute_lion("lion",array('room_ids'=>$totalRoomId),'lion/gonghui/rooms_income');
                $data['total_coin'] = $totalResData['data']['total_coin'];
                $data['total_cash'] = $totalResData['data']['total_cash'];
            }
        }
        unset($search['page']);
        unset($search['pageIndex']);//pager不能有‘page'参数
        $data['pagelinks'] = MyHelpLx::pager(array(), $total, $pageSize, $search);
        $data['search'] = $search;//回调函数
        return $this->display('earnings-list', $data);
    }

    public function getExcel()
    {
        $admin = $this->getSessionData('youxiduo_admin');//管理员信息
        $pageSize = 9999;
        $search['name'] = Input::get('name');
        $search['roomId'] = Input::get('roomId');
        $search = array_filter($search);//array_filter去空函数
        if(isset($admin['platform']) && $admin['platform']){
            $search['cId'] = $admin['platform'];
        }
        $res = Anchor::getList($search, 1, $pageSize);
        if(isset($res['data'])){
            $roomId = '';
            foreach ($res['data'] as $i){
                $roomId .= $i['roomId'] . ',';
            }
            $roomId = rtrim($roomId, ',');
            if ($roomId) {
                $resData = AllService::excute_lion("lion",array('room_ids'=>$roomId),'lion/gonghui/rooms_income');

                foreach ($resData['data']['list'] as $key => &$value) {
                    $value['duration'] = $this->getTimeByUnixTime($value['duration']);
                    $value['name'] = Anchor::getCNameByRoomId($value['room_id']);
                }

                if(isset($resData['data']['list'])){
                    $data['dataList'] = $resData['data']['list'];
                }
//                $data['total_coin'] = $resData['data']['total_coin'];
//                $data['total_cash'] = $resData['data']['total_cash'];
            }

        }

//        dd($data['dataList']);
        require_once base_path() . '/libraries/PHPExcel.php';
        $excel = new \PHPExcel();
        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $excel->getActiveSheet()->setTitle('收益');
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $excel->getActiveSheet()->setCellValue('A1','UID');
        $excel->getActiveSheet()->setCellValue('B1','主播昵称');
        $excel->getActiveSheet()->setCellValue('C1','房间ID');
        $excel->getActiveSheet()->setCellValue('D1','公会名称');
        $excel->getActiveSheet()->setCellValue('E1','时长');
        $excel->getActiveSheet()->setCellValue('F1','狮毛');
        $excel->getActiveSheet()->setCellValue('G1','狮牙');
        $excel->getActiveSheet()->freezePane('A2');
        foreach($data['dataList'] as $index => $row){
            $excel->getActiveSheet()->setCellValue('A'.($index+2), $row['uid']);
            $excel->getActiveSheet()->setCellValue('B'.($index+2), $row['nickname']);
            $excel->getActiveSheet()->setCellValue('C'.($index+2), $row['room_id']);
            $excel->getActiveSheet()->setCellValue('D'.($index+2), $row['name']);
            $excel->getActiveSheet()->setCellValue('E'.($index+2), $row['duration']);
            $excel->getActiveSheet()->setCellValue('F'.($index+2), $row['coin']);
            $excel->getActiveSheet()->setCellValue('G'.($index+2), $row['cash']);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. date('Y-m-d').'收益列表.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($excel,'Excel2007');
        $writer->save('php://output');
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