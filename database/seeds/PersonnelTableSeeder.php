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

        $personnel_2=new Personnel();
        $personnel_2->nom='test2';
        $personnel_2->prenom='test2';
        $personnel_2->matricule='test2';
        $personnel_2->statut='test2';
        $personnel_2->save();

        $personnel_3=new Personnel();
        $personnel_3->nom='test3';
        $personnel_3->prenom='test3';
        $personnel_3->matricule='test3';
        $personnel_3->statut='test3';
        $personnel_3->save();
    }
}
