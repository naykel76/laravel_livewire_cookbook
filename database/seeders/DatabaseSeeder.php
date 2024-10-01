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

        $user = User::factory()->create([
            'id' => 142,
            'name' => 'Jimmy Peters',
            'email' => 'jimmy@example.com',
        ]);

        $user->toDos()->createMany([
            ['id' => 127, 'name' => 'Second todo...', 'position' => 1],
            ['name' => 'First todo...', 'position' => 0],
            ['name' => 'Fifth todo...', 'position' => 14],
            ['name' => 'Third todo...', 'position' => 12],
            ['name' => 'Fourth todo...', 'position' => 13],
        ]);

        User::factory(3)->create();

        // these are intentionally out of order to test sorting
        ToDo::create(['id' => 487, 'name' => 'Second todo...', 'position' => 1]);
        ToDo::create(['name' => 'First todo...', 'position' => 0]);
        ToDo::create(['name' => 'Fifth todo...', 'position' => 4]);
        ToDo::create(['name' => 'Third todo...', 'position' => 2]);
        ToDo::create(['name' => 'Fourth todo...', 'position' => 3]);
    }
}
