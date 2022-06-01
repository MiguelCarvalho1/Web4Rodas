<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agendamentos;


class AddAgendamentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['descricao'=>'Ida a Praia', 'data_incio'=>'2022-08-11', 'data_fim'=>'2022-08-11'],
        	['descricao'=>'Vista a ESTG', 'data_incio'=>'2022-08-11', 'data_fim'=>'2022-08-13'],
        	['descricao'=>'Santa Luzia', 'data_incio'=>'2022-08-14', 'data_fim'=>'2022-08-14'],
        	['descricao'=>'Visita Anha', 'data_incio'=>'2028-07-17', 'data_fim'=>'2028-07-17'],
        ];
        foreach ($data as $key => $value) {
        	Agendamentos::create($value);
        }
    }
}
