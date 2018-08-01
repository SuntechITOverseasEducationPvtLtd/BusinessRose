<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('skills_experience_acheivements_growthrate')->after("password");
            $table->longText('required_skills_experience')->after("skills_experience_acheivements_growthrate");
            $table->longText('required_investment_locations')->after("required_skills_experience");
            $table->integer('co_investment')->after("required_investment_locations");
            $table->integer('views')->after("co_investment");
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
            //
        });
    }
}
