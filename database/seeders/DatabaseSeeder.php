<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $storage = Storage::disk('public');

        if ($storage->exists('/images')) {
            $storage->deleteDirectory('/images');
        }

        User::factory()->create([
            'email' => 'admin@admin.com',
        ]);

         User::factory(10)->create();


         Company::factory(10)
             ->has(Employee::factory(15))
             ->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
