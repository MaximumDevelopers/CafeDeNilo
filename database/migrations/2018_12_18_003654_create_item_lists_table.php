<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name')->unique();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->smallInteger('quantity');
            $table->decimal('price');
            $table->decimal('cost');
            $table->timestamps();
        });
    
       Schema::table('item_lists', function($table) {
           $table->foreign('category_id')->references('id')->on('categories');
           $table->foreign('supplier_id')->references('id')->on('suppliers');
       });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_lists');
    }
}
