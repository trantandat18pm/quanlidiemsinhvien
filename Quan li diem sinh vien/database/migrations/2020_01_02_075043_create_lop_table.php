<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lop', function (Blueprint $table) {
			$table->id();
			$table->string('malop', 8)->unique();
			$table->string('khoa_id', 10);
			$table->string('tenlop', 50);
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
		Schema::dropIfExists('lop');
	}
}