<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_gift_requests', function (Blueprint $table) {
            $table->foreignId('gift_id')->nullable()->after('category_id')->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('user_gift_requests', function (Blueprint $table) {
            $table->dropForeign(['gift_id']);
            $table->dropColumn('gift_id');
        });
    }
};

