<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'parent_id')) {
                $table->unsignedBigInteger('parent_id')->nullable()->after('id');
                $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            }

            if (!Schema::hasColumn('categories', 'icon')) {
                $table->string('icon')->nullable()->after('description');
            }

            if (!Schema::hasColumn('categories', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('icon');
            }

            $table->index(['parent_id', 'is_active'], 'categories_parent_active_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'parent_id')) {
                $table->dropForeign(['parent_id']);
                $table->dropColumn('parent_id');
            }

            if (Schema::hasColumn('categories', 'icon')) {
                $table->dropColumn('icon');
            }

            if (Schema::hasColumn('categories', 'is_active')) {
                $table->dropColumn('is_active');
            }

            $table->dropIndex('categories_parent_active_index');
        });
    }
};
