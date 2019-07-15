<?php

use Illuminate\Database\Seeder;
use App\Authors;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authors::create(['author_name' => 'Machado de Assis']);
        Authors::create(['author_name' => 'Euclides da Cunha']);
        Authors::create(['author_name' => 'Lima Barreto']);
        Authors::create(['author_name' => 'JK Rowling']);
    }
}
