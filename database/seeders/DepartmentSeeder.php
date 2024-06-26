<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = ['مدير النظام','تقنية المعلومات'];

        foreach ($depts as $dept) {
          Department::create([
            'dept_name'       => $dept,
          ]);
        }
    }
}
