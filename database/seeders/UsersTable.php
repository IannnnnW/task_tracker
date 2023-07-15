<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Wasukira Ian',
            'role_id'=>1,
            'department_id'=>1,
            'email'=>'ianwasukira@gmail.com',
            'password'=>bcrypt('test@123')
        ]);

        User::create([
            'name'=>'James Author',
            'role_id'=>2,
            'department_id'=>1,
            'email'=>'jamesauthor@gmail.com',
            'password'=>bcrypt('test@123')
        ]);

        User::create([
            'name'=>'Patrice Evra',
            'role_id'=>3,
            'department_id'=>1,
            'email'=>'patricevra@gmail.com',
            'password'=>bcrypt('test@123')
        ]);
    }
}
