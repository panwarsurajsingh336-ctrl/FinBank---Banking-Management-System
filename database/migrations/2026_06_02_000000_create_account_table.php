<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('account')) {
            return;
        }

        Schema::create('account', function (Blueprint $table) {
            $table->string('acn', 20)->primary();
            $table->string('pin', 20);
            $table->string('name');
            $table->string('fname');
            $table->string('email');
            $table->string('phno', 20);
            $table->string('gender', 20);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->decimal('amount', 12, 2)->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
