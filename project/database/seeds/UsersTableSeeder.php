<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <= 300; $i++) { 
       
            DB::table('orderinfo')->insert([
                'User_id' => str_random(10),
                'ReceiverName' => str_random(5) ,
                'ReceiverPhone' =>str_random(11),
                'ReceiverAddress' => str_random(10),
                'ReceiverPostCode' => '052260',
                'ReceiverEmails' => str_random(5).'@qq.com',
                'PayType' => '线上',
                'ShipType' => 'asd',
                'GoodsFee' => str_random(2),
                'TotalPrice' => str_random(2),
                'ShipFee' => str_random(1),
                'IsConfirm' => 0,
                'IsPayment' => 1,
                'IsConsignment' => 1

            ]);

         }
    }
}
