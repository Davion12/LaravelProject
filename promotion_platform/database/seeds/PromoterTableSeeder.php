<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PromoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('t_promoter_list')->insert([
            'promoter_name' => '张三',
            'promoter_phone' => "18798009940",
            'login_pwd' => md5(md5("123456"))
        ]);
    }
}
