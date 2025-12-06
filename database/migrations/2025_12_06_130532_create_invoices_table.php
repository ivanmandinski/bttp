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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('issue_date');
            $table->date('due_date')->nullable();

            // Client (can be member or external)
            $table->foreignId('member_id')->nullable()->constrained()->nullOnDelete();
            $table->string('client_name')->nullable();
            $table->string('client_eik')->nullable();
            $table->text('client_address')->nullable();
            $table->string('client_mol')->nullable(); // МОЛ

            // Items (JSON for flexibility)
            $table->json('items'); // [{description, quantity, unit_price, total}]

            // Totals
            $table->decimal('subtotal', 10, 2);
            $table->decimal('vat_rate', 5, 2)->default(20);
            $table->decimal('vat_amount', 10, 2);
            $table->decimal('total', 10, 2);

            // Payment
            $table->enum('payment_method', ['bank_transfer', 'cash', 'online'])->nullable();
            $table->enum('status', ['draft', 'issued', 'paid', 'cancelled'])->default('draft');
            $table->text('notes')->nullable();

            // Cancellation
            $table->date('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
