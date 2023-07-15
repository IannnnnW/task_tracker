<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        Department::create([
            'name'=>'Information Services',
        ]);
        Department::create([
            'name'=>'Human Resource',
        ]);
        Department::create([
            'name'=>'Prevention, Care and Treatment',
        ]);
        Department::create([
            'name'=>'Executive Director\'s Office',
        ]);
        Department::create([
            'name'=>'Research',
        ]);
        Department::create([
            'name'=>'Health Systems Strengthening',
        ]);
        Department::create([
            'name'=>'Strategic Planning and Business Development',
        ]);
        Department::create([
            'name'=>'Global Health Security',
        ]);
        Department::create([
            'name'=>'Training and Capacity Development',
        ]);
        Department::create([
            'name'=>'Finance and Administration',
        ]);
    }
}
