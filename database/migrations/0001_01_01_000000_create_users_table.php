<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('username')->unique();
            $table->string('user_email')->nullable();
            $table->string('email_status')->nullable();
            $table->string('password');
            $table->string('contact')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('motto')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
        $this->insertDefaultUser();

   

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
 
        Schema::dropIfExists('sessions');
    }

    private function insertDefaultUser(): void
    {
        DB::table('users')->insert([
            'username' => 'useradmin',
            'firstname' => 'Kim',
            'middlename' => 'S',
            'lastname' => 'Carls',
            'user_email' => 'admin@gmail.com',
            'password' => Hash::make('useradmin'),
        ]);
    }
};
