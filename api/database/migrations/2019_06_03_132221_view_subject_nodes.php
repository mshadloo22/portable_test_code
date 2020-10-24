<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewSubjectNodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // DB::statement("create view view_subjects as select `n`.`id` AS `id`,`n`.`number` AS `number`,`n`.`name` AS `name`,`n`.`description` AS `description`,`n`.`parent_id` AS `parent_id`,`n`.`gparent_id` AS `gparent_id`,`n`.`created_at` AS `created_at`,`n`.`updated_at` AS `updated_at` from `tu_subject_nodes` `n` where (isnull(`n`.`parent_id`) and isnull(`n`.`gparent_id`))");
        // DB::statement("create view view_chapters as select `n`.`id` AS `id`,`n`.`number` AS `number`,`n`.`name` AS `name`,`n`.`description` AS `description`,`n`.`parent_id` AS `parent_id`,`n`.`gparent_id` AS `gparent_id`,`n`.`created_at` AS `created_at`,`n`.`updated_at` AS `updated_at` from `tu_subject_nodes` `n` where ((`n`.`parent_id` is not null) and isnull(`n`.`gparent_id`))");
        // DB::statement("create view view_parts as select `n`.`id` AS `id`,`n`.`number` AS `number`,`n`.`name` AS `name`,`n`.`description` AS `description`,`n`.`parent_id` AS `parent_id`,`n`.`gparent_id` AS `gparent_id`,`n`.`created_at` AS `created_at`,`n`.`updated_at` AS `updated_at` from `tu_subject_nodes` `n` where ((`n`.`parent_id` is not null) and (`n`.`gparent_id` is not null)) ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // DB::statement("drop view view_subjects");
        // DB::statement("drop view view_chapters");
        // DB::statement("drop view view_parts");
    }
}
