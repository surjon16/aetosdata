<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterComponentSidebarElementId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('component_sidebar', function (Blueprint $table) {
            $table->string('link')->nullable()->change();
            $table->string('icon')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->boolean('isParent')->default(0)->nullable()->change();
            $table->unsignedBigInteger('parent_id')->nullable()->change();
            $table->string('element_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('component_sidebar', function (Blueprint $table) {});
    }
}
