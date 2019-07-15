<?php

use Illuminate\Database\Seeder;
use App\Publishingcompany;

class PublishingCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publishingcompany::create(['name' => 'Pearson']);
        Publishingcompany::create(['name' => 'Abril']);
        Publishingcompany::create(['name' => 'Grupo Planeta']);
        //
    }
}
