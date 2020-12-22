<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinGiangDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtingiangday', function (Blueprint $table) {        
            $table->id();
            $table->string('ma_gv', 8);
            $table->string('ma_mh', 9);
            $table->string('ma_lop',10);
         //   $table->primary(['ma_gv', 'ma_mh','ma_lop']);
            $table->timestamps();
            $table->foreign('ma_gv')->references('magv')->on('giangvien');
            $table->foreign('ma_mh')->references('mamon')->on('mon_hoc');
            $table->foreign('ma_lop')->references('malop')->on('lop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_thong_tin_giang_day');
    }
}
