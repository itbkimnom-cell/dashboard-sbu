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
        Schema::table('tool_inventories', function (Blueprint $table) {
            $table
                ->foreign('tool_category_id')
                ->references('id')
                ->on('tool_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('created_by')
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
        Schema::table('tool_inventories', function (Blueprint $table) {
            $table->dropForeign(['tool_category_id']);
            $table->dropForeign(['created_by']);
        });
    }
};
