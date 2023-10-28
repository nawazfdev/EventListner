<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDataTable extends Migration
{
    public function up()
    {
        Schema::create('product_data', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name');
            $table->string('field_name');
            $table->text('field_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_data');
    }
}
