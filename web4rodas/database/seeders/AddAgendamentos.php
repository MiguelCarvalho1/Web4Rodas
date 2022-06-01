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
        	['title'=>'Ida a Praia', 'start'=>'2022-08-11', 'end'=>'2022-08-11'],
        	['title'=>'Vista a ESTG', 'start'=>'2022-08-11', 'end'=>'2022-08-13'],
        	['title'=>'Santa Luzia', 'start'=>'2022-08-14', 'end'=>'2022-08-14'],
        	['title'=>'Visita Anha', 'start'=>'2028-07-17', 'end'=>'2028-07-17'],
        ];
        foreach ($data as $key => $value) {
        	Agendamentos::create($value);
        }
    }
}
