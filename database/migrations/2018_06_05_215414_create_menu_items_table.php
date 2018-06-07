<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('anchor')->nullable();
            $table->string('url')->nullable();
            $table->string('class')->nullable();
            $table->boolean('is_blank')->default(0);
            $table->string('entity_type')->nullable();
            $table->string('entity_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable()->index();
            $table->unsignedInteger('menu_id')->nullable()->index();
            $table->index(['entity_type', 'entity_id']);
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
        Schema::dropIfExists('menu_items');
    }
}
