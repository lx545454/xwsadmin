<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;
Route::controller('conference/home','modules\conference\controllers\HomeController');
Route::controller('conference/anchor','modules\conference\controllers\AnchorController');
Route::controller('conference/vdo','modules\conference\controllers\VdoController');
Route::controller('conference/earnings','modules\conference\controllers\EarningsController');
Route::controller('conference/help','modules\conference\controllers\HelpController');