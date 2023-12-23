<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'name',
            'username',
            'password',
            'profile_image',
            'email',
            'type',
            'country_code',
            'mobile',
        ]);
        $values = [
            [
                'admin',
                'admin',
                '$2y$10$xSE0bKpmdgEHEe0rjpudB.3NiTFBnHqOW/0/EvvKpaY7Fx5nldgfq',
                get_constants('default.user_image'),
                'admin@gmail.com',
                'admin',
                '+91',
                '',
            ]
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('users')->insert($data->all());
        }

    }
}
