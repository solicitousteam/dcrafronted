<?php

use Illuminate\Database\Seeder;

class TrainingPlaces extends Seeder
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
                'Home',
            ],
            [
                'Park',
            ],
            [
                'Workplace',
            ],
            [
                'Gym',
            ]
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('training_places')->insert($data->all());
        }
    }
}
