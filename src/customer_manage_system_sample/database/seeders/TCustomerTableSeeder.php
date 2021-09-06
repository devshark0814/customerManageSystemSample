<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $params = [
            [
                'customer_name'=>'石山 敬史',
                'customer_name_kana'=>'イシヤマ タカシ',
                'sex'=>'1',
                'birthday'=>'1976/01/16',
                'tel_home'=>'0422634000',
                'tel_celler'=>'09089633228',
                'e_mail'=>'takasi1976@web.ad.jp',
                'post_code'=>'1970825',
                'address'=>'東京都あきる野市雨間3-5-5-4F',
                'address_kana'=>'トウキョウトアキルノシアメマ','status' => 1
            ],
            [
                'customer_name'=>'堀口 繁造',
                'customer_name_kana'=>'ホリグチ シゲゾウ',
                'sex'=>'1',
                'birthday'=>'1982/08/05',
                'tel_home'=>'0726817317',
                'tel_celler'=>'09052407787',
                'e_mail'=>'horiguti.sigezou@eaccess.net',
                'post_code'=>'5731165',
                'address'=>'大阪府枚方市都丘町5-12-1',
                'address_kana'=>'オオサカフヒラカタシミヤコガオカチョウ','status' => 1
            ],
            [
                'customer_name'=>'岡 三光',
                'customer_name_kana'=>'オカ ミツテル',
                'sex'=>'1',
                'birthday'=>'1989/05/23',
                'tel_home'=>'0487852634',
                'tel_celler'=>'09036985851',
                'e_mail'=>'oka.mituteru@asp.home.ne.jp',
                'post_code'=>'3360973',
                'address'=>'埼玉県さいたま市緑区南部領辻1-10-7',
                'address_kana'=>'サイタマケンサイタマシミドリクナンブリョウツジ','status' => 1
            ],
            [
                'customer_name'=>'浜野 益三',
                'customer_name_kana'=>'ハマノ マスゾウ',
                'sex'=>'1',
                'birthday'=>'1990/02/16',
                'tel_home'=>'0566303766',
                'tel_celler'=>'09082969065',
                'e_mail'=>'test@example.com',
                'post_code'=>'4470856',
                'address'=>'愛知県碧南市宮後町3-8-7',
                'address_kana'=>'アイチケンヘキナンシミヤゴマチ','status' => 1
            ],
            [
                'customer_name'=>'須藤 準一郎',
                'customer_name_kana'=>'ストウ ジュンイチロウ',
                'sex'=>'1',
                'birthday'=>'1973/01/16',
                'tel_home'=>'0734411437',
                'tel_celler'=>'09028068563',
                'e_mail'=>'sutou_junitirou@ocn.ne.jp',
                'post_code'=>'6401244',
                'address'=>'和歌山県海草郡紀美野町福田2202',
                'address_kana'=>'ワカヤマケンカイソウグンキミノチョウフクダ','status' => 1
            ],
            [
                'customer_name'=>'大木 貫之',
                'customer_name_kana'=>'オオキ カンジ',
                'sex'=>'1',
                'birthday'=>'1986/05/19',
                'tel_home'=>'0166625808',
                'tel_celler'=>'09051355620',
                'e_mail'=>'kanzi078@tcom.ne.jp',
                'post_code'=>'0788273',
                'address'=>'北海道旭川市工業団地三条5-12-4',
                'address_kana'=>'ホッカイドウアサヒカワシコウギョウダンチ３ジョウ','status' => 1
            ],
            [
                'customer_name'=>'小谷 れいや',
                'customer_name_kana'=>'コタニ レイヤ',
                'sex'=>'1',
                'birthday'=>'1971/02/07',
                'tel_home'=>'0333577009',
                'tel_celler'=>'09015328365',
                'e_mail'=>'ktn_riy@dti.ne.jp',
                'post_code'=>'1350016',
                'address'=>'東京都江東区東陽7-1-7 メゾン東陽 603号室',
                'address_kana'=>'トウキョウトコウトウクトウヨウ','status' => 1
            ],
            [
                'customer_name'=>'小松 貞郎',
                'customer_name_kana'=>'コマツ サダオ',
                'sex'=>'1',
                'birthday'=>'1991/12/04',
                'tel_home'=>'0246271199',
                'tel_celler'=>'09075487789',
                'e_mail'=>'komatu91@infoseek.co.jp',
                'post_code'=>'9600648',
                'address'=>'福島県伊達市保原町東小蓋9-7-9',
                'address_kana'=>'フクシマケンダテシホバラマチヒガシコブタ','status' => 1
            ],
            [
                'customer_name'=>'野田 達生',
                'customer_name_kana'=>'ノダ タツオ',
                'sex'=>'1',
                'birthday'=>'1979/01/14',
                'tel_home'=>'0224739627',
                'tel_celler'=>'09060234059',
                'e_mail'=>'noda.tatuo@tokyo24.com',
                'post_code'=>'9812142',
                'address'=>'宮城県伊具郡丸森町飯泉8-4-3',
                'address_kana'=>'ミヤギケンイググンマルモリマチイイセン','status' => 1
            ],
            [
                'customer_name'=>'東 志奈',
                'customer_name_kana'=>'ヒガシ シナ',
                'sex'=>'2',
                'birthday'=>'1986/09/26',
                'tel_home'=>'0250443834',
                'tel_celler'=>'09015317919',
                'e_mail'=>'sina9591632@tokyo24.com',
                'post_code'=>'9591632',
                'address'=>'新潟県五泉市中川新2-14-6 ハイツドリーム中川新 10F',
                'address_kana'=>'ニイガタケンゴセンシナカガワシン','status' => 1
            ]
        ];
        DB::table('t_customers')->insert($params);
    }
}
