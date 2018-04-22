<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Numéro de série',10)->nullable();
            $table->string('code patrimoine',10)->nullable();
            $table->string('nom',10)->nullable();
            $table->string('marque',10)->nullable();
            $table->string('type',10)->nullable();
            $table->string('code du marché',10)->nullable();
            $table->string('numéro contrat de maintenance',10);
            $table->longText('Contrat de maintenance détaillé');
            $table->integer('personnel_id');
            $table->boolean('ConfirmerParAdmin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipements');
    }
}
