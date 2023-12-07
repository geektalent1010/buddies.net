<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('about_us');
            $table->text('qualifications');
            $table->text('skills');
            $table->text('offer');
            $table->text('closing_text');
            $table->text('followers')->nullable();
            $table->integer('type')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(1);
            $table->foreignId('created_by')
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
}
