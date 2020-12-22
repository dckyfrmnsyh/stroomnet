<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_orders', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('fb_id');
            $table->foreign('fb_id')->references('id')->on('fb')->onDelete('cascade');
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
        Schema::dropIfExists('list_orders');
        Schema::table('list_orders', function(Blueprint $table)
        {
            $table->dropForeign('fb_id'); //
        });
    }
}
