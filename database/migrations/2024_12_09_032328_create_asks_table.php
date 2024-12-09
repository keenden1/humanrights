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
        Schema::create('asks', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('question')->nullable();
            $table->text('image')->nullable();
            $table->text('text')->nullable();
            $table->text('officer')->nullable();
            $table->text('reply')->nullable();
            $table->timestamps();
        });
        $this->bot();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asks');
    }
    private function bot(): void
    {
        DB::table('asks')->insert([
            'email' => 'admin@gmail.com',
            'question' => 'Complain',
            'text' => 'How to Complain if im the Victim',
            'image' => 'bot_image/1733731150_5_11_2022 5_56_34 PM.png',
            'officer' => 'Admin Sanches',
            'reply' => 'Please fill up the Form',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
