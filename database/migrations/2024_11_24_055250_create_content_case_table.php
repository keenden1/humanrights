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
        Schema::create('content_case', function (Blueprint $table) {
            $table->id();
            $table->text('case')->nullable();
            $table->text('created_by')->nullable();
            $table->timestamps();
        });
        $this->case();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_case');
    }

    private function case(): void
    {
        DB::table('content_case')->insert([
            'case' => 'Bullying',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_case')->insert([
            'case' => 'Rape',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_case')->insert([
            'case' => 'Sexual Abuse',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_case')->insert([
            'case' => 'Sexual Harrassment',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
