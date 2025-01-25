<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
           $table->id();

           $table->string('name')->nullable();
           $table->string('email')->nullable();
           $table->string('ip_address')->nullable();
           $table->timestamps();
        });
    }
};
