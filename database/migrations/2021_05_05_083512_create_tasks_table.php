<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tasks', function (Blueprint $table) {
            $table->bigIncrements('idTasks');
            $table->string('tasksCase');
            $table->string('tasksClient');
            $table->string('tasksType');
            $table->string('tasksLawyer');
            $table->date('tasksDate');
            $table->integer('tasksHours');
            $table->longtext('tasksDone');
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
        Schema::dropIfExists('Tasks');
    }
}
