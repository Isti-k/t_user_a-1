<?php

use App\Models\Project;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('costs');
            //days
            $table->integer('time');
            $table->foreignId('manager_id')->references('id')->on('users');
            $table->timestamps();
        });

        Project::create(['task_range_id' => 1,
            'name' => 'Facebook hírdetés', 
            'costs' => 100,
            'time' => 14,
            'manager_id' => 1
        ]);

        Project::create(['task_range_id' => 1,
            'name' => 'Linux megismerése', 
            'costs' => 20,
            'time' => 1,
            'manager_id' => 2
        ]);

        Project::create(['task_range_id' => 1,
            'name' => 'Képgaléria készítés', 
            'costs' => 200,
            'time' => 10,
            'manager_id' => 3
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
