<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Older copies of this project created this table from the controller.
        // Leave that data intact and simply record this migration as complete.
        if (Schema::hasTable('transactions')) {
            return;
        }

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('acn', 20)->index();
            $table->string('transaction_type', 50);
            $table->decimal('amount', 12, 2);
            $table->string('remarks')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('acn')
                ->references('acn')
                ->on('account')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
