<?php

class UpdateTenantsTableDefaultPhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            // Or if you want to set a default value
            // $table->string('phone')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenants', function (Blueprint $table) {
            // Revert back to the original state
            $table->string('phone')->nullable(false)->change();
            // Or if it had no default value
            // $table->string('phone')->default(null)->change();
        });
    }
}