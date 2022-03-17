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
        $owner = Role::firstOrCreate(['name' => 'owner']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $student = Role::firstOrCreate(['name' => 'student']);


        Permission::firstOrCreate(['name' => 'view any reviews count'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view visitors count'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'delete user'])->assignRole([$owner]);
        Permission::firstOrCreate(['name' => 'create posts'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'update posts'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete posts'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view posts'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create likes'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'delete likes'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'view likes'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create comments'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'edit comments'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'delete comments'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'view comments'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create badges'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete badges'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view badges'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create courses'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'edit courses'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete courses'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view courses'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create lectures'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'add finished_at lectures'])->assignRole([$student]);
        Permission::firstOrCreate(['name' => 'delete lectures'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view lectures'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'create categories'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete categories'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view categories'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'add books'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete books'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view books'])->assignRole([$owner, $manager, $teacher, $student]);
        Permission::firstOrCreate(['name' => 'add authors'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'delete authors'])->assignRole([$owner, $manager, $teacher]);
        Permission::firstOrCreate(['name' => 'view authors'])->assignRole([$owner, $manager, $teacher, $student]);



        User::firstOrCreate([
            'email' => 'admin@ajyal.com',
        ], [
            'name' => 'Owner',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'scientific_grade' ,
            'scientific_certificate' ,
        ])->assignRole($owner);


        User::firstOrCreate([
            'email' => 'manager@ajyal.com',
        ], [
            'name' => 'Manager',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'scientific_grade' ,
            'scientific_certificate' ,

        ])->assignRole($manager);

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

