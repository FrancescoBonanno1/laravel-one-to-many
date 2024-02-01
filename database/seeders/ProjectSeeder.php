<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_projects = config("projects");

        foreach ($array_projects as $project_item) {
            $new_project = new Project();

            $new_project->name = $project_item["name"];
            $new_project->description = $project_item["description"];
            $new_project->image = $project_item["image"];
            $new_project->dataCreation = $project_item["dataCreation"];
            $new_project->language = $project_item["language"];
            $new_project->save();
        }  
    }
}
