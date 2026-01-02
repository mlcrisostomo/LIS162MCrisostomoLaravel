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
        if (!Schema::hasTable('registrant')) {
            Schema::create('registrant', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->string('team_name', length: 255);
                $table->string('team_members', length: 255);
                $table->string('team_rep_email', length: 255)->nullable();
                $table->foreignId('registration_type_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('user_user_type_id')->constrained();
            });
        }

        if (!Schema::hasTable('registrant_type')) {
            Schema::create('registrant_type', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->enum('name', ['Individual', 'Team']);
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrant');
        Schema::dropIfExists('registrant_type');
    }

};
