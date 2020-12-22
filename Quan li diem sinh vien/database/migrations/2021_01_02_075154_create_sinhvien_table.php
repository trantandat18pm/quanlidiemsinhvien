<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhVienTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sinhvien', function (Blueprint $table) {
			$table->id();
			$table->string('masv', 9)->unique();
			$table->string('lop_id', 8);
			$table->string('hoten', 50);			
			$table->string('ngaysinh')->nullable();
			$table->string('dienthoai', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->text('ghichu')->nullable();
			$table->timestamps();		
			$table->foreign('lop_id')->references('malop')->on('lop');
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sinhvien');
	}
}