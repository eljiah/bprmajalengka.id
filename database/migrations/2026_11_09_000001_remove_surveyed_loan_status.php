<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('loan_applications')
            ->where('status', 'surveyed')
            ->update(['status' => 'contacted']);

        Schema::table('loan_applications', function (Blueprint $table) {
            $table->enum('status', ['pending', 'contacted', 'approved', 'rejected'])
                ->default('pending')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->enum('status', ['pending', 'contacted', 'surveyed', 'approved', 'rejected'])
                ->default('pending')
                ->change();
        });
    }
};
