<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImmeubleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('immeubles')->insert([
            'adresse' => 'Patte d\'oie',
            'nbr_locaux' => 6,
            'reference' => 'temporibus porro, dolor, ad eius rerum iusto qui ea! Repellendus, sint nesciunt',
            'autres' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'bailleurs_id' => 1,
        ]);
    }
}
