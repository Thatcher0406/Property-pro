<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->unsignedBigInteger('landlord_id')->after('id');

        // Add a foreign key constraint if landlords table exists
        $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropForeign(['landlord_id']);
        $table->dropColumn('landlord_id');
    });
}

};
