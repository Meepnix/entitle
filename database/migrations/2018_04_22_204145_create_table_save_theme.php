<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSaveTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_theme', function (Blueprint $table) {
            $table->integer('save_id')->unsigned()->index();
            $table->integer('theme_id')->unsigned()->index();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('save_id')->references('id')->on('saves')->onDelete('cascade');
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
        Schema::dropIfExists('save_theme');
    }
}
