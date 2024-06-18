<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;
use App\Models\User;
use Hash;
use DB;

class DeploySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            $this->createTipoUsuario();
            $this->createUser();
            
            DB::commit();
        } catch(\Exception) {
            DB::rollback();
        }
    }

    /**
     * Cadastra os tipo de usuário
     *
     * @return void
     */
    protected function createTipoUsuario()
    {
        TipoUsuario::create([
            'id' => 1,
            'descricao' => 'Admin'
        ]);
        
        TipoUsuario::create([
            'id' => 2,
            'descricao' => 'Servidor'
        ]);
        
        TipoUsuario::create([
            'id' => 3,
            'descricao' => 'Aluno'
        ]);
    }

    /**
     * Cadastra o usuário administrador
     *
     * @return void
     */
    protected function createUser()
    {
        User::create([
            'name' => 'Usuário Admin',
            'nome_completo' =>  'Usuário Admin',
            'CPF' => 0,
            'email' => 'admin.agendas@ifnmg',
            'password' => Hash::make('acesso@admin2024'),
            'acesso_id' => 1
        ]);
    }
}
