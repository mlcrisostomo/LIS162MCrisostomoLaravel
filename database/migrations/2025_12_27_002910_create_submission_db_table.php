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
         if (!Schema::hasTable('submission_db')) {
            Schema::create('submission_db', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->string('name', length: 255);
                $table->string('url', length: 255);
                $table->string('permission_status', length: 45);
                $table->foreignId('registrant_id')->constrained();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_db');
    }
};
