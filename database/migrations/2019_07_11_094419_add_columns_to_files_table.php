<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->text('request')->nullable()->after('reference');
            $table->mediumText('reason')->nullable()->after('request');
            $table->unsignedBigInteger('user_id')->nullable()->after('reason');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('request_reply')->nullable()->after('user_id');
            $table->mediumText('reason_reply')->after('request_reply')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn(['request', 'reason']);
            $table->dropForeign(['associate_id']);
            $table->dropColumn(['request_reply', 'reason_reply']);

        });
    }
}
