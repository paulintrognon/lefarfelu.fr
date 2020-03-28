<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageIdColToPageHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');

            $table->foreign('page_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_histories', function (Blueprint $table) {
            $table->dropForeign('page_histories_page_id_foreign');
            $table->dropColumn('page_id');
        });
    }
}
