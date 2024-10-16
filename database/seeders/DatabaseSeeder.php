<?php

namespace Database\Seeders;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // id's are set to make it easier when testing and debugging

        $this->call([CourseSeeder::class]);
        $this->call([StudentCourseSeeder::class]);

        $user = User::factory()->create([
            'id' => 142,
            'name' => 'Jimmy Peters',
            'email' => 'jimmy@example.com',
        ]);

        $user->toDos()->createMany([
            ['id' => 127, 'name' => 'User - Second todo...', 'position' => 1],
            ['name' => 'User - First todo...', 'position' => 0],
            ['name' => 'User - Fifth todo...', 'position' => 14],
            ['name' => 'User - Third todo...', 'position' => 12],
            ['name' => 'User - Fourth todo...', 'position' => 13],
        ]);

        User::factory(3)->create();

        // these are intentionally out of order to test sorting
        ToDo::create(['id' => 487, 'name' => 'Second todo...', 'position' => 21]);
        ToDo::create(['name' => 'First todo...', 'position' => 0]);
        ToDo::create(['name' => 'Fifth todo...', 'position' => 24]);
        ToDo::create(['name' => 'Third todo...', 'position' => 12]);
        ToDo::create(['name' => 'Fourth todo...', 'position' => 13]);

    }
}
