<?php

use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'title',
        ]);
        $values = [
            [
                'WiFi',
            ],
            [
                'Parking',
            ],
            [
                'Showers',
            ],
            [
                'Pools',
            ],
            [
                'Basketball Courts',
            ],
            [
                'Tracks',
            ]
        ];
        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('amenity')->insert($data->all());
        }
    }
}
