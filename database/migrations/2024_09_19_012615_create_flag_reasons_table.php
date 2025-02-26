<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flag_reasons', function (Blueprint $table) {
            $table->id();

            $table->string('reason')->unique();
            $table->integer('sort_order')->unique();

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }
};
