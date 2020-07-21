<?php

use Illuminate\Database\Seeder;

class OMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oms')->insert([
            [
                'id' => 1,
                'nome' => '12ª Região Militar',
                'sigla' => '12ª RM',
                'cor' => '#000FFF',
                'om_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'nome' => 'Comando Militar da Amazônia',
                'sigla' => 'CMA',
                'om_id' => null,
                'cor' => '#FFF000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'nome' => '1ᴼ Batalhão de Infantaria de Selva',
                'sigla' => '1ᴼ BIS',
                'cor' => '#DDDCCC',
                'om_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]

        ]);

    }
}
