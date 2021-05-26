<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->foreignId('type_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->string('intro')->nullable();
            $table->text('description');
            $table->date('start_date');
            $table->time('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->unsignedInteger('min_attendees')->nullable();
            $table->unsignedInteger('max_attendees')->nullable();
            $table->foreignId('creator_id')->constrained('users');
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->string('slug');
            $table->boolean('leader_led')->default(false);
            $table->enum('gender', ['ladies', 'gents', 'mixed'])->default('mixed');
            $table->dateTime('cancelled_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('events');
    }
}
