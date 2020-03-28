<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('edited_by_id');
            $table->string('urlPath');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('edited_by_id')
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
        Schema::dropIfExists('page_histories');
    }
}
