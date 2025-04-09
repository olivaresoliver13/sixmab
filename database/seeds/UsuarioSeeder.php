<?php

use Illuminate\Database\Seeder;

use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = [
            [
                'name' => 'Administrador',
                'email' => 'info@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'true',
                'user_register' => '1',
                'last_login_at' => date('Y-m-d H:m:s'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Cersar Cortes',
                'email' => 'ccortes@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'true',
                'user_register' => '1',
                'last_login_at' => date('2020-01-11 22:58:34'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Karina Baez',
                'email' => 'kbaez@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'false',
                'user_register' => '1',
                'last_login_at' => date('2020-01-11 22:58:34'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'German Caru',
                'email' => 'german.caru@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'true',
                'user_register' => '1',
                'last_login_at' => date('2020-01-11 22:58:34'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'German Caru',
                'email' => 'gcaru@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'true',
                'user_register' => '1',
                'last_login_at' => date('2020-01-11 22:58:34'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Leonardo Ruz',
                'email' => 'leonardo.ruz@biobusiness.cl',
                'password' => '$2y$10$c6a1cfVKTmK/kjIieUuRQerHUXhhjWBQA7K/5dKUfM9Gs87HpICiO',
                'status' => 'true',
                'privilege' => 'false',
                'user_register' => '1',
                'last_login_at' => date('2020-01-11 22:58:34'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
        ];
        foreach ($usuario as $item) {
            User::create($item);
        }
    }
}