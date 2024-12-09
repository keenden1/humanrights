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
        Schema::create('content_forum', function (Blueprint $table) {
            $table->id();
            $table->text('case')->nullable();
            $table->text('title')->nullable();
            $table->text('fname')->nullable();
            $table->text('lname')->nullable();
            $table->text('story')->nullable();
            $table->text('email')->nullable();
            $table->timestamps();
        });
        $this->post();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_forum');
    }

    private function post(): void
    {
        DB::table('content_forum')->insert([
            'case' => 'Bullying',
            'title' => 'Bullied by a Classmate',
            'fname' => 'Kim',
            'lname' => 'Carl',
            'story' => 'Silent tears fell; her classmates words cut deeper daily.',
            'created_at' => now(),
            'updated_at' => now(),
            'email' => 'admin@gmail.com',
        ]);
    }
};
