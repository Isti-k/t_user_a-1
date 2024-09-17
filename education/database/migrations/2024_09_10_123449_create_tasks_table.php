<?php

use App\Models\Task;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description');
            $table->date('end_date')->default('2024-09-10');
            $table->boolean('status')->default(0);
            //itt ilyen nevű mező (létre is hozom) összekötése egy olyan nevű mezővel abban a táblában
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->timestamps();
        });

        Task::created([
            'title' => 'hírdetés írása',
            'description' => 'hírdetések szövegének megfogalmazása',
            'end_date' => '2024-09-17',
            'status' => 1,
            'user_id' => 1,
            'project_id' => 3
        ]);

        Task::created([
            'title' => 'olvasás',
            'description' => 'hírdetések felolvasása',
            'end_date' => '2024-09-17',
            'status' => 2,
            'user_id' => 3,
            'project_id' => 1
        ]);

        Task::created([
            'title' => 'galéria képek',
            'description' => 'galéria képekkel való feltöltés',
            'end_date' => '2024-09-18',
            'status' => 0,
            'user_id' => 2,
            'project_id' => 2
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
