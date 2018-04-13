<?php

use Illuminate\Database\Seeder;
use App\Personnel;

class PersonnelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personnel_1=new Personnel();
        $personnel_1->nom='test';
        $personnel_1->prenom='test';
        $personnel_1->matricule='test';
        $personnel_1->statut='test';
        $personnel_1->save();
    }
}
