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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->text('first_name', 60)->nullable();
            $table->text('last_name', 60)->nullable();
            $table->text('dni', 20)->nullable();
            $table->text('phone', 20)->nullable();
            $table->text('code', 4)->nullable();

            // Deletes columns
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('dni');
            $table->dropColumn('phone');
            $table->dropColumn('code');
        });
    }
};
