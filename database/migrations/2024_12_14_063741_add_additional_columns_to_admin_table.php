<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->text('motto')->nullable();
            if (!Schema::hasColumn('admin', 'created_at') && !Schema::hasColumn('admin', 'updated_at')) {
                $table->timestamps(); // Add timestamps only if they don't already exist
            }
            $table->string('profile_image', 2048)->nullable(); // Increased length for longer file paths/URLs
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
            $table->dropColumn(['fname', 'mname', 'lname', 'motto', 'profile_image']);
            if (Schema::hasColumn('admin', 'created_at') && Schema::hasColumn('admin', 'updated_at')) {
                $table->dropTimestamps(); // Drop timestamps if they were added in this migration
            }
        });
    }
}
