<?php
/**
 * @example      公共路由
 * @file         common.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-14
 * @time         11:16
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */
Route::auth();
Route::get("/",["as"=>"main","middleware"=>["auth"],"uses"=>"Common\MainController@main"]);