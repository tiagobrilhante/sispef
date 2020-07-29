<?php

use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokens_acesso')->insert([

            [
                'id' => 1,
                'token' => '782451B6-EE65-4477-9AAF-BA69942F5B4A',
                'type' => 'Administrador',
                'reference' => 'Maj Brilhante',
                'status' => 'Utilizado',
                'user_id' => 1,
                'om_id' => 1,
                'quem_gerou' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'token' => '1FFA08D6-66EB-43E3-9AA5-6CFBFAC301A3',
                'type' => 'Administrador',
                'reference' => 'Cap João',
                'status' => 'Utilizado',
                'user_id' => 2,
                'om_id' => 1,
                'quem_gerou' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'token' => '3F52529A-FCC9-4817-9CBE-E41D914FF6DB',
                'type' => 'Visualizador',
                'reference' => 'Cel Aristides',
                'status' => 'Utilizado',
                'user_id' => 3,
                'om_id' => 2,
                'quem_gerou' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'token' => '51CA28FA-A450-41BA-BE6E-4D7CA877CF73',
                'type' => 'Administrador',
                'reference' => 'Cel Marcos',
                'status' => 'Aguardando Uso',
                'om_id' => 5,
                'quem_gerou' => 1,
                'user_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'token' => '0565AE2B-7C7F-4BF3-8862-6FF79D9EA342',
                'type' => 'Visualizador',
                'reference' => 'Maj Bernardo',
                'status' => 'Aguardando Uso',
                'om_id' => 6,
                'quem_gerou' => 1,
                'user_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'token' => '70D47E1E-902F-4C0E-90CC-5CA67C19CBFB',
                'type' => 'Cmt / Scmt PEF',
                'reference' => 'Ten Igor',
                'status' => 'Aguardando Uso',
                'om_id' => 7,
                'quem_gerou' => 1,
                'user_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'token' => '29AB6E95-6EF4-4C54-83E8-B264A8976CBC',
                'type' => 'Visualizador',
                'reference' => 'Ten Cel Joaquim',
                'status' => 'Utilizado',
                'om_id' => 4,
                'quem_gerou' => 1,
                'user_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'token' => '30CC6E95-9DF5-3B51-91C9-A264A8955CBC',
                'type' => 'Visualizador',
                'reference' => 'Maj Aristides',
                'status' => 'Exprirado',
                'om_id' => 4,
                'quem_gerou' => 1,
                'user_id' => 4,
                'created_at' => '2020-05-23 11:11:11',
                'updated_at' => '2020-05-23 11:11:11'
            ]

        ]);

    }
}
