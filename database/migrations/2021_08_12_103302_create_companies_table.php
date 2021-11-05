<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('contact_name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('tel', 255)->nullable();
            $table->integer('insurance_quantity')->nullable();
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
