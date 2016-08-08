<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameFieldToAdvertisersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('advertisers', function (Blueprint $table) {
            $table->string('realname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('advertisers', function(Blueprint $table) {
            $table->dropColumn('realname');
        });
    }

}
