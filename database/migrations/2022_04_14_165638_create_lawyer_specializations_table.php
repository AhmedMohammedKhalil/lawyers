<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_specializations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lawyer_id')->unsigned();
            $table->integer('spec_id')->unsigned();
            $table->foreign('lawyer_id')
                ->references('id')->on('lawyers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('spec_id')
                ->references('id')->on('specializations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('lawyer_specializations');
    }
};
