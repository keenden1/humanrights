<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('case', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('identity')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('relation')->nullable();
            $table->string('victim_name');
            $table->string('address');
            $table->string('gender');
            $table->string('age');
            $table->date('birthdate')->nullable();
            $table->string('sector');
            $table->string('contact');
            $table->string('case');
            $table->text('report');
            $table->text('summary')->nullable();
            $table->string('reference_number');
            $table->string('status')->nullable();
            $table->string('email');
            $table->string('assign')->nullable();
            $table->string('in_charge')->nullable();
            $table->timestamps();
        });
        $this->cases();
    }
    private function cases(): void
    {
        DB::table('case')->insert([
            'user_id' => '1',
            'identity' => 'Guardian',
            'guardian_name' => 'Kim',
            'relation' => 'Sister',
            'victim_name' => 'Kriss',
            'address' => '123 Villasis',
            'gender' => 'Female',
            'birthdate' => '1996-10-20',
            'sector' => 'OFW',
            'age' => '28',
            'contact' => '09123123123',
            'case' => 'Abuse',
            'report' => 'Abuse by a Classmate',
            'reference_number' => '2024295211000050',
            'status' => 'Processing',
            'email' => 'admin@gmail.com',
            'created_at' => '2023-10-21 05:35:09',
            'updated_at' => '2024-10-21 05:35:09',
        ]);

        DB::table('case')->insert([
            'user_id' => '1',
            'identity' => 'Victim',
            'victim_name' => 'Jose',
            'address' => '123 Urdaneta',
            'gender' => 'Female',
            'birthdate' => '1995-10-20',
            'sector' => 'OFW',
            'age' => '18',
            'contact' => '09123123123',
            'case' => 'Abuse',
            'report' => 'Abuse by a Friend',
            'reference_number' => '2024295211000051',
            'status' => 'Processing',
            'email' => 'user@gmail.com',
            'created_at' => '2023-10-21 05:35:09',
            'updated_at' => '2024-10-21 05:35:09',
        ]);
   
    }
  
    
    public function down(): void
    {
        Schema::dropIfExists('case');
    }
};
