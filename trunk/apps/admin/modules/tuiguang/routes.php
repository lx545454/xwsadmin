<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;
Route::controller('tuiguang/home','modules\tuiguang\controllers\HomeController');
Route::controller('tuiguang/help','modules\tuiguang\controllers\HelpController');