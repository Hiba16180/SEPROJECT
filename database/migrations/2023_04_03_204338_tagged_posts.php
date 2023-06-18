<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public $tags = ["university","high_school","middle_school","elementary_school","Q&A","science", "languages", "sports", "business_and_entrepreneurship", "politics", "arts_and_culture", "technology", "career", "education", "general", "religion"];
    public function up(): void
    {
        Schema::create('tagged_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->enum('tag',$this->tags)->default('general');
            $table->primary(['post_id', 'tag']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
