<?php
use Illuminate\Support\Facades\Lang;
return array(
    'module_name'  => 'conference',
    'module_alias' => '公会模块',
    'module_icon'  => 'core',
    'default_url'=>'conference/home/list',
    'child_menu' => array(
        array('name'=>'公会列表','url'=>'conference/home/list'),
        array('name'=>'主播列表','url'=>'conference/anchor/list'),
        array('name'=>'收益列表','url'=>'conference/earnings/list'),
    ),
    'extra_node'=>array(
        array('name'=>'全部推广模块权限','url'=>'conference/*'),
    )
);