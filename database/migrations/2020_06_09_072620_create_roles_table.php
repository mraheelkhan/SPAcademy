<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_title');
            $table->text('permissions');
            $table->text('permission');
            // $table->integer('user_id')->unsigned();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('created_ip')->nullable();
            // $table->integer('last_modified_by')->unsigned();
            $table->foreignId('last_modified_by')->references('id')->on('users');
            $table->string('modified_ip');
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
        Schema::dropIfExists('roles');
    }
}
