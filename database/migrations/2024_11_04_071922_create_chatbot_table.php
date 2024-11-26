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
        Schema::create('chatbot', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('chatbot');
    }

    private function chats(): void
    {
        DB::table('chatbot')->insert([
            'title' => 'password reset',
            'details' =>'A password reset is a crucial security measure that allows users to regain access to their accounts when they forget their passwords or suspect unauthorized access. Typically initiated through an email link or security questions, the process involves verifying the users identity and creating a new password, ensuring account safety and integrity.',
        ]);
        DB::table('chatbot')->insert([
            'title' => 'new account',
            'details' =>'Creating a new account is a straightforward process that allows users to access various online services. Typically, it involves providing personal information such as name, email address, and a secure password. Users may also need to verify their identity via email or SMS. Once registered, individuals can enjoy personalized features, manage settings, and enhance their online experience.',
        ]);
      
    }
};
