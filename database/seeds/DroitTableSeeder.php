<?php

use Illuminate\Database\Seeder;
use App\Droit;

class DroitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $droit_1=new Droit();
        $droit_1->nom='AJOUT EQUIPEMENT';
        $droit_1->description='l’utilisateur peut ajouter un équipement dans l’application et l’associer à son occupant par un Bon de sortie d’immobilisation';
        $droit_1->save();

        $droit_2=new Droit();
        $droit_2->nom='MODIFIER EQUIPEMENT';
        $droit_2->description='l’utilisateur peut modifier les informations sur les équipements et/ou l’occupant actuel de l’équipement par un Bon de transfert d’immobilisation';
        $droit_2->save();

        $droit_3=new Droit();
        $droit_3->nom='CONSULTER EQUIPEMENT';
        $droit_3->description='l’utilisateur peut consulter la liste des équipements et les informations détaillées sur chaque équipement e.g. utilisateur actuel/Numéro de série/code patrimoine';
        $droit_3->save();

        $droit_4=new Droit();
        $droit_4->nom='SUPPRIMER EQUIPEMENT';
        $droit_4->description='En cas où l’equipement ne fonctionne plus ou n’existe plus dans la societe,l’acteur peut supprimer cet équipement.';
        $droit_4->save();

        $droit_5=new Droit();
        $droit_5->nom='TABLEAUX DE BORDS';
        $droit_5->description='Les tableaux de bords vont permettre à l’utilisateur de vérifier et consulter les équipements actifs et inactifs dans un réseau local';
        $droit_5->save();

        $droit_6=new Droit();
        $droit_6->nom='STATISTIQUES';
        $droit_6->description=' L’acteur consulte des statistiques sur les équipements et les utilisateurs par des graphes afin de bien analyser le parc';
        $droit_6->save();

        $droit_7=new Droit();
        $droit_7->nom='ADMIN';
        $droit_7->description='L’administrateur peut gérer tous les utilisateurs et leurs droits, et peut consulter l’historique;';
        $droit_7->save();
    }
}
