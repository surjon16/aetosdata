<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterComponentSidebar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('component_sidebar', function (Blueprint $table) {
            $table->string('link');
            $table->string('icon');
            $table->string('title');
            $table->boolean('isParent')->default(0);
            $table->unsignedBigInteger('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('component_sidebar', function (Blueprint $table) {

        });
    }
}
