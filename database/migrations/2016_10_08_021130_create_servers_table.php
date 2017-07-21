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
			$table->string('sport', 5)->default('25565')->nullable();
			$table->string('scountry', 255);
			$table->longText('sdesc')->nullable();
            $table->string('website')->nullable();
			$table->string('sbanner', 255)->default('http://d.pr/ME5Yfk+');
			$table->boolean('active')->default(0);
			$table->string('tags')->nullable();
			$table->string('hash', 32);
			$table->bigInteger('ownerID');
			$table->bigInteger('likes')->default(0);
            $table->bigInteger('votes')->default(0);
			$table->boolean('votifier')->default(0)->nullable();
			$table->string('vport', 5)->nullable();;
			$table->string('vpubkey', 256)->nullable();;
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

