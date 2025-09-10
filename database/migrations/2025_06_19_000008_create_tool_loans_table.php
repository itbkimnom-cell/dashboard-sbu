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
        Schema::create('tool_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('start_loan_date');
            $table->timestamp('end_loan_date');
            $table->timestamp('return_date');
            $table->integer('quantity');
            $table->string('condition_out');
            $table->string('condition_in');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('tool_inventory_id');
            $table->unsignedBigInteger('borrowed_by');
            $table->unsignedBigInteger('approved_borrowed_by')->nullable();
            $table->unsignedBigInteger('approved_returned_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_loans');
    }
};
