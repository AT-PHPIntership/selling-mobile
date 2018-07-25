<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('quantity')->default(0);
            $table->date('manufacturing_date');
            $table->boolean('status');
            $table->string('producer');
            $table->text('detail');
            $table->text('description');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('discount_id');
            $table->foreign('discount_id')
                    ->references('id')->on('discounts')->onDelete('cascade');
            $table->unsignedInteger('about_store_id');
            $table->foreign('about_store_id')
                    ->references('id')->on('about_store')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
