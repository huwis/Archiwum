<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('first_name',30);
            $table->string('surname',50);
            $table->char('pesel',11);
            $table->char('phone',9);
            $table->date('date_of_share');
            $table->date('date_of_return')->nullable();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
          
            
        
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS = 0');
       Schema::dropIfExists('shares');
       DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
