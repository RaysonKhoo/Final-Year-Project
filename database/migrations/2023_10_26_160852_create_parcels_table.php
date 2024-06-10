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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->date('date_received');
            $table->string('tracking_number')->unique();
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('room_number');
            $table->string('courier_name');
            $table->string('status');
            $table->date('collect_date')->nullable();
            $table->time('selection_time')->nullable();
            $table->unsignedBigInteger('user_id')->default(0); // Set a default value (e.g., 0)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->where('role', 'user');
            $table->unsignedBigInteger('staff_id')->default(0);
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade')->where('role', 'staff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parcels', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['staff_id']);
            $table->dropColumn('staff_id');
        });

        Schema::dropIfExists('parcels');
    }
};
