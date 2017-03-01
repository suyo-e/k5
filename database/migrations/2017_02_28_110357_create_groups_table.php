<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('city_id');
            $table->string('avatar');
            $table->string('name');
            $table->string('description');
            $table->decimal('fee', 5, 2);
            $table->decimal('balance', 5, 2);

            $table->string('leader_name');
            $table->string('leader_phone');
            $table->string('leader_description');

            $table->string('card_front');
            $table->string('card_back');
            $table->string('card_human');

            $table->integer('sort');
            $table->integer('status');
            $table->softDeletes();
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
        Schema::dropIfExists('groups');
    }
}
