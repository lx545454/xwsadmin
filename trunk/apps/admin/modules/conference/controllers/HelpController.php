<?php
namespace modules\conference\controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Log;
use Youxiduo\System\Model\Conference;
use Yxd\Modules\Core\BackendController;
use Youxiduo\Cms\WebGameService;

class HelpController extends BackendController
{

    public static function postAjaxDo()
    {
        $data = Input::get();
        $res = Conference::v4excute($data,$data['url'],true);
        echo json_encode($res);
    }

}