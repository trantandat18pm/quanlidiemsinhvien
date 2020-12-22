<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diem', function (Blueprint $table) {
            $table->id();
            $table->string('MaSV_id', 9);
            $table->string('maMH_id', 9);
            $table->string('phan_tram_TX', 9);
            $table->string('phan_tram_thi', 9);
            $table->string('diemTX', 3); 
            $table->string('diemthil1', 3); 
            $table->string('diemthil2', 3); 
            $table->string('diemtb', 3);
            $table->string('loaidiem',2); 
            $table->string('MaGV', 10);
            $table->timestamps();
           // $table->primary(['MaSV_id','maMH_id']);            
            $table->foreign('MaSV_id')->references('masv')->on('sinhvien');
            $table->foreign('maMH_id')->references('mamon')->on('mon_hoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_diem');
    }
}
