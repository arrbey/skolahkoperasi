<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brosur', function (Blueprint $table): void {
            if (! Schema::hasColumn('brosur', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('title');
            }
            if (! Schema::hasColumn('brosur', 'detail')) {
                $table->longText('detail')->nullable()->after('description');
            }
            if (! Schema::hasColumn('brosur', 'duration')) {
                $table->string('duration')->nullable()->after('image_path');
            }
            if (! Schema::hasColumn('brosur', 'price')) {
                $table->string('price')->nullable()->after('duration');
            }
            if (! Schema::hasColumn('brosur', 'location')) {
                $table->string('location')->nullable()->after('price');
            }
            if (! Schema::hasColumn('brosur', 'target_participants')) {
                $table->text('target_participants')->nullable()->after('location');
            }
        });
    }

    public function down(): void
    {
        Schema::table('brosur', function (Blueprint $table): void {
            foreach (['target_participants', 'location', 'price', 'duration', 'detail', 'slug'] as $column) {
                if (Schema::hasColumn('brosur', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
