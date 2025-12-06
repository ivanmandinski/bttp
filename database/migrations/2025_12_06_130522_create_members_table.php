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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // Company info
            $table->string('company_name');
            $table->string('eik')->unique(); // ЕИК/Булстат
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();

            // Representative
            $table->string('representative_name')->nullable();
            $table->string('representative_position')->nullable();
            $table->string('representative_phone')->nullable();
            $table->string('representative_email')->nullable();

            // Membership
            $table->foreignId('membership_category_id')->nullable()->constrained()->nullOnDelete();
            $table->date('member_since')->nullable();
            $table->enum('status', ['active', 'inactive', 'terminated'])->default('active');

            // Sector
            $table->string('main_activity')->nullable();
            $table->string('nace_code')->nullable(); // КИД код

            // Visibility
            $table->boolean('show_in_catalog')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
