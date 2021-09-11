<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'employee_name'=>'田中Aさん',
                'employee_img_path'=>'',
            ],
            [
                'employee_name'=>'田中Bさん',
                'employee_img_path'=>'',
            ],
            [
                'employee_name'=>'山田Aさん',
                'employee_img_path'=>'',
            ],
            [
                'employee_name'=>'山田Bさん',
                'employee_img_path'=>'',
            ],
        ];
        DB::table('m_employees')->insert($params);
    }
}
