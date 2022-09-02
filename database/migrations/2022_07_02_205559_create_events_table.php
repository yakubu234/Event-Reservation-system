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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('event_name');
            $table->text('description');
            $table->string('location');
            $table->string('event_date');
            $table->string('start_time');
            $table->string('end_time')->nullable();
            $table->string('total_reservation')->nullable();
            $table->string('maximun_seats');
            $table->string('tickect_type_count')->nullable();
            $table->text('image_path')->default((config('services.image_url')));
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('type', ['free', 'paid']);
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
};
