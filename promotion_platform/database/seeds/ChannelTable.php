<?php

use Illuminate\Database\Seeder;

class ChannelTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('t_channel_config')->insert([
            'channel_name' => '李四',
            'channel_contact_phone' => "18565847295",
            'login_pwd' => md5(md5("123456")),
            'cooperation_start_dt' => '2018-06-01 00:00:00',
            'cooperation_end_dt' =>'2019-06-01 00:00:00',
            'contract_subject' => "",
            'gathering_type' => '0',
            'deposit_bank' => '中国银行',
            'gathering_account' => '00000000000000',
            'remark' => ""
        ]);
    }
}
