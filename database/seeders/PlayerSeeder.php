<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'user_id' => 1,
            'name' => "Magic",
            'lastname' => "Johnson",
            'position' => "G",
            "birthdate" => "1959-08-15",
            "description" => "The best point guard of all times",
            "retired" => 1,
            "salary" => 321312421
        ]);


        DB::insert("insert into players (user_id, name, lastname, position, birthdate, description, retired, salary)
                          values (1, 'Kawhi', 'Leonard', 'F', '1991-06-29', 'The Klaw', false, 40213453)");

        $player = new Player();
        $player->user_id = 1;
        $player->name = "Kevin";
        $player->lastname = "Durant";
        $player->position = "F";
        $player->birthdate = "1990-10-21";
        $player->description = "The snake";
        $player->retired = 0;
        $player->salary = 493242341;
        $player->save();
    }
}
