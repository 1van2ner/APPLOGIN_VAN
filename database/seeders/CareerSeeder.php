<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create(['name' => 'Ingeniería en Sistemas']);
        Career::create(['name' => 'Licenciatura en Administración']);
        Career::create(['name' => 'Ingeniería en Mecatrónica']);
        Career::create(['name' => 'Ingeniería en Sistemas']);
        Career::create(['name' => 'Psicologia']);
        Career::create(['name' => 'Contador Público']);
    }
}
