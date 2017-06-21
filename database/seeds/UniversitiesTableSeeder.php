<?php

use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'state' => 'ACT',
            'name' => 'Australian National University',
        ]);

        DB::table('universities')->insert([
            'state' => 'ACT',
            'name' => 'University of Canberra',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'Australian Catholic University',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'Charles Sturt University',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'Macquarie University',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'Southern Cross University',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of New England',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of New South Wales',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of Newcastle',
        ]);

        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of Sydney',
        ]);
        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of Technology, Sydney',
        ]);
        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'Western Sydney University',
        ]);
        DB::table('universities')->insert([
            'state' => 'NSW',
            'name' => 'University of Wollongong',
        ]);

        DB::table('universities')->insert([
            'state' => 'NT',
            'name' => 'Charles Darwin University',
        ]);

        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'Bond University',
        ]);

        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'CQ University',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'Griffith University',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'James Cook University',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'Queensland University of Technology',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'University of Queensland',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'University of Southern Queensland',
        ]);
        DB::table('universities')->insert([
            'state' => 'QLD',
            'name' => 'University of the Sunshine Coast',
        ]);

        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'Carnegie Mellon University',
        ]);
        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'Flinders University',
        ]);
        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'Torrens University Australia',
        ]);
        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'University College London',
        ]);
        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'University of Adelaide',
        ]);
        DB::table('universities')->insert([
            'state' => 'SA',
            'name' => 'University of South Australia',
        ]);

        DB::table('universities')->insert([
            'state' => 'TAS',
            'name' => 'University of Tasmania',
        ]);

        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'Deakin University',
        ]);

        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'Federation University of Australia',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'La Trobe University',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'Monash University',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'RMIT University',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'Swinburne University of Technology',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'University of Divinity',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'University of Melbourne',
        ]);
        DB::table('universities')->insert([
            'state' => 'VIC',
            'name' => 'Victoria University',
        ]);

        DB::table('universities')->insert([
            'state' => 'WA',
            'name' => 'Curtin University',
        ]);

        DB::table('universities')->insert([
            'state' => 'WA',
            'name' => 'Edith Cowan University',
        ]);

        DB::table('universities')->insert([
            'state' => 'WA',
            'name' => 'Murdoch University',
        ]);

        DB::table('universities')->insert([
            'state' => 'WA',
            'name' => 'University of Notre Dame Australia',
        ]);

        DB::table('universities')->insert([
            'state' => 'WA',
            'name' => 'University of Western Australia',
        ]);




    }
}
