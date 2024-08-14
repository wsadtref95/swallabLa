<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostIdToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('post_id')->after('user_id'); // 新增這一行
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('post_id');
        });
    }
}
