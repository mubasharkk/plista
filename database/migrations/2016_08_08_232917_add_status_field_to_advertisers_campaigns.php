<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusFieldToAdvertisersCampaigns extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::table('advertisers', function (Blueprint $table) {
            $table->boolean('status')->after('realname')->default(1);
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->boolean('status')->after('title')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('advertisers', function(Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('campaigns', function(Blueprint $table) {
            $table->dropColumn('status');
        });
    }

}
