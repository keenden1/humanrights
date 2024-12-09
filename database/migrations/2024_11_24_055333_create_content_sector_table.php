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
        Schema::create('content_sector', function (Blueprint $table) {
            $table->id();
            $table->text('sector')->nullable();
            $table->text('created_by')->nullable();
            $table->timestamps();
        });
        $this->sector();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sector');
    }

    
    private function sector(): void
    {
        DB::table('content_sector')->insert([
            'sector' => 'Person with Disability (PWD)',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_sector')->insert([
            'sector' => 'Overseas Filipino Worker (OFW)',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_sector')->insert([
            'sector' => 'Solo Parent',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('content_sector')->insert([
            'sector' => 'Senior Citezen',
            'created_by' => 'admin3@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
