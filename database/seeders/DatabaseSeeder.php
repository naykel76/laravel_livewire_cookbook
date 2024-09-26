<?php

namespace Database\Seeders;

use App\Models\ToDo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([CourseSeeder::class]);

        // the id is set to make it easier when testing
        ToDo::create(['id' => 487, 'name' => 'First todo...', 'position' => 0]);
        ToDo::create(['name' => 'Second todo...', 'position' => 1]);
        ToDo::create(['name' => 'Third todo...', 'position' => 4]);
        ToDo::create(['name' => 'Fourth todo...', 'position' => 3]);
        ToDo::create(['name' => 'Fifth todo...', 'position' => 2]);
    }
}
