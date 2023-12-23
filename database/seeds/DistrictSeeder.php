<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'state_id',
            'district_name',
            'status',
        ]);
        $values = [
            [
                '1',
                'Ahmedabad',
                'active',
            ],
            [
                '1',
                'Rajkot',
                'active',
            ],
            [
                '1',
                'Jungadh',
                'active',
            ],
            [
                '1',
                'Jamnagar',
                'active',
            ],
            [
                '1',
                'Bhavnagar',
                'active',
            ],
            [
                '2',
                'Nasik',
                'active',
            ],
            [
                '2',
                'Mumbai',
                'active',
            ],
            [
                '2',
                'Pune',
                'active',
            ],
            [
                '2',
                'Sorath',
                'active',
            ],
            [
                '3',
                'Banglore',
                'active',
            ],
            [
                '3',
                'Bagalkot',
                'active',
            ],
            [
                '3',
                'Chikballapur',
                'active',
            ],
            [
                '3',
                'Belagavi ',
                'active',
            ],
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('districts')->insert($data->all());
        }

    }
}
