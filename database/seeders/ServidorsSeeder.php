<?php

namespace Database\Seeders;

use App\Models\Servidor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ServidorsSeeder extends Seeder
{

    public function run()
    {
        $servidor = Servidor::create([
            'cpf' => "770.934.340-61",
            'tipo_servidor' => 'adm'
        ]);

        $servidor->user()->create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('12345678')
        ])->givePermissionTo('admin');

        $servidor1 = Servidor::create([
            'cpf' => "929.053.520-27",
            'tipo_servidor' => 'servidor'
        ]);

        $servidor1->user()->create([
            'name' => "Servidor",
            'email' => "servidor@gmail.com",
            'password' => Hash::make('12345678')
        ])->givePermissionTo('servidor');

        $servidor2 = Servidor::create([
            'cpf' => "339.292.350-80",
            'tipo_servidor' => 'pro_reitor'
        ]);

        $servidor2->user()->create([
            'name' => "Pro Reitor",
            'email' => "reitor@gmail.com",
            'password' => Hash::make('12345678')
        ])->givePermissionTo('pro_reitor');
    }
}