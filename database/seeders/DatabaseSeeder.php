<?php

namespace Database\Seeders;

use App\Models\{Label, Role, User};
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

         $data_filters = [
            ['id' => 1, 'name' => 'ciencia-ficcion', 'description'=>'Ciencia Ficción', 'status' => 1 ],
            ['id' => 2, 'name' => 'aventura', 'description'=>'Aventura', 'status' => 1],
            ['id' => 3, 'name' => 'misterio', 'description'=>'Misterio', 'status' => 1],
            ['id' => 4, 'name' => 'fantasia', 'description'=>'Fantasía', 'status' => 1],
            ['id' => 5, 'name' => 'novela', 'description'=>'Novela', 'status' => 1],
            ['id' => 6, 'name' => 'cuento-corto', 'description'=>'Cuento Corto', 'status' => 1],
            ['id' => 7, 'name' => 'historia', 'description'=>'Historia', 'status' => 1],
            ['id' => 8, 'name' => 'ciencia', 'description'=>'Ciencia', 'status' => 1],
            ['id' => 9, 'name' => 'politica', 'description'=>'Política', 'status' => 1],
            ['id' => 10, 'name' => 'psicologia', 'description'=>'Psicología', 'status' => 1],
            ['id' => 11, 'name' => 'filosofia', 'description'=>'Filosofía', 'status' => 1],
            ['id' => 12, 'name' => 'horror', 'description'=>'Horror', 'status' => 1],
            ['id' => 13, 'name' => 'suspenso', 'description'=>'Suspenso', 'status' => 1],
            ['id' => 14, 'name' => 'humor', 'description'=>'Humor', 'status' => 1],
            ['id' => 15, 'name' => 'comedia', 'description'=>'Comedia', 'status' => 1],
            ['id' => 16, 'name' => 'infantil', 'description'=>'Infantil', 'status' => 1],
            ['id' => 17, 'name' => 'juvenil', 'description'=>'Juvenil', 'status' => 1],
            ['id' => 18, 'name' => 'autoayuda', 'description'=>'Autoayuda', 'status' => 1],
            ['id' => 19, 'name' => 'romance', 'description'=>'Romance', 'status' => 1],
            ['id' => 20, 'name' => 'clasico', 'description'=>'Clásico', 'status' => 1],
        ];
        foreach ($data_filters as $data_filter) {
            Label::create($data_filter);
        };
    }
}
