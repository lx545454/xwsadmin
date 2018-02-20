<?php
use Illuminate\Support\Facades\Lang;
return array(
    'module_name'  => 'tuiguang',
    'module_alias' => '推广',
    'module_icon'  => 'core',
    'default_url'=>'tuiguang/home/commission',
    'child_menu' => array(
        
        array('name'=>'推广员','url'=>'tuiguang/home/promoter'),
        array('name'=>'推广用户','url'=>'tuiguang/home/user'),
        array('name'=>'游戏直充流水','url'=>'tuiguang/home/money-recordsdk'),
        array('name'=>'多游分成流水','url'=>'tuiguang/home/money-record'),
        array('name'=>'提现管理','url'=>'tuiguang/home/commission'),
      //array('name'=>'游币流水','url'=>'tuiguang/home/yb-record'),
        array('name'=>'统一分成设置','url'=>'tuiguang/home/commission-setupduoyou'),
        array('name'=>'直充分成设置','url'=>'tuiguang/home/commission-setupsdk'),
        array('name'=>'最低提现金额','url'=>'tuiguang/home/commission-setuplimit'),
        array('name'=>'游戏充值分成','url'=>'tuiguang/home/commission-gamelist'),
        array('name'=>'游戏直冲分成','url'=>'tuiguang/home/commission-gamelistsdk'),
      //array('name'=>'365交易分成','url'=>'tuiguang/home/transaction-list'),
    ),
    'extra_node'=>array(
        array('name'=>'全部推广模块权限','url'=>'tuiguang/*'),
    )
);