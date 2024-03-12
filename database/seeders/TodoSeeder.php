<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    Todo::factory(100)->create();


    $faker = Faker::create('id_ID');

    for ($i = 0; $i < 100; $i++) {
        Todo::create([
            'title' => $faker->realText($maxNbChars = 15, $indexSize = 3),
            'description' => $faker->realText( $maxNbChars = 30, $indexSize = 5),
            'priority' => $faker->randomElement(['1', '2', '3']),
            'due_date' => $faker->dateTimeBetween('-1 week', '+2 week'),
            'is_completed' => $faker->boolean,
            'user_id' => $faker->numberBetween(1, 1)
        ]);
    }
}
}
