<?php

use App\Restdata;
use Illuminate\Database\Seeder;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'message' => 'Google Japan',
            'url' => 'http://www.google.co.jp',
        ];
        $restdata = new Restdata();
        $restdata->fill($param)->save();
        $param = [
            'message' => 'Yahoo Japan',
            'url' => 'http://www.yahoo.co.jp',
        ];
        $restdata = new Restdata();
        $restdata->fill($param)->save();
        $param = [
            'message' => 'MSN Japan',
            'url' => 'http://www.msn.com/ja-jp',
        ];
        $restdata = new Restdata();
        $restdata->fill($param)->save();
    }
}
