<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('v_id');
            $table->integer('v_cat_id');
            $table->integer("v_u_id");
            $table->string("v_title", 255);
            $table->longText("v_desc");
            $table->string("v_thumb", 255);
            $table->string("v_file", 255);
            $table->dateTime("v_upload_date");
            $table->integer("v_vote_up")->default(0);
            $table->integer("v_vote_down")->default(0);
            $table->integer("v_r1")->default(0);
            $table->integer("v_r2")->default(0);
            $table->integer("v_r3")->default(0);
            $table->integer("v_r4")->default(0);
            $table->integer("v_r5")->default(0);
            $table->integer("v_views")->default(0);
            $table->integer("v_downloads")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
