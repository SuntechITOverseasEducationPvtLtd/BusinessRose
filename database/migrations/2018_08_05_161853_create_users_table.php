<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
			$table->string('user_type');
            $table->string('name');
			$table->string('password');
            $table->string('email')->unique();
			$table->date('date_of_birth');
            $table->integer('gender');
            $table->string('mobile',20)->nullable();
            $table->string('whatsup_number',20)->nullable();
            $table->tinyInteger('profile_created_by');
            $table->boolean('active')->default(false);
			$table->integer('views');
			$table->integer('qualification');
			$table->integer('occupation');
			$table->integer('experience');
			$table->integer('category');
			$table->integer('sub_category');
			$table->tinyInteger('religion');
			$table->integer('mother_tongue');
			$table->integer('known_languages');
			$table->integer('country');
			$table->integer('state');
			$table->integer('city');
			$table->tinyInteger('relationship_status');
			$table->integer('investment_range');
			$table->integer('investment_type');
			$table->tinyInteger('co_investment')->nullable();
			$table->string('linked_in_url', 250)->nullable();
			$table->string('profile_pic')->nullable();
			$table->string('description_of_skills_experience');
			$table->string('description_of_sales')->nullable();
			$table->string('description_you_family');
			$table->string('description_of_profound_value')->nullable();
			$table->string('description_place_business')->nullable();
			$table->string('description_relocation_preferance')->nullable();
			$table->tinyInteger('is_accept_terms');
			$table->string('activation_token');
            $table->rememberToken();
			$table->softDeletes();
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
