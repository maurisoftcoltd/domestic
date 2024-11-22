<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownSeeder extends Seeder
{
    public function run(): void
    {
        Town::create([
            'name'=>'Chaguanas',
            'latitude'=>'10.534640',
            'longitude'=>'-61.413332',
            'population'=>'83493',
        ]);
        Town::create([
            'name'=>'Laventille',
            'latitude'=>'10.649105',
            'longitude'=>'-61.495757',
            'population'=>'40268',
        ]);
    }
}
