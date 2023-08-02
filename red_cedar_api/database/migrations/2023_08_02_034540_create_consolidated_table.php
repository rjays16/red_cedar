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
        Schema::create('consolidated', function (Blueprint $table) {
            $table->id();
            $table->string('book');
            $table->string('currency');
            $table->string('from_date');
            $table->string('to_date');
            $table->string('prelim_close');
            $table->string('prelim_close');
            $table->integer('company');
            $table->string('company_name');
            $table->string('currency-2');
            $table->string('amc-date');
            $table->string('classification-xlt');
            $table->integer('acct_unit');
            $table->string('ast-lease-company-5');
            $table->string('ast-lease-5');
            $table->string('division-8');
            $table->string('asset-type-8');
            $table->string('sub-type');
            $table->string('property-xlt-9');
            $table->integer('asset');
            $table->integer('tag_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consolidated');
    }
};
