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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->timestamps();
            $table->string('task_name');
            $table->string('task_desc');
            $table->date('task_sched');
            $table->time('task_time', $precision = 0);
            $table->string('task_priority');
            $table->string('task_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
