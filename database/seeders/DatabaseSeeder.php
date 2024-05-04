<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Penduduk;
use App\Models\Role;
use App\Models\User;
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
        $this->call( [PendudukSeeder::class] );
        Role::factory()->create( [ 
            'kedudukan' => 'Administrator',
        ] );
        Role::factory()->create( [ 
            'kedudukan' => 'Kaur Pemerintah',
        ] );
        User::factory()->create( [ 
            'roles_id' => '1',
            'name'     => 'Farah Zhafirah',
            'username' => 'farah',
            'password' => 'admin123'
        ] );

    }
}
