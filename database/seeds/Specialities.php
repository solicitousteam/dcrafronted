<?php

use Illuminate\Database\Seeder;

class Specialities extends Seeder
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
                'The Fitness',
            ],
            [
                'Weight loss',
            ],
            [
                'Body Building',
            ],
            [
                'Circuit Training',
            ],
            [
                'Zumba',
            ],
            [
                'Yoga',
            ]
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('specialities')->insert($data->all());
        }
    }
}
