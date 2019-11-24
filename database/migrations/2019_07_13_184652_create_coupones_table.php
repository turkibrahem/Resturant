<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponesTable extends Migration
{
    public function up()
    {
        Schema::create('coupones', function (Blueprint $table) {
            $table->bigIncrements('id');       
            $table->string("title");
            $table->string("code")->unique();
            $table->integer("value");
            $table->boolean("active");
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('coupones');
    }
}
