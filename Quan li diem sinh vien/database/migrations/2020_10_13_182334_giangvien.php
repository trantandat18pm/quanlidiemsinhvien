<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Giangvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien', function (Blueprint $table) {
            $table->id();
            $table->string('magv', 10)->unique();
            $table->string('tengv', 50);
            $table->string('khoa_id',10);
            $table->timestamps();
            $table->foreign('khoa_id')->references('makhoa')->on('khoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
