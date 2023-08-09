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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('message');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('department_assigned_to');
            $table->json('subtasks')->nullable();
            $table->enum('progress', ['unassigned', 'in progress', 'complete', 'closed', 'sent back'])->default('unassigned');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('supervised_by')->nullable();
            $table->timestamp('date_assigned')->nullable();
            $table->timestamp('date_completed')->nullable();
            $table->timestamp('date_closed')->nullable();
            $table->enum('priority', ['very high', 'high', 'medium','low'])->nullable();
            $table->timestamps();
            $table->string('send_back_reason')->nullable();

            $table->foreign('supervised_by')->references('id')->on('users');
            $table->foreign('department_assigned_to')->references('id')->on('roles');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
