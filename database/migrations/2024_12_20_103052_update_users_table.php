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
            $table->string('role')->default('user');
            $table->string('avatar')->nullable();
            $table->text('links')->nullable();
            $table->text('content')->nullable();
            $table->string('cv_name')->nullable();
            $table->string('cv_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('avatar');
            $table->dropColumn('links');
            $table->dropColumn('content');
            $table->dropColumn('cv_name');
            $table->dropColumn('cv_url');
        });
    }
};
