<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    //
    protected $table = "t_promoter_list";

    protected $primaryKey = "promoter_id";

    protected $fillable =[
        "promoter_id",
        "promoter_name",
        "promoter_phone",
        "login_pwd",
        "created_dt",
        "updated_dt"
    ];

    public function updPassword($phoneNum, $password)
    {
        return $this->where("promoter_phone", $phoneNum)
            ->update(["login_pwd" => $password, "update_dt" => date("Y-m-d H:i:s")]);
    }

}
