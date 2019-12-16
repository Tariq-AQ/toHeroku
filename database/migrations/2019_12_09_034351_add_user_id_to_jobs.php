<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This migration links the 'id' column in User table to 'user_id' in Job table
//Reference
//Brad
//traversy Media
//2017
//https://www.youtube.com/playlist?list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-


class AddUserIdToJobs extends Migration
{

    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('user_id');
        });
    }


    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //
        });
    }
}
