<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            if (!Schema::hasColumn('apartments', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('apartments', 'address')) {
                $table->string('address');
            }
            if (!Schema::hasColumn('apartments', 'units')) {
                $table->integer('units');
            }
            if (!Schema::hasColumn('apartments', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('apartments', 'rent')) {
                $table->decimal('rent', 8, 2)->nullable();
            }
            if (!Schema::hasColumn('apartments', 'landlord_id')) {
                $table->unsignedBigInteger('landlord_id');
                $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            }
            if (!Schema::hasColumn('apartments', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            if (Schema::hasColumn('apartments', 'landlord_id')) {
                $table->dropForeign(['landlord_id']);
                $table->dropColumn('landlord_id');
            }
            // Optionally drop other columns if necessary
            $table->dropColumn(['name', 'address', 'units', 'location', 'rent']);
        });
    }
}
