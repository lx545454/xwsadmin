<?php
use Illuminate\Support\Facades\Lang;
return array(
    'module_name'  => 'common',
    'module_alias' => '首页',
    'module_icon'  => '',
    'default_url'=>'common/home/index',
    'child_menu' => array(   
        array('name'=>'个人首页','url'=>'common/home/index'),
        array('name'=>'添加','url'=>'common/home/add'),
        array('name'=>'列表','url'=>'common/home/list')
    ),
    'extra_node'=>array(  
        array('name'=>'个人首页','url'=>'common/home/index'),
        array('name'=>'添加','url'=>'common/home/add'),
        array('name'=>'列表','url'=>'common/home/list'),

    )
);