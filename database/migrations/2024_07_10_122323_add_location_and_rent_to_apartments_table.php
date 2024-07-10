<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationAndRentToApartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('location')->nullable();
            $table->decimal('rent', 8, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('rent');
        });
    }
}
