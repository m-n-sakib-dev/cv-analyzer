<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('cvs');

        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('cv_path');
            $table->string('ratings')->nullable();
            $table->string('designations')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
