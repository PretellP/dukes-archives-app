<?php

namespace Database\Seeders;

use App\Models\{Role, User};
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $data_roles = [
            ['id' => 1, 'name' => 'ADMINISTRADOR'],
            ['id' => 2, 'name' => 'ALMACENERO'],
            ['id' => 3, 'name' => 'CLIENTE'],
        ];

        foreach ($data_roles as $data_role) {
            Role::create($data_role);
        };

        User::create([
            'nickname' => 'adminduque',
            'name' => 'admin',
            'lastname' => 'duque',
            'gender' => 3,
            'birthdate' => '2000-01-03',
            'document_type' => 1,
            'document_number' => '009589232',
            'phone' => '987654321',
            'status' => 1,
            'role_id' => 1,
            'email' => 'adminduque@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
