<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $student = Role::firstOrCreate(['name' => 'student']);


        Permission::firstOrCreate(['name' => 'view any reviews count'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'view visitors count'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'delete user'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'edit user'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'create user'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'create posts'])->assignRole([ $teacher]);
        Permission::firstOrCreate(['name' => 'edit posts'])->assignRole([ $teacher]);
        Permission::firstOrCreate(['name' => 'delete posts'])->assignRole([$teacher]);
        Permission::firstOrCreate(['name' => 'view posts'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create likes'])->assignRole([$student]);
        Permission::firstOrCreate(['name' => 'view likes'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create comments'])->assignRole([ $student]);
        Permission::firstOrCreate(['name' => 'edit comments'])->assignRole([ $student]);
        Permission::firstOrCreate(['name' => 'delete comments'])->assignRole([ $student]);
        Permission::firstOrCreate(['name' => 'view comments'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create badges'])->assignRole([$admin, $teacher]);
        Permission::firstOrCreate(['name' => 'delete badges'])->assignRole([$admin, $teacher]);
        Permission::firstOrCreate(['name' => 'view badges'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create courses'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'edit courses'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'delete courses'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'view courses'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create lectures'])->assignRole([$teacher]);
        Permission::firstOrCreate(['name' => 'edit lectures'])->assignRole([$teacher]);
        Permission::firstOrCreate(['name' => 'delete lectures'])->assignRole([$teacher]);
        Permission::firstOrCreate(['name' => 'views lectures'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'add finished_at lectures'])->assignRole([$student]);
        Permission::firstOrCreate(['name' => 'create categories'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'delete categories'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'view categories'])->assignRole([$admin, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create books'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'delete books'])->assignRole([$admin]);
        Permission::firstOrCreate(['name' => 'view books'])->assignRole([$admin, $teacher, $student]);



        User::firstOrCreate([
            'email' => 'admin@ajyal.com',
        ], [
            'name' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'scientific_grade' ,
            'scientific_certificate' ,
        ])->assignRole($admin);


        User::firstOrCreate([
            'email' => 'teacher@ajyal.com',
        ], [
            'name' => 'Teacher',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'scientific_grade' ,
            'scientific_certificate' ,

        ])->assignRole($teacher);


        User::firstOrCreate([
            'email' => 'student@ajyal.com',
        ], [
            'name' => 'Student',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'age',


        ])->assignRole($student);

        }
    }

