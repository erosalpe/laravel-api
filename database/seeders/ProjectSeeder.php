<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        for ($i=0; $i<10; $i++){
            $project= new Project();
            $project->title = $faker->sentence(3);
            $project->description = $faker->text(20);
            $project->slug = Str::slug($project->title, '-');
            $project->preview = $faker->url('http');
            $project->language = $faker->randomElement(['css', 'html', 'php', 'js']);
            $project->save();
        }
    }
}
