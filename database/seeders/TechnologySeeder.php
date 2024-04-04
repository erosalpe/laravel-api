<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            "HTML",
            "CSS",
            "JavaScript",
            "Bootstrap",
            "PHP",
            "MySQL",
            "Laravel",
            "Vue",
            "Node.js",
        ];
        foreach($technologies as $element){
            $new_technology = new technology();
            $new_technology->name=$element;
            $new_technology->slug = Str::slug($new_technology->name);
            $new_technology->save();
        }
    }
}
