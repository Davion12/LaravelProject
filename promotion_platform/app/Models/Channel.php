<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //对应渠道商表格
    protected $table = "t_channel_config";

    protected $primaryKey = "channel_id";

    protected $fillable =[
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
        "remark",
        "created_dt",
        "updated_dt"
    ];

    public function updPassword($phoneNum, $password)
    {
        return $this->where("channel_contact_phone", $phoneNum)
            ->update(["login_pwd" => $password, "update_dt" => date("Y-m-d H:i:s")]);
    }


}
