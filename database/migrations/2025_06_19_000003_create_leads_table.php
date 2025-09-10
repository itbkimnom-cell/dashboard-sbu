<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stage');
            $table->integer('probability');
            $table->timestamp('expected_close_date');
            $table->decimal('lead_value');
            $table->string('competitor')->nullable();
            $table->string('status');
            $table->text('lost_reason');
            $table->text('notes');
            $table->timestamp('closed_at');
            $table->unsignedBigInteger('potential_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
