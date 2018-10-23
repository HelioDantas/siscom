<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome'  => 'rafael',
            'email' => 'rafael@gmail.com',
            'cpf'   => '123456',
            'cargo' => 'programador',
            'senha' => password_hash('123',1),
        ]);
        DB::table('admin')->insert([
            'nome'  => 'admin',
            'cpf'   => '123456',
            'senha' =>  password_hash('admin',1),
            
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
