<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewColsUsersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {  
            $table->string('mobile',20)->after("gender");
			$table->date('date_of_birth')->after("mobile");
			$table->integer('state')->after("date_of_birth");
			$table->integer('city')->after("state");
			$table->integer('qualification')->after("city");
			$table->integer('occupation')->after("qualification");
			$table->integer('experience')->after("occupation");
			$table->tinyInteger('non_experienced')->after("experience");
			$table->integer('business_category')->after("non_experienced");
			$table->integer('sub_category')->after("business_category");
			$table->string('business_category_others')->after("sub_category");
			$table->integer('investment_range')->after("business_category_others");
			$table->integer('investment_type')->after("investment_range");
			$table->string('linked_in_url')->after("investment_type");
			$table->string('profile_pic')->after("linked_in_url");
			$table->longText('about_me')->after("profile_pic");
			$table->tinyInteger('is_data_confirmation')->after("about_me");
			$table->tinyInteger('is_accept')->after("is_data_confirmation");
			$table->tinyInteger('revenue_seeking_status')->after("is_accept");
			$table->longText('highlights_of_business')->after("revenue_seeking_status");
			$table->longText('products_and_services')->after("highlights_of_business");
			$table->longText('monthly_yearly_sales')->after("products_and_services");
			$table->longText('personal_details')->after("monthly_yearly_sales");
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
