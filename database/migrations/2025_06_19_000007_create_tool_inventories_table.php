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
        Schema::create('tool_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('purchase_date');
            $table->decimal('purchase_price');
            $table->string('location_store');
            $table->integer('quantity');
            $table->string('status');
            $table->string('picture')->nullable();
            $table->text('notes');
            $table->unsignedBigInteger('tool_category_id');
            $table->unsignedBigInteger('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_inventories');
    }
};
