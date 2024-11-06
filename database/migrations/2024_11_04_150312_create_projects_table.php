<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('tags_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('environment_id')->nullable();
            $table->integer('resources_id')->nullable();
            $table->integer('mechanism_id')->nullable();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->text('abstract')->nullable();
            $table->text('overview')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('launchd')->nullable();
            $table->text('proponent')->nullable();
            $table->text('progress')->nullable();
            $table->text('problems')->nullable();
            $table->text('solution')->nullable();
            $table->text('completion')->nullable();
            $table->text('output')->nullable();
            $table->text('costing')->nullable();
            $table->text('future')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
