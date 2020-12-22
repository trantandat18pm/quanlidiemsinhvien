<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('mamon', 9)->unique();
            $table->string('tenmh', 50);  
            $table->string('sotc', 50);    
            $table->string('hocki', 50);      
            $table->timestamps();
         //   $table->primary('mamon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_mon_hoc');
    }
}
