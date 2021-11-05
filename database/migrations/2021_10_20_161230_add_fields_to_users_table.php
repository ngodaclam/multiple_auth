<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->after('password')->nullable();
            $table->date('birthday')->after('mobile')->nullable();
            $table->string('cmtnd', 12)->after('birthday')->nullable();
            $table->string('referral_code', 6)->after('cmtnd')->nullable();
            $table->text('parent_ids')->after('referral_code')->nullable();
            $table->tinyInteger('type')->default(2)->after('parent_ids');
            $table->softDeletes();
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
            $table->dropColumn('mobile');
            $table->dropColumn('birthday');
            $table->dropColumn('cmtnd');
            $table->dropColumn('referral_code');
            $table->dropColumn('parent_ids');
            $table->dropColumn('type');
            $table->dropSoftDeletes();
        });
    }
}
