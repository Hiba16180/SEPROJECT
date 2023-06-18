<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    protected $diplomaField = [
        'business-administration',
        'computer-science',
        'nursing',
        'engineering',
        'psychology',
        'biology',
        'communication-studies',
        'economics',
        'education',
        'english-literature',
        'environmental-science',
        'history',
        'international-relations',
        'marketing',
        'mathematics',
        'political-science',
        'sociology',
    ];
    protected $degree = [
        'bachelor',
        'master',
        'doctorate',
        'professional',
        'specialized'
    ];
    
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('instagram')->unique()->nullable();
            $table->string('twiter')->unique()->nullable();
            $table->string('facebook')->unique()->nullable();
            $table->string('linkedin')->unique()->nullable();
            $table->enum('status', ['teacher', 'student'])->default('student');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('description')->default('Hello, I am Happy to join the community!');
            $table->rememberToken();
            $table->string('region');
            $table->enum('diplomaField',$this->diplomaField)->nullable();
            $table->enum('degree',$this->degree)->nullable();
            $table->boolean('blocked')->default(false);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->default("profiles/images/default.png");
            $table->timestamp('blocked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
