<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'nome' => 'Tiago da Silva Brilhante',
                'nome_guerra' => 'Brilhante',
                'posto_grad' => 'Maj',
                'tel_contato' => '(92) 99155-4494',
                'tu_formacao' => null,
                'email' => 'tiagobrilhantemania@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$Xpqzl1GtNJvzIkrh2SC0mupQE3t0AnUBRTjdaaeQCpH/HgoMx/TyK',
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

    }
}
