<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('from_user');
 
            $table->foreign('from_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_tasks', function (Blueprint $table) {
            $table->dropForeign('users_tasks_from_user_foreign');
            $table->dropColumn('from_user');
        });
    }
};
