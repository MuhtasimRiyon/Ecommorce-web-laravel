<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('shop_name');
            $table->string('proprietor_name');
            $table->string('mobile_1');
            $table->string('mobile_2');
            $table->string('Email');
            $table->string('zila');
            $table->string('upzila');
            $table->string('address');
            $table->string('remark');
            $table->string('interested');
            $table->string('marketer');
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
        Schema::dropIfExists('visits');
    }
}
