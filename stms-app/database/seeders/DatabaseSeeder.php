<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PostUsers::class);
        $this->call(PostAnnouncements::class);
        $this->call(postFQA::class);
        $this->call(postTrainingCompanies::class);
        $this->call(Postrequests::class);
        // $this->call(Postreports::class);
    }
}
