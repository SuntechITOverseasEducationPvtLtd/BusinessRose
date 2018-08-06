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
            $table->string('email')->unique();
            $table->integer('gender');
            $table->string('mobile',20)->nullable();
            $table->date('date_of_birth');
            $table->integer('state');
            $table->integer('city');
            $table->integer('qualification');
            $table->integer('occupation');
            $table->integer('experience');
            $table->tinyInteger('non_experienced');
            $table->integer('business_category');
            $table->integer('sub_category');
            $table->string('business_category_others');
            $table->integer('investment_range');
            $table->integer('investment_type');
            $table->string('linked_in_url');
            $table->string('profile_pic');
            $table->longText('about_me');
            $table->tinyInteger('is_data_confirmation');
            $table->tinyInteger('is_accept');
            $table->tinyInteger('revenue_seeking_status');
            $table->longText('highlights_of_business');
            $table->longText('products_and_services');
            $table->longText('monthly_yearly_sales');
            $table->longText('personal_details');
            $table->longText('skills_experience_acheivements_growthrate');
            $table->longText('required_skills_experience');
            $table->longText('required_investment_locations');
            $table->integer('co_investment');
            $table->integer('views');
            $table->string('password');
            $table->boolean('active')->default(false);
            $table->string('activation_token');
            $table->rememberToken();
            $table->integer('created_by');
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
