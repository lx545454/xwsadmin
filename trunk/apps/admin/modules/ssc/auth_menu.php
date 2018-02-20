<?php
use Illuminate\Support\Facades\Lang;
return array(
    'module_name'  => 'ssc',
    'module_alias' => '时时彩',
    'module_icon'  => 'core',
    'default_url'=>'ssc/home/list',
    'child_menu' => array(
        array('name'=>'期次列表','url'=>'ssc/home/list'),
        array('name'=>'重庆时时彩','url'=>'ssc/home/report'),
        array('name'=>'二星','url'=>'ssc/home/one'),
        array('name'=>'前中后三','url'=>'ssc/home/one2'),
        array('name'=>'前中后三x','url'=>'ssc/home/one3'),
        array('name'=>'前中后三x报表','url'=>'ssc/home/xlist2x3'),
        array('name'=>'二星报表','url'=>'ssc/home/xlist'),
        array('name'=>'二星3x','url'=>'ssc/home/one3x'),
        array('name'=>'二星3x-7x','url'=>'ssc/home/one3x7x'),
        array('name'=>'二星3x-3x','url'=>'ssc/home/one3x3x'),
        array('name'=>'通用查询','url'=>'ssc/home/demo'),
    ),
    'extra_node'=>array(
        array('name'=>'彩票权限','url'=>'ssc/*'),
    )
);