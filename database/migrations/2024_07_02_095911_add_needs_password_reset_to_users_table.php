<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('needs_password_reset')->default(false);
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('needs_password_reset');
    });
}



};
