<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmailToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->default(2)->after('cmtnd');
            $table->string('otp', 3)->nullable()->after('remember_token');
            $table->string('name')->nullable()->change();
            $table->string('email')->change();
            $table->string('mobile')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('mobile');
            $table->dropColumn('otp');
        });
    }
}
