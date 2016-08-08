<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');            
            $table->integer('advertiser_id')->unsigned();
            $table->foreign('advertiser_id')->references('id')->on('advertisers');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('campaigns');
    }

}
