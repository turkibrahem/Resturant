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
            $table->bigIncrements("id") ;
            $table->integer("category_id")->unsignedBigInteger();
            $table->string("image")->nullable();
            $table->integer("price")->nullable();
            $table->boolean("active")->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('products_translations', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("product_id");
            $table->string("name") ;
            $table->text("description") ; 
            $table->string('locale')->index();
            $table->unique(["product_id", "locale"]) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("products");
        Schema::dropIfExists("product_translations");
    }
}
