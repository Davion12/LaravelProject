<?php
/**
 * @example
 * @file         Liaison.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-15
 * @time         11:03
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Auth;


use Illuminate\Foundation\Auth\User;

class Liaison extends User
{
    protected $table = "t_promoter_list";
    protected $primaryKey = "promoter_id";

    protected $fillable = [
        "promoter_id", "promoter_name", "promoter_phone", "login_pwd"
    ];
    protected $hidden = [
        "login_pwd"
    ];
    public function getAuthPassword(){
        return $this->login_pwd;
    }
}