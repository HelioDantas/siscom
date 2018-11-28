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
        DB::table('sis_usuario')->insert([
            'nome'  => 'rafael',
            'email' => 'rafael@gmail.com',
            'cpf'   => '123456',
            'senha' => password_hash('123',1),
        ]);



      /*  $faker = Faker\Factory::create();
        for ($i=0 ; $i < 80 ; $i++) { 
            App\Models\Paciente::create([

                'prontuario'         =>       $faker->prontuario,
                'DataCadastro'       =>       $faker->DataCadastro,
                'nome'               =>       $faker->nome,
                'cpf'                =>       $faker->cpf,
                'identidade'         =>       $faker->identidade,
                'dataDeNascimento'   =>       $faker->dataDeNascimento,
                'sexo'               =>       $faker->sexo,
                'etnia'              =>       $faker->etnia,
                'nacionalidade'      =>       $faker->nacionalidade,
                'naturalidade'       =>       $faker->naturalidade,
                'escolaridade'       =>       $faker->escolaridade,
                'rua'                =>       $faker->rua,
                'numero'             =>       $faker->numero,
                'bairro'             =>       $faker->bairro,
                'cep'                =>       $faker->cep,
                'cidade'             =>       $faker->cidade,
                'estado'             =>       $faker->estado,
                'telefone'           =>       $faker->telefone,
                'celular'            =>       $faker->celular,
                'email'              =>       $faker->email,
                'profissao'          =>       $faker->profissao,
                'status_2'           =>       $faker->status_2,
            ]); //   composer require fzaninotto/faker*/
        }
        /*DB::table('sis_paciente')->insert([

            'prontuario'
        ]);*/
        /*DB::table('usuarios')->insert([
            'nome'  => 'rafael',
            'email' => 'rafael@gmail.com',
            'cpf'   => '123456',
            'cargo' => 'programador',
            'senha' => password_hash('123',1),
        ]);*/
       /* DB::table('admin')->insert([
            'nome'  => 'admin',
            'cpf'   => '123456',
            'senha' =>  password_hash('admin',1),
            
        ]);*/
        // $this->call(UsersTableSeeder::class);
       
}
