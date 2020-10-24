<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250);
            $table->string('role',50);
            $table->unsignedInteger('role_id')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->string('address', 250)->nullable();
            $table->string('country', 250)->nullable();
            $table->string('postal_code', 250)->nullable();
            $table->string('state', 250)->nullable();
            $table->double('longitude', 10, 5)->nullable();
            $table->double('latitude', 10, 5)->nullable();
            $table->string('login_type')->nullable();//facebook,google,twiter,or default
            $table->dateTime('expire');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
