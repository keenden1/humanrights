<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            // $table->string('fname')->nullable();  
            // $table->string('mname')->nullable();  
            // $table->string('lname')->nullable();  
            // $table->text('motto')->nullable();    
            // $table->timestamps();
            // $table->string('profile_image')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            // $table->dropColumn(['fname', 'mname', 'lname', 'motto']);
        });
    }
}
