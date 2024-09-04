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
        Schema::create('guitar_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guitar_id');
            $table->bigInteger('tag_id');

            $table->foreign('guitar_id')->references('id')->on('guitars');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guitar_tag');
    }
};
