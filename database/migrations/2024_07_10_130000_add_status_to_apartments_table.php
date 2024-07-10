<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToApartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->enum('status', ['vacant', 'occupied'])->default('vacant');
        });
    }

    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
