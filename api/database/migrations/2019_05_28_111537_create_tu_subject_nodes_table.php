<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuSubjectNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tu_subject_nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('gparent_id')->nullable();
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
        Schema::dropIfExists('tu_subject_nodes');
    }
}
