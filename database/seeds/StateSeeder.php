<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'state_name',
            'status',
        ]);
        $values = [
            [
                'Gujarat',
                'active',
            ],
            [
                'Maharastra',
                'active',
            ],
            [
                'Karnataka',
                'active',
            ],
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('states')->insert($data->all());
        }

    }
}
