<?php
/**
 * @example
 * @file         Channel.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-15
 * @time         11:00
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Auth;


use Illuminate\Foundation\Auth\User;

class Channel extends User
{
    protected $table = "t_channel_config";
    protected $primaryKey = "channel_id";

    protected $fillable = [
        "channel_id",
        "channel_name",
        "channel_contact_phone",
        "login_pwd",
        "cooperation_start_dt",
        "cooperation_end_dt",
        "contract_subject",
        "gathering_type",
        "deposit_bank",
        "gathering_account",
        "remark"
    ];
    protected $hidden = [
        "login_pwd"
    ];

    public function getAuthPassword(){
        return $this->login_pwd;
    }
}