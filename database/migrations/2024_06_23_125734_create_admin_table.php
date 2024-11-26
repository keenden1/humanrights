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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('admin_username');
            $table->string('admin_password');
            $table->string('admin_email')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('role');
        });
        $this->insertDefaultAdmin();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
    private function insertDefaultAdmin(): void
    {
        DB::table('admin')->insert([
            'admin_username' => 'admin',
            'admin_password' => Hash::make('admin'),
            'admin_email' => 'admin1@gmail.com',
            'role' => 'admin',
        ]);
        DB::table('admin')->insert([
            'admin_username' => 'lawyer',
            'admin_password' => Hash::make('admin'),
            'admin_email' => 'admin2@gmail.com',
            'role' => 'lawyer',
        ]);
        DB::table('admin')->insert([
            'admin_username' => 'officer',
            'admin_password' => Hash::make('admin'),
            'admin_email' => 'admin3@gmail.com',
            'role' => 'officer',
        ]);
        DB::table('admin')->insert([
            'admin_username' => 'legal',
            'admin_password' => Hash::make('admin'),
            'admin_email' => 'admin3@gmail.com',
            'role' => 'legal',
        ]);
    }
};
