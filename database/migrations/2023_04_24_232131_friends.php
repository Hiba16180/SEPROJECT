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
        Schema::create('notification', function (Blueprint $table) {
            $table->unsignedBigInteger('line_1');
            $table->unsignedBigInteger('line_2');
            $table->string('type')->default('message');
            $table->timestamps();
            $table->foreign('line_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('line_2')->references('id')->on('users')->onDelete('cascade');
            $table->boolean("new_messages_to_line_1")->default(false);
            $table->primary(['line_1', 'line_2']);
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
