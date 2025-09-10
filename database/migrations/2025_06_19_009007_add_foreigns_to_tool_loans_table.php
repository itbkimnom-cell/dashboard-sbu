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
        Schema::table('tool_loans', function (Blueprint $table) {
            $table
                ->foreign('tool_inventory_id')
                ->references('id')
                ->on('tool_inventories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('borrowed_by')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('approved_borrowed_by')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('approved_returned_by')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tool_loans', function (Blueprint $table) {
            $table->dropForeign(['tool_inventory_id']);
            $table->dropForeign(['borrowed_by']);
            $table->dropForeign(['approved_borrowed_by']);
            $table->dropForeign(['approved_returned_by']);
        });
    }
};
