<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('product_code')->unique();
            $table->string('barcode');
            $table->decimal('cost', $precision = 10, $scale = 2);
            $table->decimal('price', $precision = 10, $scale = 2);
            $table->integer('quantity');
            $table->integer('alert_quantity')->default(10);
            $table->integer('tax')->nullable();
            $table->enum('tax_type',['inclusive','exclusive']);
            $table->integer('unit')->nullable();
            $table->longText('description')->nullable();
            $table->string('images')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
