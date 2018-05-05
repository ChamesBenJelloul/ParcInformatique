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
            $table->string('Numéro de série')->nullable();
            $table->string('code patrimoine')->nullable();
            $table->string('nom')->nullable();
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->string('code du marché')->nullable();
            $table->string('numéro contrat de maintenance');
            $table->longText('Contrat de maintenance détaillé');
            $table->integer('personnel_id');
            $table->boolean('ConfirmerParAdmin')->nullable();
            $table->boolean('Modification')->default(false);
            $table->boolean('Suppression')->default(false);
            $table->string('Adresse Physique')->default('0')->comment('Adresse Physique du carte réseau');
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
