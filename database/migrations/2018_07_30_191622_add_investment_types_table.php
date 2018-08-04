<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvestmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('investment_types')->insert(array(
			array(
				'investment_type' => 'Lets Connect and Discuss(I am Negotiable)',
				'desc' => '',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'investment_type' => 'Sales Commission',
				'desc' => '',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'investment_type' => 'Low Salary and Profit in Business',
				'desc' => '',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'investment_type' => 'Salary Only',
				'desc' => '',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'investment_type' => 'Very Good Salary(More Than Industry Standards)',
				'desc' => '',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			))
		);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investment_types', function (Blueprint $table) {
            //
        });
    }
}
