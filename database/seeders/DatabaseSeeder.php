<?php

namespace Database\Seeders;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // id's are set to make it easier when testing and debugging

        $this->call([CourseSeeder::class]);

        User::factory()->create([
            'id' => 142,
            'name' => 'Jimmy Peters',
            'email' => 'jimmy@example.com',
        ]);

        User::factory(3)->create();

        ToDo::create(['id' => 487, 'name' => 'First todo...', 'position' => 0]);
        ToDo::create(['name' => 'Second todo...', 'position' => 1]);
        ToDo::create(['name' => 'Third todo...', 'position' => 4]);
        ToDo::create(['name' => 'Fourth todo...', 'position' => 3]);
        ToDo::create(['name' => 'Fifth todo...', 'position' => 2]);
    }
}
