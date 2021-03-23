<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->delete();
        $usercount = DB::table('users')->where('email', 'admin@gmail.com')->count();
        // Role::create(['name' => 'User']);
        Role::create(['name' => 'Owner']);
        if($usercount == 0){
            $user = User::create([
                'first_name' => 'Venue',
                'last_name' => 'Booking',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('pass@admin'),
                'social_type' => 'Website',
                'social_id' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $role = Role::create(['name' => 'Administrator']);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
        }

        //create User role
        $customercount = DB::table('users')->where('email', 'customer@gmail.com')->count();
        if($usercount == 0){
            $customer = User::create([
                'first_name' => 'test',
                'last_name' => 'user',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('123456'),
                'social_type' => 'Website',
                'social_id' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $role = Role::create(['name' => 'User']);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);

            $customer->assignRole([$role->id]);
        }
    }
}