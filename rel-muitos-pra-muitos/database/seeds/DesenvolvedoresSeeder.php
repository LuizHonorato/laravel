<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Luiz Honorato', 'cargo'=>'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome'=>'Fernanda Pereira', 'cargo'=>'Analista Sênior']);
        DB::table('desenvolvedores')->insert(['nome'=>'Paulo Pereira', 'cargo'=>'Programador']);
    }
}
