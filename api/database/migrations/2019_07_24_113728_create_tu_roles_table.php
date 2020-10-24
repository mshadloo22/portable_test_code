<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//we might not need this table but keep it just in case
        Schema::create('tu_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_type')->nullable();
            $table->boolean('can_create')->nullable();
            $table->boolean('can_read')->nullable();
            $table->boolean('can_edit')->nullable();
            $table->boolean('can_delete')->nullable();
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
        Schema::dropIfExists('tu_roles');
    }
}
