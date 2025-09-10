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
        Schema::create('inspector_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('inspection_date');
            $table->string('file_report');
            $table->timestamp('file_report_date');
            $table->string('file_bast');
            $table->timestamp('file_bast_date');
            $table->unsignedBigInteger('inspector_user_id');
            $table->unsignedBigInteger('administration_user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspector_reports');
    }
};
