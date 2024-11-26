<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('username')->nullable();
            $table->text('rating')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
        $this->chats();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }

    private function chats(): void
    {
        DB::table('feedback')->insert([
            'username' => 'Daniel123',
            'rating' => '2',
            'details' => 'Please adjust the brightness',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
        DB::table('feedback')->insert([
            'username' => 'Rick224',
            'rating' => '5',
            'details' => 'Good Service',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
      
    }
};
