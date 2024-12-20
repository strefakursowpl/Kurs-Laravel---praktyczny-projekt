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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->mediumText('description');
            $table->string('position');
            $table->string('location');
            $table->string('type');
            $table->string('experience_level');
            $table->string('schedule');
            $table->string('mode');
            $table->string('url')->nullable();
            $table->string('company_name');
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->string('logo')->nullable();
            $table->string('tags')->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('inquiries')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
