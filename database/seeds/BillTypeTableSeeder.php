<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID = 1
        DB::table('billtypes')->insert([
            'name' => 'Energia Elétrica',
            'description' => 'Gastos relacionados a conta de energia elétrica.'
        ]);

        // ID = 2
        DB::table('billtypes')->insert([
            'name' => 'Água',
            'description' => 'Gastos relacionados a conta de água.'
        ]);

        // ID = 3
        DB::table('billtypes')->insert([
            'name' => 'Internet/Telefone',
            'description' => 'Gastos relacionados a conta telefone e internet.'
        ]);

        // ID = 4
        DB::table('billtypes')->insert([
            'name' => 'Empregada',
            'description' => 'Gastos relacionados as despesas com empregada.'
        ]);

        // ID = 5
        DB::table('billtypes')->insert([
            'name' => 'Compra Mensal',
            'description' => 'Gastos relacionados a compra de supermercado mensal.'
        ]);
    }
}
