<?php
namespace modules\tuiguang\controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Log;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Cms\WebGameService;
use Youxiduo\Tuiguang\TuiguangService;

class HelpController extends BackendController
{

    public static function postAjaxDo()
    {
        $data = Input::get();
        $res = TuiguangService::v4excute($data,$data['url'],true);
        echo json_encode($res);
    }

}