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
              'name'     => 'SSH Admin',
              'dept'     => 1,
              'job'      => 'إدارة النظام',
              'image'    => 'files/employees/avatar.jpg',
              'email'    => 'admin@ssh.com',
              'password' => Hash::make('123456'),
              'role'     => 'admin',
              
            ],
            [
              'name'     => 'Bakri Eissa',
              'dept'     => 2,
              'job'      => 'موظف',
              'image'    => 'files/employees/avatar.jpg',
              'email'    => 'bakri@ssh.com',
              'password' => Hash::make('123456'),
              'role'     => 'user',
              
            ],
          ];
 
         $role = new Role;
          foreach ($users as $key => $user) {
            $newUser = User::updateOrCreate([
                         'email' => $user['email']
                     ], [
                         'name'     => $user['name'],
                         'password' => $user['password'],
                         'dept' => $user['dept']
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
