<?php

use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
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
                'Cardio Machine',
            ],
            [
                'Group Exercise',
            ],
            [
                'Resistance Machine',
            ],
            [
                'Fitness Studio',
            ],
            [
                'Free Weights',
            ],
            [
                'Sauna',
            ],
            [
                'Towels',
            ]
        ];
        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('facilities')->insert($data->all());
        }
    }
}
