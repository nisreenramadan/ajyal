<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $role = Role::create(['name' => 'Student']);
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Teacher']);
    }
}
