<?php

namespace Database\Seeders;

use App\Models\Restdata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $params = [
        //     [
        //         'message' => 'Google Japan',
        //         'url' => 'https://www.google.co.jp'
        //     ],
        //     [
        //         'message' => 'Yahoo Japan',
        //         'url' => 'https://www.yahoo.co.jp'
        //     ],
        //     [
        //         'message' => 'MSN Japan',
        //         'url' => 'https://www.msn.com/ja-jp'
        //     ],
        // ];
        //配列を回そうとするも、最後のMSNしか入らない（上書きされている）
        // $restdata = new Restdata;
        // for ($i = 0; $i >= count($params); $i++) {
        //     $restdata->fill($params[$i])->save();
        // };
        $param = [
            'message' => 'Google Japan',
            'url' => 'https://www.google.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();

        $param = [
            'message' => 'Yahoo Japan',
            'url' => 'https://www.yahoo.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        $param = [
            'message' => 'MSN Japan',
            'url' => 'https://www.msn.com/ja-jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
    }
}
