<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
              'name'     => 'IASS Admin',
              'job'      => 'إدارة النظام',
              'image'    => 'files/employees/avatar.jpg',
              'email'    => 'admin@iass.com',
              'password' => Hash::make('iass@admin'),
              'role'     => 'admin',
              
            ],
            [
              'name'     => 'Bakri Eissa',
              'job'      => 'موظف',
              'image'    => 'files/employees/avatar.jpg',
              'email'    => 'bakri@iass.com',
              'password' => Hash::make('bakri@iass'),
              'role'     => 'user',
              
            ],
          ];
 
         $role = new Role;
          foreach ($users as $key => $user) {
            $newUser = User::updateOrCreate([
                         'email' => $user['email']
                     ], [
                         'name'     => $user['name'],
                         'password' => $user['password']
                     ]);
 
                     if ($newUser->id == 1) {
                         $role = $role->updateOrCreate(['name' => 'admin']);
                     } else {
                         $role = $role->updateOrCreate(['name' => 'user']);
                     }
 
                    $permissions = Permission::pluck('id')->toArray();
 
                    $role->syncPermissions($permissions);
                    $newUser->assignRole([$role->id]);
          }
    }
}
