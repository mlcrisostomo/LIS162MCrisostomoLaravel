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
         if (!Schema::hasTable('gj_event')) {
            Schema::create('gj_event', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->string('code', length: 45);
                $table->string('name', length: 255);
                $table->string('theme', length: 255);
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->text('limitations')->nullable();
                $table->text('notes')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gj_event');
    }
};
