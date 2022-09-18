<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Books' , function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('AuthorName');
            $table->string('Description');
            $table->string('category_id');
            $table->date('date');
            $table->string('status');
            $table->string('description');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });
        
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
