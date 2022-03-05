<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Client $client, Area $area)
    {

        $area->create([
            'country_code' => 0,
            'prefecture_code' => 0,
            'municipality_code'     => "00000",
            'municipality'          => "その他",
        ]);

        /**
         * 実装の参考
         * https://qiita.com/namizatork/items/2f227184d1c2f1eb0e15
         */
        for ($prefecture_id = 1; $prefecture_id <= 47; $prefecture_id++) {
            // 外部API全国地方公共団体コード
            $api = 'https://www.land.mlit.go.jp/webland/api/CitySearch?area=' . str_pad($prefecture_id, 2, 0, STR_PAD_LEFT);
            $response_data = $client->request('GET', $api);
            $response_body = json_decode($response_data->getBody()->getContents(), true);

            if ($response_body['status'] === 'OK') {
                foreach ($response_body['data'] as $response_body) {
                    $area->create([
                        'country_code' => 81,
                        'prefecture_code' => $prefecture_id,
                        'municipality_code'     => $response_body['id'],
                        'municipality'          => $response_body['name']
                    ]);
                }
            }
        }
    }
}