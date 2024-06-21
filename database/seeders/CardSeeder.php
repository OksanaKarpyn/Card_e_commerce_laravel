<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Card;
use App\Models\User;
class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $userElem) {
                $newCard = new Card();
                $newCard->user_id = $userElem->id;
                $newCard->title = $faker->sentence();
                $newCard->description = $faker->text(100);
                $newCard->photo = 'null';
                $newCard->price = $faker->randomFloat(2, 5, 20);
                $newCard->save();
            
        }
    }
}