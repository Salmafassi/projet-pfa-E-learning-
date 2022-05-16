<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->default('placeholder.png');
            $table->string('nomUniversity')->nullable();
            $table->string('spécialité')->nullable();
           
            $table->string('niveau')->nullable();
           $table->string('description')->nullable();
            $table->string('telephone')->nullable();
            $table->enum('statusEtudiant',['elimini','normal'])->default('normal');
            $table->string('type')->default('App\Models\Etudiant');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
