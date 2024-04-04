<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BailleurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bailleurs')->insert([
            'nom' => 'OUEDRAOGO',
            'prenom' => 'Abdoul salam',
            'cnib' => 'B13649564',
            'telephone' => '67186063',
            'quartier' => 'Zogona',
            'prevent_name' => 'KINI Valerie',
            'prevent_phone' => '61346554',
        ]);
    }
}
