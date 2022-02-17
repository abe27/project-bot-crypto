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
        Schema::create('trend_on_times', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('trend_id');
            $table->string('time_frame_id');
            $table->enum('trend', ['-', 'LONG', 'SHORT', 'STRONG_LONG', 'STRONG_SHORT', 'NEUTRAL', 'INTEREST'])->nullable()->default('-');
            $table
                ->boolean('is_active')
                ->nullable()
                ->default(false);
            $table->timestamps();
            $table
                ->foreign('trend_id')
                ->references('id')
                ->on('trends')
                ->cascadeOnDelete();
            $table
                ->foreign('time_frame_id')
                ->references('id')
                ->on('time_frames')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trend_on_times');
    }
};
