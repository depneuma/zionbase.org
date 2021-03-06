<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table
                ->foreign('event_id')
                ->references('id')
                ->on('events');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
