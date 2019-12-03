<?php

use App\Models\Section;
use App\User;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::where('is_admin', 0)->pluck('id')->toArray();

        factory(Section::class, 20)->create()->each(function($section) use($userIds){
            $userArray = [];
            $count = rand(2, 5);
            $userKeys = array_rand($userIds, $count);
            foreach($userKeys as $key){
                $userArray[] = $userIds[$key];
            }
            $section->getPivotUsers()->sync($userArray);
        });
    }
}
