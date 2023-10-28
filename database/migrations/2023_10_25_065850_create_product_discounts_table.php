<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->notNullable();
            $table->integer('quantity')->unsigned()->notNullable();
            $table->integer('priority')->unsigned()->notNullable();
            $table->decimal('price', 15, 4)->notNullable();
            $table->date('date_start')->notNullable();
            $table->date('date_end')->notNullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_discounts');
    }
};
