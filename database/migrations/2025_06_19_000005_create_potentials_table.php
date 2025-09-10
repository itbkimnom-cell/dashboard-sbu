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
        Schema::create('potentials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_type');
            $table->string('project_name');
            $table->string('source');
            $table->string('interest_level');
            $table->decimal('estimated_value');
            $table->string('status');
            $table->text('notes');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potentials');
    }
};
