<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamp('created_at')->nullable(true);
            $table->string('created_by')->nullable(true);
            $table->timestamp('updated_at')->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
            $table->string('deleted_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
