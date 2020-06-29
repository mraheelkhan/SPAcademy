<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminmenus', function (Blueprint $table) {
            $table->id();
            $table->string('menutitle');
            $table->string('slug');
            // $table->integer('parentid')->unsigned()->nullable();
            $table->foreignId('parentid')->references('id')->on('adminmenus');
            $table->boolean('showinnav')->nullable();
            $table->boolean('setasdefault')->nullable();
            $table->string('iconclass')->nullable();
            $table->string('urllink')->nullable();
            $table->integer('displayorder')->nullable();
            $table->text('mselect')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('adminmenus');
    }
}
