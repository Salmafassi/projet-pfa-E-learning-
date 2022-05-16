<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourscompletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('courscomplets')) {
        Schema::create('courscomplets', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('subscriber_id')->constrained()->onDelete('cascade');
            // $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('subscriber_id');
            $table->foreign('subscriber_id')->references('id')
                ->on('subscribers')->onDelete('cascade');
    
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')
                ->on('lessons')->onDelete('cascade');
            $table->timestamps();
           
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('courscomplets');
    }
}
