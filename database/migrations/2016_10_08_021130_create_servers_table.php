<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('sname', 25);
			$table->ipAddress('sip');
			$table->string('sport', 5);
			$table->string('scountry', 255);
			$table->longText('sdesc', 5000);
            $table->string('website');
			$table->string('sbanner', 255);
			$table->boolean('active');
			$table->string('hash', 32);
			$table->bigInteger('ownerID');
			$table->bigInteger('likes');
            $table->bigInteger('votes');
			$table->boolean('votifier');
			$table->string('vport', 5);
			$table->string('vpubkey', 256);
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
        Schema::drop('servers');
    }
}

