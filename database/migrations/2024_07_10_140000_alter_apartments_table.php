<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->decimal('rent', 8, 2)->nullable()->change();
            $table->enum('status', ['vacant', 'occupied'])->default('vacant')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
            $table->decimal('rent', 8, 2)->nullable(false)->change();
            $table->enum('status', ['vacant', 'occupied'])->default('vacant')->change();
        });
    }
}
