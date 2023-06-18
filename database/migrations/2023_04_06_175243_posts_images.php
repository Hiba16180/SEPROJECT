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
        Schema::create('posts_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
      Schema::table('Image', function (Blueprint $table) {
          Schema::dropIfExists('posts_images');
      });
  }
};
